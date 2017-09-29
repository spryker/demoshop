<?php

require __DIR__ . '/../vendor/autoload.php';

use Spryker\Console\DescribeConsoleCommand;
use Spryker\Console\SetupConsoleCommand;
use Symfony\Component\Console\Application;

define('SPRYKER_ROOT', __DIR__);

$application = new Application();

$application->addCommands([
    new SetupConsoleCommand(),
    new DescribeConsoleCommand(),
]);

$application->run();
