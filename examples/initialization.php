<?php

define('ROOT_DIR', dirname(__FILE__) . '/../');
define('EXAMPLE_DIR', dirname(__FILE__) . '/');

require ROOT_DIR . '/vendor/autoload.php';

$dotenv = new \BalintHorvath\DotEnv\DotEnv(EXAMPLE_DIR);

$AC = new BalintHorvath\ActiveCampaign\ActiveCampaign($dotenv->ActiveCampaign->URL, $dotenv->ActiveCampaign->Key);

