<?php

use Pyz\Yves\Application\YvesBootstrap;
use Spryker\Shared\Config\Application\Environment;

use Spryker\Shared\ErrorHandler\ErrorHandlerEnvironment;

define('APPLICATION', 'YVES');
defined('APPLICATION_ROOT_DIR') || define('APPLICATION_ROOT_DIR', realpath(__DIR__ . '/../..'));

require_once APPLICATION_ROOT_DIR . '/vendor/autoload.php';

Environment::initialize();

$errorHandlerEnvironment = new ErrorHandlerEnvironment();
$errorHandlerEnvironment->initialize();

$bootstrap = new YvesBootstrap();
$bootstrap
    ->boot()
    ->run();
