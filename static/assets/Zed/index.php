<?php

use SprykerFeature\Shared\Library\Application\Environment;
use SprykerFeature\Shared\Library\Application\TestEnvironment;
use Pyz\Zed\Application\Communication\ZedBootstrap;

define('ZED_START', microtime(true));
define('IS_CLI', false);

define('APPLICATION', 'ZED');
defined('APPLICATION_ROOT_DIR') or define('APPLICATION_ROOT_DIR', realpath(__DIR__ . '/../../..'));
require_once(APPLICATION_ROOT_DIR . '/vendor/spryker/library/src/SprykerFeature/Shared/Library/Application/Environment.php');

Environment::initialize('Zed');

$bootstrap = new ZedBootstrap();
$bootstrap
    ->boot()
    ->run();
