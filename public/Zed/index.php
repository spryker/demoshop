<?php

use Spryker\Shared\Library\Application\Environment;
use Pyz\Zed\Application\Communication\ZedBootstrap;

define('ZED_START', microtime(true));
define('APPLICATION', 'ZED');
defined('APPLICATION_ROOT_DIR') or define('APPLICATION_ROOT_DIR', realpath(__DIR__ . '/../..'));
require_once APPLICATION_ROOT_DIR . '/vendor/spryker/spryker/Bundles/Library/src/Spryker/Shared/Library/Application/Environment.php';

Environment::initialize('Zed');

$bootstrap = new ZedBootstrap();
$bootstrap
    ->boot()
    ->run();
