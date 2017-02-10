<?php

require '../bootstrap/env.php';

use Slim\App;

$app = new App();

$app->get('/shop/category/list', 'Catalog\Category\CategoryList::run');

$app->run();