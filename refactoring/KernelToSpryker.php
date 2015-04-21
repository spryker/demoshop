<?php

namespace ReneFactor;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

/**
 * This script is copying ProjectA Kernel to SprykerEngine
 *
 * If PhpStorm is finding something with this pattern run this script
 *
 * Pattern: (.*?)\\(Yves|Zed|Shared|Sdk)\\Kernel
 */
class KernelToSpryker extends AbstractRefactorer
{

    public function refactor()
    {
        $this->cleanPreviousRuns();
        $this->moveProjectAKernelToSprykerEngine();
        $this->replaceInTestDir();
    }

    private function cleanPreviousRuns()
    {
        $this->info('Clean previous runs');
        $pathPatterns = [
            __DIR__ . '/../vendor/spryker/zed-package/src/SprykerEngine',
            __DIR__ . '/../vendor/spryker/zed-package/tests/Unit/SprykerEngine',
        ];

        $filesystem = new Filesystem();
        $filesystem->remove($pathPatterns);
    }

    private function moveProjectAKernelToSprykerEngine()
    {
        $this->info('Move files');
        $namespaceNew = 'SprykerEngine';
        $searchAndReplace = [];

        $pathPatterns = [
            __DIR__ . '/../vendor/spryker/*/src/*/*/Kernel/',
            __DIR__ . '/../vendor/spryker/*/tests/Unit/*/*/Kernel/',
            __DIR__ . '/../vendor/spryker/*/tests/Unit/*/*/KernelDE/',
        ];

        $filesystem = new Filesystem();

        $finder = new Finder();

        /* @var $file SplFileInfo */
        foreach ($finder->files()->in($pathPatterns)->ignoreDotFiles(false) as $file) {
            $pathParts = explode(DIRECTORY_SEPARATOR, $file->getPathname());
            if ($pathParts[11] === 'Unit') {
                $pathParts = array_splice($pathParts, 12);
            } else {
                $pathParts = array_splice($pathParts, 11);
            }

            $namespaceOld = array_shift($pathParts);
            $pathParts = array_splice($pathParts, 0, 2);

            $string = implode('\\', $pathParts);
            $string = str_replace('.php', '', $string);

            $search = $namespaceOld . '\\' . $string;
            $replace = $namespaceNew . '\\' . $string;

            $searchAndReplace[$search] = $replace;

            $pathNew = str_replace($namespaceOld, $namespaceNew, $file->getPathname());

            $filesystem->copy($file->getPathname(), $pathNew, true);
            $filesystem->remove($file->getPathname());
        }

        $searchAndReplace['ProjectA\\Yves\\Kernel'] = 'SprykerEngine\\Yves\\Kernel';
        $searchAndReplace['ProjectA\\Zed\\Kernel'] = 'SprykerEngine\\Zed\\Kernel';
        $searchAndReplace['ProjectA\\\\Zed\\\\Kernel'] = 'SprykerEngine\\\\Zed\\\\Kernel';
        $searchAndReplace['ProjectA\\\\Shared\\\\Kernel'] = 'SprykerEngine\\\\Shared\\\\Kernel';
        $searchAndReplace['SprykerCore\\Yves\\Kernel'] = 'SprykerEngine\\Yves\\Kernel';
        $searchAndReplace['SprykerCore\\\\Zed\\\\Kernel'] = 'SprykerEngine\\\\Zed\\\\Kernel';
        $searchAndReplace['SprykerCore\\\\Shared\\\\Kernel'] = 'SprykerEngine\\\\Shared\\\\Kernel';

        $finder = new Finder();
        $pathPatterns = [
            __DIR__ . '/../vendor/spryker/*/src/',
            __DIR__ . '/../vendor/spryker/*/tests/',
            __DIR__ . '/../src/Pyz/',
            __DIR__ . '/../src/Generated/',
            __DIR__ . '/../tests/',
            __DIR__ . '/../config/'
        ];
        /* @var $file SplFileInfo */
        foreach ($finder->files()->in($pathPatterns) as $file) {
            $content = str_replace(array_keys($searchAndReplace), array_values($searchAndReplace), $file->getContents());
            file_put_contents($file->getPathname(), $content);
        }
    }

    private function replaceInTestDir()
    {
        $this->info('Replace in test directory');
        $searchAndReplace = [];
        $searchAndReplace['Unit\\ProjectA'] = 'Unit\\SprykerEngine';
        $searchAndReplace['Unit\\\\ProjectA'] = 'Unit\\\\SprykerEngine';
        $searchAndReplace['Unit\\SprykerCore'] = 'Unit\\SprykerEngine';
        $searchAndReplace['Unit\\\\SprykerCore'] = 'Unit\\\\SprykerEngine';

        $pathPatterns = [
            __DIR__ . '/../vendor/spryker/*/tests/Unit/SprykerEngine/*/Kernel/',
        ];

        $finder = new Finder();
        /* @var $file SplFileInfo */
        foreach ($finder->files()->in($pathPatterns) as $file) {
            $content = str_replace(array_keys($searchAndReplace), array_values($searchAndReplace), $file->getContents());
            file_put_contents($file->getPathname(), $content);
        }
    }
}
