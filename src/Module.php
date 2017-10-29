<?php

namespace BalintHorvath\ActiveCampaign;

abstract class Module
{

    /**
     * @var ActiveCampaign $ActiveCampaign ActiveCampaign Main Instance
     */
    protected $ActiveCampaign;

    public function __construct(ActiveCampaign $ActiveCampaign)
    {
        $this->ActiveCampaign = $ActiveCampaign;
        $this->initResources();
    }

}
