<?php
/* YVES Front Controller */

use PavFeature\Shared\Library\Application\Environment;
use Pyz\Yves\Application\Communication\YvesBootstrap;


define('YVES_START', microtime(true));

define('APPLICATION', 'YVES');
defined('APPLICATION_ROOT_DIR') or define('APPLICATION_ROOT_DIR', realpath(__DIR__ . '/../../..'));

//Multiple cores
require_once(APPLICATION_ROOT_DIR . '/vendor/project-a/spryker/Bundles/Library/src/PavFeature/Shared/Library/Application/Environment.php');
//End of multiple cores

Environment::initialize('Yves');

$bootstrap = new YvesBootstrap();
$bootstrap
    ->boot()
    ->run();
