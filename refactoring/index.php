<?php

namespace Spryker\Refactor;

use SprykerFeature\Zed\Development\Business\Refactor\RefactorRunner;
use SprykerFeature\Zed\Development\Business\Refactor\Plugin\RefactorPluginInstantiation;
use SprykerFeature\Zed\Development\Business\Refactor\Yves\RemoveCommunicationLayer;

include_once __DIR__ . '/../vendor/autoload.php';

define('APPLICATION_ROOT_DIR', realpath(__DIR__ . '/../'));

$refactorer = new RefactorRunner();

$refactorer->addRefactorer(new RefactorPluginInstantiation([
    __DIR__ . '/../src/Pyz/',
]));
$refactorer->addRefactorer(new RemoveCommunicationLayer([
    __DIR__ . '/../src/Pyz/Yves',
    __DIR__ . '/../static/assets/Yves/',
    __DIR__ . '/../static/public/Yves/',
]));

$refactorer->run();
