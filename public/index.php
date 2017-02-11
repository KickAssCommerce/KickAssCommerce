<?php

require '../bootstrap/env.php';

$app = new Slim\App(['settings' => ['displayErrorDetails' => (getenv('ENV_DEBUG') ? true : false)]]);

foreach ($routes as $uri => $containerPath) {
    $app->get($uri, $containerPath());
}

$app->run();