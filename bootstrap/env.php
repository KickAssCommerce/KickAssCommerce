<?php

require '../vendor/autoload.php';

// load configuration
$dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

$routes = [
    '/shop/product/{identifier}' => '\App\Product\RouterContainer::view',
    '/shop/category/list' => '\App\Product\RouterContainer::listing'
];