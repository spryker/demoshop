<?php
/* YVES Front Controller */

use ProjectA\Shared\Library\Application\Environment;
use Pyz\Yves\Application\Communication\YvesBootstrap;

define('YVES_START', microtime(true));

define('APPLICATION', 'YVES');
defined('APPLICATION_ROOT_DIR') or define('APPLICATION_ROOT_DIR', realpath(__DIR__ . '/../../..'));

require_once(APPLICATION_ROOT_DIR . '/vendor/spryker/zed-package/src/ProjectA/Shared/Library/Application/Environment.php');

Environment::initialize();
\ProjectA_Shared_Library_Context::setDefaultContext(\ProjectA_Shared_Library_Context::CONTEXT_YVES);

$bootstrap = new YvesBootstrap();
$bootstrap
    ->boot()
    ->run();
