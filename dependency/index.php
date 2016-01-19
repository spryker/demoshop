<?php

namespace Spryker\Dependency;

require_once(__DIR__ . '/../vendor/autoload.php');

use Spryker\Dependency\DependencyFilter\BundleFilter;
use Spryker\Dependency\DependencyFinder\UseStatement;
use Spryker\Dependency\DependencyFinder\LocatorFacade;
use Spryker\Dependency\DependencyFinder\LocatorQueryContainer;
use Spryker\Dependency\DependencyFinder\LocatorClient;

$finder = new Finder('Zed', 'Kernel', '*');
$dependencyFinder = new DependencyTreeBuilder($finder, new FileInfoExtractor());

$dependencyFinder->addDependencyChecker([
    new UseStatement(),
    new LocatorFacade(),
    new LocatorQueryContainer(),
    new LocatorClient(),
]);

$bundleList = json_decode(file_get_contents(__DIR__ . '/../vendor/spryker/spryker/bundle_config.json'), true);
$dependencyFinder->addFilter(new BundleFilter(array_keys($bundleList)));

$dependencyTree = $dependencyFinder->buildDependencyTree();

$jsonDependencyTree = json_encode($dependencyTree, JSON_PRETTY_PRINT);

file_put_contents(__DIR__ . DIRECTORY_SEPARATOR . 'jsonResult', $jsonDependencyTree);
echo '<pre>' . PHP_EOL . var_dump($jsonDependencyTree) . PHP_EOL . 'Line: ' . __LINE__ . PHP_EOL . 'File: ' . __FILE__ . die();
