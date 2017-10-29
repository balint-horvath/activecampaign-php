<?php

namespace BalintHorvath\ActiveCampaign\Ecommerce;

use BalintHorvath\ActiveCampaign\Object as HelperObject;
use BalintHorvath\ActiveCampaign\Resource;

class Customers extends Resource
{

    protected $singleName = "ecomCustomer";
    protected $multipleName = "ecomCustomers";
    protected $resource = "ecomCustomers";
    protected $helperObject = "Customer";



}
