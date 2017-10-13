<?php

namespace BalintHorvath\ActiveCampaign\Spec;

use BalintHorvath\ActiveCampaign\ActiveCampaign;
use Kahlan\Filter\Filters;

Filters::apply($this, 'run', function($chain) {
    $scope = $this->suite()->root()->scope(); // The top most describe scope.
    $scope->ActiveCampaign = new ActiveCampaign("", "");
    return $chain->next();
});
