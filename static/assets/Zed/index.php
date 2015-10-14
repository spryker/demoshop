<?php

use PavFeature\Shared\Library\Application\Environment;
use Pyz\Zed\Application\Communication\ZedBootstrap;

define('ZED_START', microtime(true));
define('IS_CLI', false);

define('APPLICATION', 'ZED');
defined('APPLICATION_ROOT_DIR') or define('APPLICATION_ROOT_DIR', realpath(__DIR__ . '/../../..'));

//Multiple cores
require_once(APPLICATION_ROOT_DIR . '/vendor/project-a/spryker/Bundles/Library/src/PavFeature/Shared/Library/Application/Environment.php');
//End of multiple cores

Environment::initialize('Zed');

$bootstrap = new ZedBootstrap();
$bootstrap
    ->boot()
    ->run();