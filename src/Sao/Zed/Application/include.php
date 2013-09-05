<?php

define('APPLICATION', 'ZED');
defined('APPLICATION_ROOT') or define('APPLICATION_ROOT', realpath(__DIR__ . '/../../../..'));

require_once(APPLICATION_ROOT . '/vendor/project-a/library-package/src/ProjectA/Shared/Library/Application/Environment.php');
ProjectA\Shared\Library\Application\Environment::initialize();
ProjectA\Shared\Library\Application\TestEnvironment::initialize();

$pathToDependencyInjectionContainer = APPLICATION_PROJECT . '/Generated/Zed/DependencyInjectionContainer.php';
if (file_exists($pathToDependencyInjectionContainer)) {
    require_once($pathToDependencyInjectionContainer);
}

ProjectA_Shared_Library_Context::setDefaultContext(ProjectA_Shared_Library_Context::CONTEXT_ZED);
