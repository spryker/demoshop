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

/**
 * @param array $directories
 *
 * @return SplFileInfo[]|Finder
 */
function getDirectories(array $directories)
{
    $finder = new Finder();
    $finder->directories()->in($directories);

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
            'log: tests/_log',
            'support: tests/_support,'
        ], [
            'support: tests/_support' . "\n" . '    envs: tests/_envs',
            'log: tests/_output',
            'support: tests/_support'
        ],
            $content
        );
//        $content = preg_replace('/namespace: (.*)/', 'actor: Tester', $content);

        $filesystem->dumpFile($file, $content);
    }
};

$replaceGitIgnoreContent = function() use ($filesystem) {
    $directories = [
        __DIR__ . '/../',
        __DIR__ . '/../vendor/spryker/spryker/Bundles/*/'
    ];

    /** @var $files SplFileInfo[] */
    $files = getFiles($directories)->name('.gitignore')->ignoreDotFiles(false);
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
        $filesystem->dumpFile($file, $content);
    }
};

$copyTestHelper = function () use ($filesystem) {
    $directories = [
        __DIR__ . '/../tests/_helpers',
        __DIR__ . '/../vendor/spryker/spryker/Bundles/*/tests/_helpers'
    ];
    /** @var $files SplFileInfo[] */
    $files = getFiles($directories)->name('TestHelper.php');
    foreach ($files as $file) {

    }
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

$renameLogDirectory = function () use ($filesystem) {
    $directories = [
        __DIR__ . '/../tests/',
        __DIR__ . '/../vendor/spryker/spryker/Bundles/*/tests/'
    ];
    /** @var $directories SplFileInfo[] */
    $directories = getDirectories($directories)->ignoreUnreadableDirs(true);

    foreach ($directories as $directory) {
        if ($directory->getRelativePathname() === '_log') {
            $from = $directory->getPathname();
            $to = str_replace('_log', '_output', $directory->getPathname());
            $filesystem->rename($from, $to);
        }
    }
};

$removeHelperDirectory = function () use ($filesystem) {
    $directories = [
        __DIR__ . '/../tests/_helpers',
        __DIR__ . '/../vendor/spryker/spryker/Bundles/*/tests/_helpers'
    ];
    /** @var $directories SplFileInfo[] */
    $directories = getDirectories($directories);
    foreach ($directories as $directory) {
        echo $directory->getRelativePathname() . PHP_EOL;
//        $filesystem->remove($directory);
    }
};

//$removeGuys();
//$replaceCodeceptionContent();
//$replaceGitIgnoreContent();
//$replaceSuiteConfigContent();
//$toggleTestHelperSuiteConfigContent(true);
//$renameLogDirectory();
$removeHelperDirectory();
