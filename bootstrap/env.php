<?php

// load configuration
$dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

// php environment
if (getenv('ENV_DEBUG')) {
    ini_set('display_errors', 1);
}

define('APP_BASE_DIR', __DIR__ . '/../');

date_default_timezone_set(getenv('ENV_TIMEZONE'));

// Initialize an application aspect container
$applicationAspectKernel = \KickAss\Commerce\ApplicationAspectKernel::getInstance();
$applicationAspectKernel->init(
    [
        'debug' => (getenv('ENV_DEBUG') ? true : false),
        // Cache directory
        'cacheDir'  => APP_BASE_DIR . 'storage/cache/aop',
        // Include paths restricts the directories where aspects should be applied, or empty for all source files
        'includePaths' => [
            APP_BASE_DIR . 'src/'
        ]
    ]
);

// routing urls to controllers
$routes = [
    '/shop/product/{slug}' => '\KickAss\Commerce\Product\RouterContainer::view',
    '/shop/category/list' => '\KickAss\Commerce\Product\RouterContainer::listing'
];