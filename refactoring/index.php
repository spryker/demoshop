<?php

namespace Spryker\Refactor;

use Spryker\Refactor\DependencyContainer\RemoveFactoryUse;
use SprykerFeature\Zed\Development\Business\Refactor\RefactorRunner;

include_once __DIR__ . '/../vendor/autoload.php';

$refactorer = new RefactorRunner();

$refactorer->addRefactorer(new RemoveFactoryUse());
$refactorer->run();
