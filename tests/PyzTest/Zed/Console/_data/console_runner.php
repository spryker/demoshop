<?php

const APPLICATION_ENV = 'development';
const APPLICATION_STORE = 'DE';
const APPLICATION_ROOT_DIR = __DIR__ . '/cli_sandbox';
const APPLICATION_VENDOR_DIR = __DIR__ . '/../../../../../vendor';
const APPLICATION_SOURCE_DIR = APPLICATION_ROOT_DIR . '/src/';

require_once APPLICATION_VENDOR_DIR . '/autoload.php';

$bootstrap = new Spryker\Zed\Console\Communication\ConsoleBootstrap();
$bootstrap->run();
