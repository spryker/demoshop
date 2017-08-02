<?php

define('PROJECT_ROOT', __DIR__ . '/..');

require PROJECT_ROOT . '/vendor/autoload.php';

require_once __DIR__ . '/Console/Command/RefactorCommand.php';
require_once __DIR__ . '/Console/ConsoleHelper.php';
require_once __DIR__ . '/Console/Bootstrap.php';

use Refactor\Console\Bootstrap;
use Refactor\Console\Command\RefactorCommand;

$console = new Bootstrap();
$console->add(new RefactorCommand());
$console->run();
