<?php

require '../bootstrap/env.php';

use Slim\App;

$app = new App();

foreach ($routes as $uri => $containerPath) {
    $app->get($uri, $containerPath);
}

$app->run();