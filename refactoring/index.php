<?php

namespace Spryker\Refactor;

use Spryker\Refactor\Propel\RenameDatabaseTables;
use Spryker\Zed\Development\Business\Refactor\RefactorRunner;

include_once __DIR__ . '/../vendor/autoload.php';

define('APPLICATION_ROOT_DIR', realpath(__DIR__ . '/../'));

$refactorer = new RefactorRunner();

$refactorer->addRefactorer(new RenameDatabaseTables());
$refactorer->run();
