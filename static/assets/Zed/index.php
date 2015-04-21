<?php

use Pyz\Zed\Application\Communication\ZedBootstrap;
use SprykerFeature\Shared\Library\Application\Environment;

define('ZED_START', microtime(true));
define('IS_CLI', false);

define('APPLICATION', 'ZED');
defined('APPLICATION_ROOT_DIR') or define('APPLICATION_ROOT_DIR', realpath(__DIR__ . '/../../..'));
require_once(APPLICATION_ROOT_DIR . '/vendor/spryker/zed-package/src/SprykerFeature/Shared/Library/Application/Environment.php');

Environment::initialize('Zed');

SprykerFeature_Shared_Library_Context::setDefaultContext(\SprykerFeature_Shared_Library_Context::CONTEXT_ZED);

if (file_exists(APPLICATION_SOURCE_DIR . '/Generated/Zed/DependencyInjectionContainer.php')) {
    require_once(APPLICATION_SOURCE_DIR . '/Generated/Zed/DependencyInjectionContainer.php');
}

$bootstrap = new ZedBootstrap();
$bootstrap
    ->boot()
    ->run();
