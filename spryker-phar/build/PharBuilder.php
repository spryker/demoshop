<?php

ini_set("phar.readonly", 0);

$root = realpath(dirname(__FILE__) . '/..');

$pharFilePath = $root . '/build/spryker.phar';

if (file_exists($pharFilePath)) {
    unlink($pharFilePath);
}

$phar = new Phar($pharFilePath, 0, 'spryker.phar');

$srcIterator = new RecursiveDirectoryIterator($root . '/src', FilesystemIterator::SKIP_DOTS);
$vendorIterator = new RecursiveDirectoryIterator($root . '/vendor', FilesystemIterator::SKIP_DOTS);

$iterator = new AppendIterator();
$iterator->append(new RecursiveIteratorIterator($srcIterator));
$iterator->append(new RecursiveIteratorIterator($vendorIterator));
$phar->buildFromIterator($iterator, $root);
//$phar->
$phar->setStub($phar->createDefaultStub('src/index.php'));
