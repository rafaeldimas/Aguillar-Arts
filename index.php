<?php
require_once 'vendor/autoload.php';

define('DS', DIRECTORY_SEPARATOR);

define('BASE_DIR', __DIR__.DS);

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
   ]);

require_once 'Config/config.php';

$app->run();