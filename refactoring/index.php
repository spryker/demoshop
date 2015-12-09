<?php

namespace Spryker\Refactor;

use Spryker\Refactor\DependencyContainer\OneNewPerMethod;
use SprykerFeature\Zed\Development\Business\Refactor\RefactorRunner;

include_once __DIR__ . '/../vendor/autoload.php';

define('APPLICATION_ROOT_DIR', realpath(__DIR__ . '/../'));

$refactorer = new RefactorRunner();

$refactorer->addRefactorer(new OneNewPerMethod());
$refactorer->run();
