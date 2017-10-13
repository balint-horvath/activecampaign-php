<?php

namespace BalintHorvath\ActiveCampaign\Object\Ecommerce;

use BalintHorvath\ActiveCampaign\Object\Skeleton;

/*** Schema
{
    "ecomCustomer": {
        "connectionid": "1",
        "externalid": "56789",
        "email": "alice@example.com"
    }
}
 ***/

class ecomCustomer extends Skeleton
{

    public $connectionid;
    public $externalid;
    public $email;

}
