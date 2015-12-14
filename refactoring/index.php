<?php

namespace Spryker\Refactor;

use SprykerFeature\Zed\Development\Business\Refactor\Client\RemoveServiceLayer;
use SprykerFeature\Zed\Development\Business\Refactor\RefactorRunner;

include_once __DIR__ . '/../vendor/autoload.php';

define('APPLICATION_ROOT_DIR', realpath(__DIR__ . '/../'));

$refactorer = new RefactorRunner();

$refactorer->addRefactorer(new RemoveServiceLayer([
    __DIR__ . '/../src/Pyz',
]));
$refactorer->run();
