<?php

namespace Spryker\Refactor;

use Spryker\Refactor\Transfer\RemoveTransferInterfaces;

include_once __DIR__ . '/../vendor/autoload.php';

$refactorer = new Refactor();

$refactorer->addRefactorer(new RemoveTransferInterfaces());

$refactorer->run();
