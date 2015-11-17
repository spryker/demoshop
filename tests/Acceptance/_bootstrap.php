<?php

use SprykerFeature\Shared\Library\SystemUnderTest\SystemUnderTestBootstrap;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../_helpers/EnvironmentalTestCaseInterface.php';

$bootstrap = SystemUnderTestBootstrap::getInstance();
$bootstrap->bootstrap(SystemUnderTestBootstrap::APPLICATION_ZED);
