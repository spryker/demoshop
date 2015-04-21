<?php

namespace ReneFactor;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

/**
 * This script is copying SprykerCore to SprykerEngine
 *
 * If PhpStorm is finding something with this pattern run this script
 *
 * Pattern: SprykerCore\\(Yves|Zed|Shared|Sdk)
 */
class CoreToEngine extends AbstractRefactorer
{

    const SPRYKER_CORE = 'SprykerCore';
    const SPRYKER_ENGINE = 'SprykerEngine';

    public function refactor()
    {
        $this->cleanPreviousRuns();
        $this->copyFilesFromCoreToEngine();
        $this->replaceSprykerCoreWithSprykerEngine();
    }

    private function cleanPreviousRuns()
    {
        $this->info('Clean previous runs');
        $pathPatterns = [
            __DIR__ . '/../vendor/spryker/*/src/',
            __DIR__ . '/../vendor/spryker/*/tests/',
        ];

        $finder = new Finder();
        $finder = $finder
            ->in($pathPatterns)
            ->contains(self::SPRYKER_ENGINE)
            ->notContains('Kernel')
        ;

        $filesystem = new Filesystem();
        $filesystem->remove($finder);
    }

    private function copyFilesFromCoreToEngine()
    {
        $this->info('Copy files');
        $pathPatterns = [
            __DIR__ . '/../vendor/spryker/*/src/SprykerCore/',
            __DIR__ . '/../vendor/spryker/*/tests/*/SprykerCore/',
        ];

        $filesystem = new Filesystem();
        $finder = new Finder();

        /* @var $file SplFileInfo */
        foreach ($finder->files()->in($pathPatterns)->ignoreDotFiles(false) as $file) {
            $pathNew = str_replace(self::SPRYKER_CORE, self::SPRYKER_ENGINE, $file->getPathname());

            $filesystem->copy($file->getPathname(), $pathNew, true);
            $filesystem->remove($file->getPathname());
        }
    }

    private function replaceSprykerCoreWithSprykerEngine()
    {
        $this->info('Replace SprykerCore with Spryker Engine');
        $pathPatterns = [
            __DIR__ . '/../src/Pyz/',
            __DIR__ . '/../src/Generated/',
            __DIR__ . '/../vendor/spryker/*/src/',
            __DIR__ . '/../vendor/spryker/*/tests/',
        ];

        $finder = new Finder();

        /* @var $file SplFileInfo */
        foreach ($finder->files()->in($pathPatterns)->name('*.php')->name('*.xml') as $file) {
            $content = str_replace(self::SPRYKER_CORE, self::SPRYKER_ENGINE, $file->getContents());
            file_put_contents($file->getPathname(), $content);
        }
    }
}
