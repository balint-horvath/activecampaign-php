<?php

namespace BalintHorvath\ActiveCampaign;

abstract class Resource
{

    /**
     * @var ActiveCampaign $ActiveCampaign ActiveCampaign Main Instance
     */
    protected $ActiveCampaign;

    protected $name;
    protected $resource;

    public function __construct(ActiveCampaign $ActiveCampaign)
    {
        $this->ActiveCampaign = $ActiveCampaign;
    }

    public function get(string $id){
        return $this->ActiveCampaign->get($this->resource . "/" . $id);
    }

    public function ls(){
        return $this->ActiveCampaign->get($this->resource);
    }

    public function create($customer){
        return $this->ActiveCampaign->post($this->resource, $customer);
    }

    public function update(string $id, $customer){
        return $this->ActiveCampaign->put($this->resource . "/" . $id, $customer);
    }

    public function delete(string $id){
        return $this->ActiveCampaign->delete($this->resource . "/" . $id);
    }

}
