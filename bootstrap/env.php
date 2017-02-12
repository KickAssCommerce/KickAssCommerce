<?php

// load configuration
$dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

// php environment
if (getenv('ENV_DEBUG')) {
    ini_set('display_errors', 1);
}

date_default_timezone_set(getenv('ENV_TIMEZONE'));

// Initialize an application aspect container
$applicationAspectKernel = \KickAss\Commerce\ApplicationAspectKernel::getInstance();
$applicationAspectKernel->init(array(
    'debug' => (getenv('ENV_DEBUG') ? true : false),
    // Cache directory
    'cacheDir'  => __DIR__ . '/../storage/cache/aop',
    // Include paths restricts the directories where aspects should be applied, or empty for all source files
    'includePaths' => array(
        __DIR__ . '/../src/'
    )
));

// routing urls to controllers
$routes = [
    '/shop/product/{slug}' => '\KickAss\Commerce\Product\RouterContainer::view',
    '/shop/category/list' => '\KickAss\Commerce\Product\RouterContainer::listing'
];