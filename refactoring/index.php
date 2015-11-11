<?php

namespace Spryker\Refactor;

use Spryker\Refactor\Propel\AddNameToSchemaProperties;

include_once __DIR__ . '/../vendor/autoload.php';

$refactorer = new Refactor();

$refactorer->addRefactorer(new AddNameToSchemaProperties());

$refactorer->run();

