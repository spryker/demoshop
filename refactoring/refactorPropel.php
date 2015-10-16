<?php

include_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\Filesystem\Filesystem;

$filesystem = new Filesystem();

/**
 * @param array $directories
 *
 * @return SplFileInfo[]|Finder
 */
function getFiles(array $directories)
{
    foreach ($directories as $key => $directory) {
        if (!glob($directory)) {
            unset($directories[$key]);
        }
    }
    $finder = new Finder();
    $finder->files()->in($directories);

    return $finder;
}

$renameNamespaceAndPackage = function () {

};

$addBaseClassToTables = function () {

};

$makeVendorClassesAbstract = function () {

};
