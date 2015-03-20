<?php

namespace ReneFactor;

use ProjectA\Shared\Library\Config;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

require_once(__DIR__ . '/vendor/autoload.php');

// remove map and base files
$finder = new Finder();
$path = [
    __DIR__ . '/vendor/spryker/zed-package/src/*/Zed/*/Persistence/Propel/Map/',
    __DIR__ . '/vendor/spryker/zed-package/src/*/Zed/*/Persistence/Propel/Base/',
];

$fileSystem = new Filesystem();
$finder = new Finder();
$path = __DIR__ . '/vendor/spryker/zed-package/src/*/Zed/*/Persistence/Propel/Schema/';

$searchAndReplace = [];

/* @var $schema SplFileInfo */
foreach ($finder->files()->in($path) as $schema) {
    $schemaContent = file_get_contents($schema->getPathname());
    if (preg_match_all('/refPhpName="(.*?)"/', $schemaContent, $matches)) {
        foreach ($matches[1] as $match) {
            if (strpos($match, 'Pac') === 0) {
                $searchAndReplace[$match] = 'Spy' . substr($match, strlen('Pac'));
            }
        }
    }

    if (preg_match_all('/phpName="(.*?)"/', $schemaContent, $matches)) {
        foreach ($matches[1] as $match) {
            if (strpos($match, 'Pac') === 0) {
                $searchAndReplace[$match] = 'Spy' . substr($match, strlen('Pac'));
            }
        }
    }

    $schemaContent = str_replace(['pac_', '"Pac'], ['spy_', '"Spy'], $schemaContent);
    file_put_contents($schema->getPathname(), $schemaContent);

    $oldPath = $schema->getPathname();

    if (substr($schema->getFilename(), 0, 3) === 'pac') {
        $newPath = str_replace('pac_', 'spy_', $oldPath);
        $fileSystem->rename($oldPath, $newPath);
    }
}

$finder = new Finder();
$path = __DIR__ . '/vendor/spryker/zed-package/src/*/Zed/*/Persistence/Propel/';


/* @var $entity SplFileInfo */
foreach ($finder->files()->in($path)->depth('< 1')->name('*.php') as $entity) {
    $key = str_replace('.php', '', $entity->getFilename());
    $value = 'Spy' . substr($key, strlen('Pac'));
    $searchAndReplace[$key] = $value;

    $oldPath = $entity->getPathname();
    $newPath = str_replace($key, $value, $oldPath);
    if (!file_exists($newPath)) {
        $fileSystem->rename($entity->getPathname(), $newPath);
    }
}

$finder = new Finder();
$path = [
    __DIR__ . '/vendor/spryker/zed-package/src/',
    __DIR__ . '/vendor/spryker/zed-package/tests/',
    __DIR__ . '/src/Pyz/',
    __DIR__ . '/tests/',
];

/* @var $file SplFileInfo */
foreach ($finder->files()->in($path)->name('*.php') as $file) {
    $fileContent = file_get_contents($file->getPathname());
    $fileContent = str_replace(array_keys($searchAndReplace), array_values($searchAndReplace), $fileContent);
    file_put_contents($file->getPathname(), $fileContent);
}

// rename entities
