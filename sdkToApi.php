<?php

include_once __DIR__ . '/vendor/autoload.php';

$pathsToFiles = [
    __DIR__ . '/src/',
    __DIR__ . '/tests/',
    __DIR__ . '/vendor/spryker/spryker/',
];

$pathsToSdkFiles = [
    __DIR__ . '/src/Pyz/Sdk',
    __DIR__ . '/tests/',
    __DIR__ . '/vendor/spryker/spryker/',
];


// Find all Sdk files and move them to Api directory
$finder = new \Symfony\Component\Finder\Finder();
$finder->files()->in();
