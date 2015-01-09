<?php

require_once(__DIR__ . '/vendor/autoload.php');

$vendorDirPattern = __DIR__ . '/vendor/spryker/*/src/ProjectA/Zed/*/Persistence';
$projectDirPattern = __DIR__ . '/src/Pyz/Zed/*/Persistence';

$baseDirs = [
    $vendorDirPattern,
    $projectDirPattern
];

// Move classes
$finder = new \Symfony\Component\Finder\Finder();
$filesystem = new \Symfony\Component\Filesystem\Filesystem();
/* @var $file \Symfony\Component\Finder\SplFileInfo */
foreach ($finder->files()->in($vendorDirPattern)->name('*.php')->depth(0) as $file) {
    $newPath = str_replace($file->getRelativePathname(), '', $file->getPathname()) . 'Propel/' . $file->getRelativePathname();
//    $filesystem->copy($file->getPathname(), $newPath);
//    $filesystem->remove($file->getPathname());

    echo $newPath . PHP_EOL;

}
