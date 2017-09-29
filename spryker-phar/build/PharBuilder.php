<?php

$root = dirname(__FILE__) . '/..';
$phar = new Phar($root . '/build/spryker.phar', 0, 'spryker.phar');
$phar->buildFromDirectory($root . '/src');
$phar->setStub($phar->createDefaultStub('index.php', 'src/index.php'));
