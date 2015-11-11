<?php

namespace Spryker\Refactor;

use Spryker\Refactor\Propel\AddNameToSchemaProperties;
use Spryker\Refactor\Propel\FixIndentationOfIdMethodParameter;

include_once __DIR__ . '/../vendor/autoload.php';

$refactorer = new Refactor();

$refactorer->addRefactorer(new AddNameToSchemaProperties());
$refactorer->addRefactorer(new FixIndentationOfIdMethodParameter());

$refactorer->run();
