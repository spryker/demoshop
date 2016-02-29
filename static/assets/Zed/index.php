<?php

use Pyz\Zed\Application\Communication\ZedBootstrap;
use Spryker\Shared\Library\Application\Environment;

define('ZED_START', microtime(true));

define('APPLICATION', 'ZED');
defined('APPLICATION_ROOT_DIR') || define('APPLICATION_ROOT_DIR', realpath(__DIR__ . '/../../..'));

require_once APPLICATION_ROOT_DIR . '/vendor/autoload.php';

Environment::initialize('Zed');
$bootstrap = new ZedBootstrap();
$bootstrap
    ->boot()
    ->run();
