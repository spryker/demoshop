<?php

use ProjectA\Shared\Library\Application\Environment;
use ProjectA\Shared\Library\Application\TestEnvironment;
use Pyz\Zed\Application\Module\ZedBootstrap;

define('ZED_START', microtime(true));
define('IS_CLI', false);

define('APPLICATION', 'ZED');
defined('APPLICATION_ROOT_DIR') or define('APPLICATION_ROOT_DIR', realpath(__DIR__ . '/../../..'));
require_once(APPLICATION_ROOT_DIR . '/vendor/spryker/library-package/src/ProjectA/Shared/Library/Application/Environment.php');

Environment::initialize();
TestEnvironment::initialize();

ProjectA_Shared_Library_Context::setDefaultContext(\ProjectA_Shared_Library_Context::CONTEXT_ZED);

if (file_exists(APPLICATION_SOURCE_DIR . '/Generated/Zed/DependencyInjectionContainer.php')) {
    require_once(APPLICATION_SOURCE_DIR . '/Generated/Zed/DependencyInjectionContainer.php');
}

$bootstrap = new ZedBootstrap();
$bootstrap
    ->boot()
    ->run();
