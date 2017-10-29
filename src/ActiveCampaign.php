<?php

namespace BalintHorvath\ActiveCampaign;

use BalintHorvath\ActiveCampaign\Exception\AboveTheLimitException;
use BalintHorvath\ActiveCampaign\Exception\BelowTheLimitException;
use BalintHorvath\ActiveCampaign\Exception\UnallowedInLowMemoryModeException;
use BalintHorvath\ActiveCampaign\Exception\UnallowedMethodException;
use BalintHorvath\ActiveCampaign\Module\Ecommerce;
use GuzzleHttp\Client;

class ActiveCampaign
{

    private $url;
    private $key;
    private $endpoint;

    private $version = "3";
    private $timeout = 2.0;

    private $client;

    private $allowedMethod = ['GET', 'POST', 'PUT', 'DELETE'];

    private $pagination;

    private $lastRequest;
    private $lastResponse;
    private $requestHistory;
    private $responseHistory;

    private $lowMemoryMode = false;

    private $wrapperVersion = "0.1.0";

    /**
     * @var Ecommerce Ecommerce Module
     */
    public $Ecommerce;

    /**
     * ActiveCampaign constructor.
     * @param string $url API Access URL belongs to the account
     * @param string $key API Access Key belongs to the account
     */
    public function __construct(string $url, string $key)
    {
        $this->setURL($url);
        $this->setKey($key);
        $this->initVariables();
        $this->initModules();
        return($this);
    }

    public function initVariables(){
        $this->pagination = new \stdClass();
        $this->pagination->limit = null;
        $this->pagination->offset = null;
    }

    public function initModules(){
        $this->Ecommerce = new Ecommerce($this);
    }

    /**
     * Sets the API URL and generates API Endpoint
     * @param string $url API Access URL
     * @return ActiveCampaign Returns itself for further method calls
     */
    public function setURL(string $url)
    {
        if (strpos($url, "http://") !== false){
            $url = str_replace("http://", "https://", $url);
        }
        if (strpos($url, "https://") === false){
            $url = "https://" . $url;
        }
        $this->url = rtrim($url, '/') . "/";
        $this->endpoint = $this->url . "api/$this->version/";
        $this->initClient();
        return($this);
    }

    /**
     * Sets the API Key
     * @param string $key API Access Key
     * @return ActiveCampaign Returns itself for further method calls
     */
    public function setKey(string $key)
    {
        $this->key = trim($key);
        return($this);
    }

    public function lowMemoryMode(bool $lowMemoryMode = true){
        $this->lowMemoryMode = $lowMemoryMode;
        return($this);
    }

    public function retry(int $requestID=null){
        if (is_null($requestID) || $requestID === 0){
            return $this->request($this->lastRequest[0], $this->lastRequest[1], $this->lastRequest[2]);
        } else if (!$this->lowMemoryMode){
            return $this->request($this->requestHistory[$requestID]->request->method, $this->requestHistory[$requestID]->request->resource, $this->requestHistory[$requestID]->request->options);
        } else {
            throw new UnallowedInLowMemoryModeException("Retry is only allowed on the last request in low memory mode.");
        }
    }

    public function getResponse(int $responseID=null){
        if (is_null($responseID) || $responseID === 0){
            return $this->lastResponse;
        } else if (!$this->lowMemoryMode){
            return $this->responseHistory[$responseID];
        } else {
            throw new UnallowedInLowMemoryModeException("Historical response is not available in low memory mode.");
        }
    }

    private function recordRequest($method, $resource, $options){
        $time = time();
        $this->lastRequest = [$method, $resource, $options];
        if (!$this->lowMemoryMode){
            $this->requestHistory[] = (object) [
                'timestamp' => $time,
                'time' => date("Y-m-d H:i:s", $time),
                'request' => [
                    'method' => $method,
                    'resource' => $resource,
                    'options' => $options,
                ]
            ];
        }
        return($this);
    }

    private function recordResponse($response){
        $time = time();
        $this->lastResponse = $response;
        if (!$this->lowMemoryMode){
            $this->responseHistory[] = (object) [
                'timestamp' => $time,
                'time' => date("Y-m-d H:i:s", $time),
                'response' => $response
            ];
        }
        return($this);
    }

    public function paginate(int $offset = 20, int $limit = 20){
        $this->offset($offset)->limit($limit);
        return($this);
    }

