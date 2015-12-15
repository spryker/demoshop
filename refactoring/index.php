<?php

namespace Spryker\Refactor;

use Spryker\Zed\Development\Business\Refactor\RefactorRunner;
use Spryker\Zed\Development\Business\Refactor\SprykerNamespace\RefactorNamespaces;

include_once __DIR__ . '/../vendor/autoload.php';

define('APPLICATION_ROOT_DIR', realpath(__DIR__ . '/../'));

$refactorer = new RefactorRunner();

$dirs = [
    __DIR__ . '/../src',
    __DIR__ . '/../config',
    __DIR__ . '/../static',
    __DIR__ . '/../tests',
];

$refactorer->addRefactorer(new RefactorNamespaces($dirs));
$refactorer->run();
