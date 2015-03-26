<?php

use ProjectA\Shared\Library\Application\Environment;
use ProjectA\Shared\Library\Application\TestEnvironment;
use Pyz\Zed\Application\Communication\ZedBootstrap;

define('ZED_START', microtime(true));
define('IS_CLI', false);

define('APPLICATION', 'ZED');
defined('APPLICATION_ROOT_DIR') or define('APPLICATION_ROOT_DIR', realpath(__DIR__ . '/../../..'));

Environment::initialize();
TestEnvironment::initialize();

ProjectA_Shared_Library_Context::setDefaultContext(\ProjectA_Shared_Library_Context::CONTEXT_ZED);

if (file_exists(APPLICATION_SOURCE_DIR . '/Generated/Zed/DependencyInjectionContainer.php')) {
    require_once(APPLICATION_SOURCE_DIR . '/Generated/Zed/DependencyInjectionContainer.php');
}

//// PHP < 5.5 Fallback
if (!function_exists('array_column')) {
    function array_column(array $a, $name)
    {
        $b = [];
        foreach ($a as $aa) {
            if (isset($aa[$name])) {
                $b[] = $aa[$name];
            }
        }

        return $b;
    }
}

$bootstrap = new ZedBootstrap();
$bootstrap
    ->boot()
    ->run();
