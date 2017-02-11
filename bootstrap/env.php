<?php

require '../vendor/autoload.php';

// load configuration
$dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

$routes = [
    '/shop/product/{slug}' => '\KickAss\Commerce\Product\RouterContainer::view',
    '/shop/category/list' => '\KickAss\Commerce\Product\RouterContainer::listing'
];