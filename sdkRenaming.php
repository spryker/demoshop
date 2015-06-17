<?php

include_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Filesystem\Filesystem;

$pathsToFiles = [
    __DIR__ . '/src/Pyz',
    __DIR__ . '/tests/',
    __DIR__ . '/vendor/spryker/spryker/Bundles',
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

/**
 * @param Finder $files
 */
$moveSdkToClient = function (Finder $files) {
    $filesystem = new Filesystem();
    /** @var SplFileInfo $file */
    foreach ($files as $file) {
        $target = str_replace('/Sdk/', '/Client/', $file->getPathname());
        $filesystem->copy($file->getPathname(), $target, true);
        $filesystem->remove($file->getPathname());
    }
};

/**
 * @param Finder $files
 */
$renameSdkToClient = function (Finder $files) {
    $filesystem = new Filesystem();
    /** @var SplFileInfo $file */
    foreach ($files as $file) {
        $content = str_replace(['\\Sdk\\', '/Sdk/', '/sdk/'], ['\\Client\\', '/Client/', '/client/'], $file->getContents());
        file_put_contents($file->getPathname(), $content);
    }
};

$moveSdkToClient($files($pathsToSdkFiles));
$renameSdkToClient($files($pathsToFiles));






//Classes in Yves = Stub which connect to Zed are called Stub
//Client/Cart/CartStub

//Classes in Zed which communicate with the Client (in Yves) are called Gateway
//SprykerFeature\Zed\Cart\Communication\Controller\GatewayController
