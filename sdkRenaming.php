<?php

include_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Filesystem\Filesystem;

$pathsToFiles = [
    __DIR__ . '/src/',
    __DIR__ . '/tests/',
    __DIR__ . '/vendor/spryker/spryker/',
];

$pathsToSdkFiles = [
    __DIR__ . '/src/Pyz/Sdk',
    __DIR__ . '/tests/',
    __DIR__ . '/vendor/spryker/spryker/Bundles/*/src/*/Sdk',
    __DIR__ . '/vendor/spryker/spryker/Bundles/*/tests/*/*/Sdk',
];

/**
 * @param array $pathsToFiles
 * @param string $fileNamePattern
 *
 * @return SplFileInfo[] $files
 */
$files = function (array $pathsToFiles, $fileNamePattern = null) {
    $finder = new Finder();
    $finder->files()->in($pathsToFiles);
    if ($fileNamePattern) {
        $finder->name($fileNamePattern);
    }

    return $finder;
};

$filesystem = new Filesystem();
/** @var SplFileInfo $file */
foreach ($files($pathsToSdkFiles) as $file) {
    $target = str_replace('/Sdk/', '/Client/', $file->getPathname());
    $filesystem->rename($file->getPathname(), $target, true);
echo '<pre>' . PHP_EOL . var_dump($file) . PHP_EOL . 'Line: ' . __LINE__ . PHP_EOL . 'File: ' . __FILE__ . die();
}






//Classes in Yves = Stub which connect to Zed are called Stub
//Client/Cart/CartStub

//Classes in Zed which communicate with the Client (in Yves) are called Gateway
//SprykerFeature\Zed\Cart\Communication\Controller\GatewayController

// Find all Sdk files and move them to Api directory
