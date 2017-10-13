<?php

namespace BalintHorvath\ActiveCampaign\Spec;

use BalintHorvath\ActiveCampaign\ActiveCampaign;

describe('ActiveCampaign', function () {

    given('ActiveCampaign', function() {
        it('access "ActiveCampaign" system core', function () {
            expect($this->ActiveCampaign)->toBeAnInstanceOf(ActiveCampaign::class);
        });
    });

    describe('ActiveCampaign Instance', function () {
        it('return "ActiveCampaign" instance', function () {
            expect($this->ActiveCampaign)->toBeAnInstanceOf(ActiveCampaign::class);
        });
    });

});
