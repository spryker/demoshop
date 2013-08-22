<?php
/**
 * YVES Front Controller
 */

use ProjectA\Shared\Library\Application\Environment;
use ProjectA\Shared\Library\Error\ErrorLogger;
use Sao\Yves\Application\Bootstrap;

define('YVES_START', microtime(true));

define('APPLICATION', 'YVES');
defined('APPLICATION_ROOT') or define('APPLICATION_ROOT', realpath(__DIR__ . '/../../..'));

require_once(APPLICATION_ROOT . '/vendor/project-a/library-package/ProjectA/Shared/Library/Application/Environment.php');

Environment::initialize();

(new Bootstrap())->bootAndRun();
ProjectA_Shared_Library_Context::setDefaultContext(ProjectA_Shared_Library_Context::CONTEXT_YVES);
