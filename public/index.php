<?php

require '../bootstrap/env.php';

use Slim\App;

$container = new \Slim\Container;
$container['authenticator'] = new \App\Application\Authenticator();

$app = new App($container);

$app->get('/shop/category/list', \App\Catalog\Category\CategoryList::class);

$app->run();