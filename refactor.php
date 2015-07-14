<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

require_once(__DIR__ . '/vendor/autoload.php');

$finder = new \Symfony\Component\Finder\Finder();

$files = $finder->in(__DIR__ . '/vendor/spryker/spryker/Bundles/*/src/*/Yves/*/Plugin/');

foreach ($files as $file) {
    echo $file->getFilename() . PHP_EOL;
}
