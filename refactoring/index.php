<?php

namespace Spryker\Refactor;

use Spryker\Refactor\ProductRenaming\RenameProduct;
use Spryker\Zed\Development\Business\Refactor\RefactorRunner;

include_once __DIR__ . '/../vendor/autoload.php';

define('APPLICATION_ROOT_DIR', realpath(__DIR__ . '/../'));

$refactorer = new RefactorRunner();

$refactorer->addRefactorer(new RenameProduct());
$refactorer->run();
