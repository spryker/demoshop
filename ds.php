<?php

namespace ReneFactor;

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

    
}
echo '<pre>' . PHP_EOL . \Symfony\Component\VarDumper\VarDumper::dump($searchAndReplace) . PHP_EOL . 'Line: ' . __LINE__ . PHP_EOL . 'File: ' . __FILE__ . die();
// find all refPhpName="(.*?)"
// replace name="pac with name="spy
// replace phpName="Pac with phpName="Spy


