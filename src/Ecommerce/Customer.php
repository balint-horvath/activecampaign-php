<?php

namespace BalintHorvath\ActiveCampaign\Ecommerce;

use BalintHorvath\ActiveCampaign\Object\Ecommerce\ecomCustomer;
use BalintHorvath\ActiveCampaign\Resource;

class Customer extends Resource
{

    protected $singleName = "ecomCustomer";
    protected $multipleName = "ecomCustomers";
    protected $resource = "ecomCustomers";

    public function get(string $id){

    }

    public function ls(){

    }

    public function create(ecomCustomer $customer){

    }

    public function update(string $id, ecomCustomer $customer){

    }

    public function delete(string $id){

    }

}