    public function offset(int $offset = 20){
        if ($offset < 0) {
            throw new BelowTheLimitException("Pagination offset (zero-indexed) has to be 0 or more.");
        } else {
            $this->pagination->offset = $offset;
        }
        return($this);
    }

    public function limit(int $limit = 20){
        if ($limit < 1) {
            throw new BelowTheLimitException("Pagination limit has to be 1 or more.");
        } else if ($limit <= 100){
            $this->pagination->limit = $limit;
        } else {
            throw new AboveTheLimitException("Pagination limit has to be 100 or less.");
        }
        return($this);
    }

    /**
     * Sets global timeout value
     * @param float $timeout Timeout (e.g. 2.0)
     * @return ActiveCampaign Returns itself for further method calls
     */
    public function setTimeout(float $timeout){
        $this->timeout = $timeout;
        return($this);
    }

    /**
     *
     */
    private function initClient(){
        $this->client = new Client([
            'base_uri' => $this->endpoint,
            'timeout'  => $this->timeout,
            'allow_redirects' => false
        ]);
        return($this);
    }

    /**
     * Making a Request to the Endpoint
     * @param string $method HTTP method of the Request
     * @param string $resource
     * @param $properties
     * @throws UnallowedMethodException When HTTP method is not allowed
     * @return ActiveCampaign Returns itself for further method calls
     */
    public function request(string $method, string $resource, array $properties = []){
        if (!in_array($method, $this->allowedMethod)){
            throw new UnallowedMethodException("This HTTP method ($method) is not allowed.");
        }
        if (!empty($this->pagination)){
            if (is_numeric($this->pagination->limit)){
                $properties['limit'] = $this->pagination->limit;
            }
            if (is_numeric($this->pagination->offset)){
                $properties['offset'] = $this->pagination->offset;
            }
        }
        $options = [
            'headers' => [
                'Api-Token' => "$this->key",
                'User-Agent' => "ActiveCampaignPHPWrapper/$this->wrapperVersion",
                'Accept'     => "application/json"
            ]
        ];
        if (!empty($properties['files'])){
            if (empty($properties['parameters'])){
                $options['multipart'] = [];
            } else {
                $options['multipart'] = $properties['parameters'];
            }
            foreach ($properties['files'] as $file){
                if (empty($file->filename)){
                    $file->filename = $file->name;
                }
                if (empty($file->name)){
                    $file->name = $file->filename;
                }
                if (file_exists($file->file)){
                    $file->contents = fopen($file->file, 'r');
                }
                $options['multipart'][] = [
                    'name' => $file->name,
                    'filename' => $file->filename,
                    'contents' => $file->contents
                ];
            }
        } else if (!empty($properties)){
            if ($method == "GET"){
                $options['query'] = $properties;
            } else {
                $options['json'] = $properties;
            }
        }
        $this->recordRequest($method, $resource, $options);
        $response = $this->client->request($method, $resource, $options);
        $this->recordResponse($response);
        return($this);
    }

    public function get(string $resource, array $properties = []){
        $this->request('GET', $resource, $properties);
        return $this;
    }

    public function post(string $resource, array $properties = []){
        $this->request('POST', $resource, $properties);
        return $this;
    }

    public function put(string $resource, array $properties = []){
        $this->request('PUT', $resource, $properties);
        return $this;
    }

    public function patch(string $resource, array $properties = []){
        $this->request('PATCH', $resource, $properties);
        return $this;
    }

    public function delete(string $resource){
        $this->request('DELETE', $resource);
        return $this;
    }

    public function getStatusCode(){
        return $this->getResponse()->getStatusCode();
    }

    public function getReasonPhrase(){
        return $this->getResponse()->getReasonPhrase();
    }

    public function hasHeader($header){
        return $this->getResponse()->hasHeader($header);
    }

    public function getHeaders(){
        return $this->getResponse()->getHeaders();
    }

    public function getBody(){
        return $this->getResponse()->getBody();
    }

    public function getObject(){
        return \GuzzleHttp\json_decode($this->getResponse()->getBody());
    }

    public function getMeta(){
        return \GuzzleHttp\json_decode($this->getObject()->meta);
    }

    public function getTotal(){
        return \GuzzleHttp\json_decode($this->getMeta()->total);
    }

    public function getArray(){
        return \GuzzleHttp\json_decode($this->getResponse()->getBody(), true);
    }

}