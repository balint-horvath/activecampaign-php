<?php

namespace BalintHorvath\ActiveCampaign\Module;

use BalintHorvath\ActiveCampaign\ActiveCampaign;
use \BalintHorvath\ActiveCampaign\Module;
use BalintHorvath\ActiveCampaign\Contract\Module as ModuleContract;
use BalintHorvath\ActiveCampaign\Ecommerce\Customers;

class Ecommerce extends Module implements ModuleContract
{

    /**
     * @var Customers $Customers Customers resource.
     */
    public $Customers;

    public function initResources(){
        $this->Customers = new Customers($this->ActiveCampaign);
    }

}
