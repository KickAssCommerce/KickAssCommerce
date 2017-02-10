<?php

require '../bootstrap/env.php';

use Slim\App;

$app = new App();

//$container = new \Slim\Container;
/*$container['CategoryList'] = new \App\Catalog\Category\CategoryList(
    new \App\Application\Authenticator()
);*/

$container = $app->getContainer();

$container['CategoryList'] = function ($container) {
    $controller = new \App\Catalog\Category\CategoryList(
        new \App\Application\Authenticator()
    );
    //$controller->setContainer($container);

    return $controller;
};

$app->get('/shop/category/list', $container['CategoryList']);

$app->run();