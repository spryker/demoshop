<?php

use Pyz\Zed\Application\Communication\ZedBootstrap;
use Spryker\Shared\Config\Application\Environment;

use Spryker\Shared\ErrorHandler\ErrorHandlerEnvironment;

define('APPLICATION', 'ZED');
defined('APPLICATION_ROOT_DIR') || define('APPLICATION_ROOT_DIR', realpath(__DIR__ . '/../..'));

require_once APPLICATION_ROOT_DIR . '/vendor/autoload.php';

Environment::initialize();

if (file_exists(__DIR__ . '/maintenance.marker')) {
    echo file_get_contents(__DIR__ . '/maintenance/index.html');
    die();
}

$errorHandlerEnvironment = new ErrorHandlerEnvironment();
$errorHandlerEnvironment->initialize();

$bootstrap = new ZedBootstrap();
$bootstrap
    ->boot()
    ->run();
