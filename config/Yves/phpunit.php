<?php

require_once __DIR__ . '/../../vendor/autoload.php';
$bootstrap = ProjectA\Shared\Library\SystemUnderTest\Bootstrap::getInstance();
$bootstrap->bootstrap('Yves', true);
