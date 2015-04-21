<?php

require_once __DIR__ . '/../../vendor/autoload.php';
$bootstrap = SprykerFeature\Shared\Library\SystemUnderTest\SystemUnderTestBootstrap::getInstance();
$bootstrap->bootstrap(\SprykerFeature\Shared\Library\SystemUnderTest\SystemUnderTestBootstrap::APPLICATION_SHARED);
