<?php

require_once 'vendor/autoload.php';

define('DS', DIRECTORY_SEPARATOR);

define('BASE_DIR', __DIR__.DS);

$dotenv = new Dotenv\Dotenv(BASE_DIR);
$dotenv->load();

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
   ]);

require_once 'Config/config.php';

$app->run();