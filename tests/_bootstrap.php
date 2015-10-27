<?php

use PavFeature\Shared\Library\SystemUnderTest\SystemUnderTestBootstrap;

require_once __DIR__ . '/../vendor/autoload.php';

$bootstrap = SystemUnderTestBootstrap::getInstance();
$bootstrap->bootstrap(SystemUnderTestBootstrap::APPLICATION_ZED);
