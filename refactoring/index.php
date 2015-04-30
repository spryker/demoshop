<?php

require_once(__DIR__ . '/../vendor/autoload.php');

spl_autoload_register(function ($class) {
    $class = str_replace(['ReneFactor', '\\'], ['', DIRECTORY_SEPARATOR], $class);
    $classPath = __DIR__ . DIRECTORY_SEPARATOR . $class . '.php';

    require_once $classPath;
});

use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Logger\ConsoleLogger;

$consoleLogger = new ConsoleLogger(
    new ConsoleOutput(OutputInterface::VERBOSITY_DEBUG)
);
$consoleLogger->info('starting refactoring');

$refactor = new \ReneFactor\TransferToXml($consoleLogger);
//$refactor->refactor();

$refactor = new \ReneFactor\TransferAccess($consoleLogger);
$refactor->refactor();

$refactor = new \ReneFactor\EntityAccess($consoleLogger);
//$refactor->refactor();
