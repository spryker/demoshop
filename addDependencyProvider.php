<?php

include_once(__DIR__ . '/vendor/autoload.php');

$directories = new \Symfony\Component\Finder\Finder();
$directories->directories()->in(__DIR__ . '/vendor/spryker/spryker/Bundles/*/src/*/Zed')->depth(0);

$dependencyProviderTemplate = file_get_contents(__DIR__ . '/dependencyProviderTemplate.tpl');

/** @var \Symfony\Component\Finder\SplFileInfo $directory*/
foreach ($directories as $directory) {
    $pathParts = explode('/', $directory);
    $pathParts = array_slice($pathParts, 0, -2);

    $namespace = $pathParts[11];
    $bundle = $pathParts[9];

    $pathToFile = implode('/', $pathParts) . '/Zed/' . $bundle . '/' . $bundle . 'DependencyProvider.php';
    if (!file_exists($pathToFile)) {
        $bundleDependencyProvider = str_replace(['{{namespace}}', '{{bundle}}'], [$namespace, $bundle], $dependencyProviderTemplate);
        file_put_contents($pathToFile, $bundleDependencyProvider);
        echo '<pre>' . PHP_EOL . \Symfony\Component\VarDumper\VarDumper::dump($bundleDependencyProvider) . PHP_EOL . 'Line: ' . __LINE__ . PHP_EOL . 'File: ' . __FILE__ . die();
    }
}
