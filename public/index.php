<?php

require '../bootstrap/env.php';

use Slim\App;

$app = new App();

$container = $app->getContainer();

$container['CategoryList'] = function ($container) {
    $controller = new \App\Catalog\Category\CategoryList(
        new \App\Application\Authenticator(),
        new \App\Application\Product()
    );

    return $controller;
};

$app->get('/shop/category/list', $container['CategoryList']);

$app->run();