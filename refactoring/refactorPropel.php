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
    $directories = [
        __DIR__ . '/../src/Pyz/Zed/*/Persistence/Propel/Schema/',
        __DIR__ . '/../vendor/spryker/spryker/Bundles/*/src/*/Zed/*/Persistence/Propel/Schema/',
    ];

    $filesystem = new Filesystem();
    $schemas = getFiles($directories)->name('*.schema.xml');
    /** @var SplFileInfo $schema */
    foreach ($schemas as $schema) {
        $content = $schema->getContents();
        $content = preg_replace('/namespace="(.*?)"/', 'namespace="Propel"', $content);
        $content = preg_replace('/\spackage="(.*?)"/', ' package="src.Propel"', $content);

        $filesystem->dumpFile($schema->getPathname(), $content);
    }
};

$addBaseClassToTables = function () {
    $directories = [
        __DIR__ . '/../src/Pyz/Zed/*/Persistence/Propel/Schema/',
        __DIR__ . '/../vendor/spryker/spryker/Bundles/*/src/*/Zed/*/Persistence/Propel/Schema/',
    ];

    $filesystem = new Filesystem();
    $schemas = getFiles($directories)->name('*.schema.xml');
    /** @var SplFileInfo $schema */
    foreach ($schemas as $schema) {


        $content = $schema->getContents();
        $filter = new \Zend\Filter\Word\UnderscoreToCamelCase();
        $bundleNameFromSchema = str_replace(['spy_', '.schema.xml'], '', $schema->getRelativePathname());
        $bundleNameFromSchema = $filter->filter($bundleNameFromSchema);
        $nameParts = explode('/', $schema->getPathname());
        array_pop($nameParts);
        array_pop($nameParts);
        $nameParts = array_slice($nameParts, -5);
        $nameParts[2] = $bundleNameFromSchema;
        $currentNamespace = implode('\\', array_slice($nameParts, -5));

        $callback = function ($match) use ($currentNamespace, $filter) {
            if (!preg_match('/phpName="(.*?)"/', $match[0], $phpNameMatches)) {
                preg_match('/name="(.*?)"/', $match[0], $tableNameMatches);
                $baseClassName = $tableNameMatches[1];
                $baseClassName = $filter->filter($baseClassName);
            } else {
                preg_match('/phpName="(.*?)"/', $match[0], $phpNameMatches);
                $baseClassName = $phpNameMatches[1];
            }
            $fullBaseClassName = $currentNamespace . '\\' . $baseClassName;
            $newTableDefinition = str_replace('>', ' baseClass="' . $fullBaseClassName . '">', $match[0]);

            return $newTableDefinition;
        };

        $content = preg_replace_callback('/<table(.*?)>/', $callback, $content);

        $filesystem->dumpFile($schema->getPathname(), $content);
    }
};

$removeMapAndBaseClasses = function () {
    $directories = [
        __DIR__ . '/../src/Pyz/Zed/*/Persistence/Propel/Base/',
        __DIR__ . '/../src/Pyz/Zed/*/Persistence/Propel/Map/',
        __DIR__ . '/../vendor/spryker/spryker/Bundles/*/src/*/Zed/*/Persistence/Propel/Base/',
        __DIR__ . '/../vendor/spryker/spryker/Bundles/*/src/*/Zed/*/Persistence/Propel/Map/',
    ];

    $filesystem = new Filesystem();
    $filesystem->remove(getFiles($directories));
};

$updateVendorClasses = function () {
    $directories = [
        __DIR__ . '/../src/Pyz/Zed/*/Persistence/Propel/',
        __DIR__ . '/../vendor/spryker/spryker/Bundles/*/src/*/Zed/*/Persistence/Propel/',
    ];

    $files = getFiles($directories)->name('*.php');
    $filesystem = new Filesystem();
    /** @var SplFileInfo $file */
    foreach ($files as $file) {
        $content = $file->getContents();
//        $content = preg_replace('/class (.*) extends/', 'abstract class $1 extends', $content);
        $content = preg_replace('/use (.*)\\\\Propel\\\\Base/', 'use Propel\\\\Base', $content);

        $filesystem->dumpFile($file->getPathname(), $content);
    }
};

$renameNamespaceAndPackage();
//$addBaseClassToTables();
$removeMapAndBaseClasses();
$updateVendorClasses();
