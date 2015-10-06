<?php

include_once(__DIR__ . '/../vendor/autoload.php');

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
    $finder = new Finder();
    $finder->files()->in($directories);

    return $finder;
}



$removeGuys = function () use ($filesystem) {
    $directories = [
        __DIR__ . '/../tests/*/',
        __DIR__ . '/../vendor/spryker/spryker/Bundles/*/tests/*/'
    ];

    /** @var $files SplFileInfo[] */
    $files = getFiles($directories)->name('*Guy.php');

    $filesystem->remove($files);
};

$replaceCodeceptionContent = function() use ($filesystem) {
    $directories = [
        __DIR__ . '/../',
        __DIR__ . '/../vendor/spryker/spryker/Bundles/*/'
    ];

    /** @var $files SplFileInfo[] */
    $files = getFiles($directories)->name('codeception.yml');
    foreach ($files as $file) {
        $content = $file->getContents();
        $content = str_replace([
            'helpers: tests/_helpers',
            'log: tests/_log'
        ], [
            'support: tests/_support,' . "\n" . '    envs: tests/_envs',
            'log: tests/_output'
        ],
            $content
        );
        $content = preg_replace('/namespace (.*)/', 'actor: Tester', $content);

        $filesystem->dumpFile($file, $content);
    }
};
$replaceCodeceptionContent = function() use ($filesystem) {
    $directories = [
        __DIR__ . '/../',
        __DIR__ . '/../vendor/spryker/spryker/Bundles/*/'
    ];

    /** @var $files SplFileInfo[] */
    $files = getFiles($directories)->name('.gitignore');
    foreach ($files as $file) {
        $content = $file->getContents();
        $content = str_replace([
            'tests/_log'
        ], [
            'tests/_output'
        ],
            $content
        );

        $filesystem->dumpFile($file, $content);
    }
};


$replaceSuiteConfigContent = function () use ($filesystem) {
    $directories = [
        __DIR__ . '/../tests/',
        __DIR__ . '/../vendor/spryker/spryker/Bundles/*/tests/'
    ];
    /** @var $files SplFileInfo[] */
    $files = getFiles($directories)->name('*.suite.yml');
    foreach ($files as $file) {

        $content = $file->getContents();
        $content = str_replace([
            'class_name: TestGuy' . "\n",
            'class_name: CodeGuy' . "\n",
            'class_name: YvesGuy' . "\n",
        ], '', $content
        );
//        $filesystem->dumpFile($file, $content);
};

$toggleTestHelperSuiteConfigContent = function ($turnOn) use ($filesystem) {
    $directories = [
        __DIR__ . '/../tests/',
        __DIR__ . '/../vendor/spryker/spryker/Bundles/*/tests/'
    ];
    /** @var $files SplFileInfo[] */
    $files = getFiles($directories)->name('*.suite.yml');
    foreach ($files as $file) {
        $content = $file->getContents();
        if ($turnOn) {
            $content = str_replace('#- TestHelper', '- TestHelper', $content);
            $content = str_replace('#- CodeHelper' .  "\n" . '- Filesystem', '- CodeHelper', $content);
        } else {
            $content = str_replace('- TestHelper', '#- TestHelper', $content);
            $content = str_replace('- CodeHelper', '#- CodeHelper' .  "\n" . '- Filesystem', $content);
        }
        $filesystem->dumpFile($file, $content);
    }
};

//$removeGuys();
$replaceCodeceptionContent();
//$replaceSuiteConfigContent();
//$toggleTestHelperSuiteConfigContent(true);
