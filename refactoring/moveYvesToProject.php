<?php

include_once(__DIR__ . '/../vendor/autoload.php');

use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

$currentBundle = 'Assets';
$directories = [
    __DIR__ . '/../vendor/spryker/spryker/Bundles/' . $currentBundle . '/src/SprykerFeature/Yves/',
    __DIR__ . '/../vendor/spryker/spryker/Bundles/' . $currentBundle . '/tests/*/SprykerFeature/Yves/'
];

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

$finder = getFiles($directories);

$searchAndReplace = [];
$moveFromTo = [];
foreach ($finder as $file) {
    $baseName = str_replace(['.php', '/'], ['', '\\'], $file->getRelativePathname());
    $oldName = 'SprykerFeature\\Yves\\' . $baseName;
    $newName = 'Pyz\\Yves\\' . $baseName;

    $searchAndReplace[$oldName] = $newName;

    $oldPath = $file->getPathname();

    $vendorSrcPath = __DIR__ . '/../vendor/spryker/spryker/Bundles/' . $currentBundle . '/src/';
    $projectSrcPath = __DIR__ . '/../src/';

    $vendorTestPath = __DIR__ . '/../vendor/spryker/spryker/Bundles/' . $currentBundle . '/tests/';
    $projectTestPath = __DIR__ . '/../tests/';

    $newPath = str_replace('SprykerFeature', 'Pyz', $oldPath);
    $newPath = str_replace([$vendorSrcPath, $vendorTestPath], [$projectSrcPath, $projectTestPath], $newPath);


    $moveFromTo[$oldPath] = $newPath;
}

foreach ($moveFromTo as $origin => $target) {
    if (!file_exists($target)) {
        file_put_contents($target, file_get_contents($origin));
        unlink($origin);
    }
}

$directories = [
        __DIR__ . '/../src/',
        __DIR__ . '/../vendor/spryker/spryker/Bundles/',
];
$allFiles = getFiles($directories);

foreach ($allFiles as $file) {
    $content = $file->getContents();
    $content = str_replace(array_keys($searchAndReplace), array_values($searchAndReplace), $content);
    file_put_contents($file->getPathname(), $content);
}

