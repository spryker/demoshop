<?php

use Pyz\Yves\Application\YvesBootstrap;
use Spryker\Shared\Config\Application\Environment;

use Spryker\Shared\ErrorHandler\ErrorHandlerEnvironment;

if (extension_loaded('newrelic')) {
    newrelic_start_transaction(getenv('NEW_RELIC_APP_NAME'), getenv('NEW_RELIC_LICENSE_KEY'));
}

define('APPLICATION', 'YVES');
defined('APPLICATION_ROOT_DIR') || define('APPLICATION_ROOT_DIR', realpath(__DIR__ . '/../..'));

include APPLICATION_ROOT_DIR . '/c3.php';
require_once APPLICATION_ROOT_DIR . '/vendor/autoload.php';

Environment::initialize();

$errorHandlerEnvironment = new ErrorHandlerEnvironment();
$errorHandlerEnvironment->initialize();

$bootstrap = new YvesBootstrap();
$bootstrap
    ->boot()
    ->run();
