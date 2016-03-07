<?php

use Spryker\Shared\Library\SystemUnderTest\SystemUnderTestBootstrap;

$pathToComposerAutoload = __DIR__ . '/../vendor/autoload.php';
define('COMPOSER_AUTOLOAD', $pathToComposerAutoload);

require_once COMPOSER_AUTOLOAD;

require_once __DIR__ . '/_helpers/EnvironmentalTestCaseInterface.php';

$bootstrap = SystemUnderTestBootstrap::getInstance();
$bootstrap->bootstrap(SystemUnderTestBootstrap::APPLICATION_ZED);
