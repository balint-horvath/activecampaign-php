<?php

namespace BalintHorvath\ActiveCampaign\Object\Ecommerce;

use BalintHorvath\ActiveCampaign\Object\HelperObject;

/*** Schema
{
    "ecomCustomer": {
        "connectionid": "1",
        "externalid": "56789",
        "email": "alice@example.com"
    }
}
 ***/

class Customer extends HelperObject
{

    public $id;

    public $connectionid;
    public $externalid;
    public $email;

    public $totalRevenue;
    public $totalOrders;
    public $totalProducts;
    public $avgRevenuePerOrder;
    public $avgProductCategory;

    public $links;
    public $tstamp;
    public $connection;

}
