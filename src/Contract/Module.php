<?php

namespace BalintHorvath\ActiveCampaign\Contract;

use BalintHorvath\ActiveCampaign\ActiveCampaign;

interface Module
{

    public function __construct(ActiveCampaign $ActiveCampaign);
    public function initResources();

}