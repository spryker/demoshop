<?php

require_once __DIR__ . '/../../vendor/autoload.php';
$bootstrap = ProjectA\Shared\Library\SystemUnderTest\SystemUnderTestBootstrap::getInstance();
$bootstrap->bootstrap(\ProjectA\Shared\Library\SystemUnderTest\SystemUnderTestBootstrap::APPLICATION_SHARED);
