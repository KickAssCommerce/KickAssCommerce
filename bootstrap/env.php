<?php

require '../vendor/autoload.php';

// load configuration
$dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

// php environment
if (getenv('ENV_DEBUG')) {
    ini_set('display_errors', 1);
}

date_default_timezone_set(getenv('ENV_TIMEZONE'));


$routes = [
    '/shop/product/{slug}' => '\KickAss\Commerce\Product\RouterContainer::view',
    '/shop/category/list' => '\KickAss\Commerce\Product\RouterContainer::listing'
];