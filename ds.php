<?php

namespace ReneFactor;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

require_once(__DIR__ . '/vendor/autoload.php');

$finder = new Finder();
$path = __DIR__ . '/vendor/spryker/zed-package/src/ProjectA/Zed/*/Persistence/Propel/Schema/';

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
//    file_put_contents($schema->getPathname(), $schemaContent);
}

// find all entities
$finder = new Finder();
$path = __DIR__ . '/vendor/spryker/zed-package/src/ProjectA/Zed/*/Persistence/Propel/';

$fileSystem = new Filesystem();
/* @var $entity SplFileInfo */
foreach ($finder->files()->in($path)->depth('< 1')->name('*.php') as $entity) {
    $key = str_replace('.php', '', $entity->getFilename());
    $value = 'Spy' . substr($key, strlen('Pac'));
    $searchAndReplace[$key] = $value;

    $oldPath = $entity->getPathname();
    $newPath = str_replace($key, $value, $oldPath);
//    $fileSystem->rename($schema->getPathname(), $newPath);
}

echo '<pre>' . PHP_EOL . \Symfony\Component\VarDumper\VarDumper::dump($searchAndReplace) . PHP_EOL . 'Line: ' . __LINE__ . PHP_EOL . 'File: ' . __FILE__ . die();
// rename entities
