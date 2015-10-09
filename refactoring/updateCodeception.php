<?php

include_once(__DIR__ . '/../vendor/autoload.php');

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
    $finder = new Finder();
    $finder->files()->in($directories);

    return $finder;
}

/**
 * @param array $directories
 *
 * @return SplFileInfo[]|Finder
 */
function getDirectories(array $directories)
{
    $finder = new Finder();
    $finder->directories()->in($directories);

    return $finder;
}

// ClientUnit.suite.yml
// Functional.suite.yml
// Unit.suite.yml

// $files = getFiles([$directory->getPathname()]);
// /** @var $file SplFileInfo */
// foreach ($files as $file) {
//     $filesystem->remove($file);
// }


$createBundleList = function () use ($filesystem) {
    $directories = [
        __DIR__ . '/../vendor/spryker/spryker/Bundles/'
    ];
    $directories = getDirectories($directories)->depth(0);

    $bundleList = [];
    /** @var $directory SplFileInfo */
    foreach ($directories as $directory) {
        if (file_exists($directory->getPathname() . '/codeception.yml')) {
            $bundle = '- vendor/spryker/spryker/Bundles/' . $directory->getRelativePathname();
            $bundleList[] = $bundle;
        }
    }
    $file = __DIR__ . '/bundle.list';
    $filesystem->dumpFile($file, implode("\n", $bundleList));
};

$updateSuiteYml = function ($suite) use ($filesystem) {
    $directories = [
        __DIR__ . '/../vendor/spryker/spryker/Bundles/'
    ];
    $directories = getDirectories($directories)->depth(0);

    $bundleList = [];
    /** @var $directory SplFileInfo */
    foreach ($directories as $directory) {
        $file = $directory->getPathname() . '/tests/' . $suite . '.suite.yml';
        if (file_exists($file)) {
            $bundle = $directory->getRelativePathname();
            $template = __DIR__ . '/UpdateCodeception/' . $suite . '.suite.yml';
            $content = file_get_contents($template);
            $search = '{{BUNDLE}}';
            $replace = $bundle;
            $content = str_replace($search, $replace, $content);
            file_put_contents($file, $content);
        }
    }
};

$createBundleList();
//$updateSuiteYml('Functional');
//$updateSuiteYml('Unit');
