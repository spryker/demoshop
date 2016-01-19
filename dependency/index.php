<?php

require_once(__DIR__ . '/../vendor/autoload.php');

use Symfony\Component\Finder\Finder;

function getFiles(array $directories, $name = null, $depth = null)
{
    foreach ($directories as $key => $directory) {
        if (!glob($directory)) {
            unset($directories[$key]);
        }
    }

    if (count($directories) === 0) {
        throw new \Exception('Directories can not be resolved with glob. Maybe you have a wrong path pattern applied.');
    }

    $finder = new Finder();
    $finder->files()->in($directories);

    if ($name !== null) {
        $finder->name($name);
    }

    if ($depth !== null) {
        $finder->depth($depth);
    }

    return $finder;
}

$directories = [
    __DIR__ . '/../vendor/spryker/spryker/Bundles/*/src/Spryker/',
    __DIR__ . '/../vendor/spryker/spryker/Bundles/*/tests/*/Spryker/'
];
$zedFiles = getFiles($directories);

$dependencyFinder = new \Spryker\Dependency\DependencyTreeBuilder();
$dependencyFinder->addDependencyChecker(new \Spryker\Dependency\DependencyFinder\UseStatement());
$dependencyFinder->addDependencyChecker(new \Spryker\Dependency\DependencyFinder\LocatorFacade());
$dependencyFinder->addDependencyChecker(new \Spryker\Dependency\DependencyFinder\LocatorQueryContainer());
$dependencyFinder->addDependencyChecker(new \Spryker\Dependency\DependencyFinder\LocatorClient());

$dependencyTree = $dependencyFinder->buildDependencyTree($zedFiles);
$jsonDependencyTree = json_encode($dependencyTree, JSON_PRETTY_PRINT);
echo '<pre>' . PHP_EOL . var_dump($jsonDependencyTree) . PHP_EOL . 'Line: ' . __LINE__ . PHP_EOL . 'File: ' . __FILE__ . die();
