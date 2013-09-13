<?php
/* YVES Front Controller */

use ProjectA\Shared\Library\Application\Environment;
use ProjectA\Shared\Library\Error\ErrorLogger;
use Pyz\Yves\Application\Module\Bootstrap;

define('YVES_START', microtime(true));

define('APPLICATION', 'YVES');
defined('APPLICATION_ROOT_DIR') or define('APPLICATION_ROOT_DIR', realpath(__DIR__ . '/../../..'));

require_once(APPLICATION_ROOT_DIR . '/vendor/project-a/library-package/src/ProjectA/Shared/Library/Application/Environment.php');

Environment::initialize();
ProjectA_Shared_Library_Context::setDefaultContext(ProjectA_Shared_Library_Context::CONTEXT_YVES);

$bootstrap = new Bootstrap();
$bootstrap
    ->boot()
    ->run(Bootstrap::getRequest());
