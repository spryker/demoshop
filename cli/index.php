<?php

use ProjectA\Shared\Library\Application\Environment;
use ProjectA\Shared\Library\Application\TestEnvironment;
use Pyz\Zed\Application\Module\ZedBootstrap;

$getEnv = getenv('APPLICATION_ENV');
if (empty($getEnv)) {
    echo 'NO APPLICATION_ENV SET!' . PHP_EOL;
    echo ' use: APPLICATION_ENV=staging php index.php [...]' . PHP_EOL;
    die();
}

define('IS_ACL_DISABLED', true);
define('IS_CLI', true);

define('APPLICATION', 'ZED');
defined('APPLICATION_ROOT_DIR') or define('APPLICATION_ROOT_DIR', realpath(__DIR__ . '/../'));
require_once(APPLICATION_ROOT_DIR . '/vendor/project-a/library-package/src/ProjectA/Shared/Library/Application/Environment.php');

Environment::initialize();
TestEnvironment::initialize();

ProjectA_Shared_Library_Context::setDefaultContext(\ProjectA_Shared_Library_Context::CONTEXT_ZED);

if (file_exists(APPLICATION_SOURCE_DIR . '/Generated/Zed/DependencyInjectionContainer.php')) {
    require_once(APPLICATION_SOURCE_DIR . '/Generated/Zed/DependencyInjectionContainer.php');
}
\ProjectA_Shared_Library_NewRelic_Api::getInstance()->markAsBackgroundJob(false);

$bootstrap = new ZedBootstrap();
$bootstrap
    ->boot()
    ->run();
//
//
//
//Zend_Controller_Front::getInstance()
//    ->setRouter( new \ProjectA_Zed_Library_Controller_Router_Cli() )
//    ->setRequest( new \ProjectA_Zed_Library_Controller_Request_Cli() )
//    ->setResponse( new \ProjectA_Zed_Library_Controller_Response_Cli() )
//    ->setParam('disableOutputBuffering', 1);
//
//$application->run();
