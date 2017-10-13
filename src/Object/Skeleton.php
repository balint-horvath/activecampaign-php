<?php

namespace BalintHorvath\ActiveCampaign\Object;

abstract class Skeleton
{

    protected $_schema;
    protected $_data;

    public function __construct($data = null){
        $this->_data = $data;
    }

    public function __toArray(){
        $array = [];
        foreach (get_object_vars($this) as $variable => $value){
            if ($variable[0] !== "_"){
                $array[$variable] = $value;
            }
        }
        return($array);
    }

}