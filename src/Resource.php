<?php

namespace BalintHorvath\ActiveCampaign;

abstract class Resource
{

    protected $ActiveCampaign;

    protected $name;
    protected $resource;

    public function __construct(ActiveCampaign $ActiveCampaign)
    {
        $this->ActiveCampaign = $ActiveCampaign;
    }

}
