<?php
/* YVES Front Controller */


use Pyz\Yves\Application\Communication\YvesBootstrap;
use SprykerFeature\Shared\Library\Application\Environment;

define('YVES_START', microtime(true));

define('APPLICATION', 'YVES');
defined('APPLICATION_ROOT_DIR') or define('APPLICATION_ROOT_DIR', realpath(__DIR__ . '/../../..'));

require_once(APPLICATION_ROOT_DIR . '/vendor/spryker/zed-package/src/SprykerFeature/Shared/Library/Application/Environment.php');

Environment::initialize('Yves');
\SprykerFeature_Shared_Library_Context::setDefaultContext(\SprykerFeature_Shared_Library_Context::CONTEXT_YVES);

$bootstrap = new YvesBootstrap();
$bootstrap
    ->boot()
    ->run();
