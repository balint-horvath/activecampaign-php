<?php

namespace BalintHorvath\ActiveCampaign\Object;

abstract class HelperObject extends \ArrayObject
{

    protected $_schema;
    protected $_data;

    public function __construct(array $data = null){
        if (!empty($data)){
            $this->_data = $data;
        }
    }

    public function __get($name)
    {
        if ($name[0] == "_") {
            return $this->$name;
        } if (array_key_exists($name, $this->_data)){
            return $this->_data[$name];
        }
    }

    public function __set($name, $value)
    {
        if ($name[0] == "_") {
            $this->$name = $value;
        } else {
            $this->_data[$name] = $value;
        }
    }

    public function __toString()
    {
        return $this->id;
    }

    public function __toArray()
    {
        return $this->_data;
    }

    public function __toJSON()
    {
        return \GuzzleHttp\json_encode($this->_data);
    }

    public function __fromJSON(string $json)
    {
        $this->_data = \GuzzleHttp\json_decode($json);
    }

    public function serialize()
    {
        return $this->__toJSON($this->_data);
    }

    public function unserialize($serialized)
    {
        $this->_data = $this->__fromJSON($serialized);
    }

    public function count()
    {
        return count($this->_data);
    }

}