<?php

use Pyz\Yves\Application\YvesBootstrap;
use Spryker\Shared\Library\Application\Environment;

define('APPLICATION', 'YVES');
defined('APPLICATION_ROOT_DIR') || define('APPLICATION_ROOT_DIR', realpath(__DIR__ . '/../..'));

require_once APPLICATION_ROOT_DIR . '/vendor/autoload.php';

Environment::initialize();

$bootstrap = new YvesBootstrap();
$bootstrap
    ->boot()
    ->run();
