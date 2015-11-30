<?php

use SprykerFeature\Zed\Development\Business\Refactor\RefactorRunner;
use SprykerFeature\Zed\Development\Business\Refactor\Transfer\RemoveTransferInterfaces;

include_once __DIR__ . '/../vendor/autoload.php';

$refactorer = new RefactorRunner();

$refactorer->addRefactorer(new RemoveTransferInterfaces([
    __DIR__ . '/../src/Pyz/',
    __DIR__ . '/../vendor/spryker/spryker/Bundles/',
]));

$refactorer->run();
