<?php

require_once(__DIR__ . '/vendor/autoload.php');

$vendorDirPattern = __DIR__ . '/vendor/spryker/*/src/ProjectA/Zed/*/Communication/Controller';
$projectDirPattern = __DIR__ . '/src/Pyz/Zed/*/Communication/Controller';

$baseDirs = [
    $vendorDirPattern,
    $projectDirPattern
];

$search = 'class\s(.*)(?:Controller)\s(?!extends)';
$replace = 'use ProjectA\Zed\Application\Business\Communication\Controller\AbstractController;

class $1Controller extends AbstractController';

$finder = new \Symfony\Component\Finder\Finder();

/* @var $file \Symfony\Component\Finder\SplFileInfo */
foreach ($finder->files()->in($baseDirs)->name('*Controller.php') as $file) {
    $content = $file->getContents();
    if (preg_match($search, $content, $matches)) {
        echo '<pre>' . PHP_EOL . var_dump($matches) . PHP_EOL . 'Line: ' . __LINE__ . PHP_EOL . 'File: ' . __FILE__ . die();
    }
}
