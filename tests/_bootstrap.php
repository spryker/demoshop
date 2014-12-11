<?php
// This is global bootstrap for autoloading

require_once __DIR__ . '/../vendor/autoload.php';

define('APPLICATION_ENV', 'development');
define('APPLICATION_STORE', 'DE');

$bootstrap = ProjectA\Shared\Library\SystemUnderTest\SystemUnderTestBootstrap::getInstance();
$bootstrap->bootstrap('Zed', true);