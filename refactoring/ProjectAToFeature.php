<?php

namespace ReneFactor;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

/**
 * This script is copying ProjectA to SprykerFeature
 *
 * If PhpStorm is finding something with this pattern run this script
 *
 * Pattern: Project
 */
class ProjectAToFeature extends AbstractRefactorer
{

    const PROJECT_A = 'ProjectA';

    const SPRYKER_FEATURE = 'SprykerFeature';

    public function refactor()
    {
        $this->copyFilesFromCoreToEngine();
        $this->replaceInFiles();
    }

    private function copyFilesFromCoreToEngine()
    {
        $this->info('Copy files');
        $pathPatterns = [
            __DIR__ . '/../vendor/spryker/*/src/ProjectA/',
            __DIR__ . '/../vendor/spryker/*/tests/*/ProjectA/',
        ];

        $filesystem = new Filesystem();
        $finder = new Finder();

        /* @var $file SplFileInfo */
        foreach ($finder->files()->in($pathPatterns)->ignoreDotFiles(false) as $file) {
            $pathNew = str_replace(self::PROJECT_A, self::SPRYKER_FEATURE, $file->getPathname());

            $filesystem->copy($file->getPathname(), $pathNew, true);
            $filesystem->remove($file->getPathname());
        }
    }

    private function replaceInFiles()
    {
        $this->info('Replace ProjectA with SprykerFeature');
        $pathPatterns = [
            __DIR__ . '/../config/',
            __DIR__ . '/../static/public/',
            __DIR__ . '/../src/Pyz/',
            __DIR__ . '/../tests/',
            __DIR__ . '/../src/Generated/',
            __DIR__ . '/../vendor/spryker/',
        ];

        $finder = new Finder();

        /* @var $file SplFileInfo */
        foreach ($finder->files()->in($pathPatterns)->ignoreDotFiles(false) as $file) {
            $content = str_replace(self::PROJECT_A, self::SPRYKER_FEATURE, $file->getContents());
            file_put_contents($file->getPathname(), $content);
        }
    }
}
