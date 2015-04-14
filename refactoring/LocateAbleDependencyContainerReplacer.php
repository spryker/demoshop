<?php

namespace ReneFactor;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class LocateAbleDependencyContainerReplacer extends AbstractRefactorer
{

    public function refactor()
    {
        $this->info('Start');
        $this->info('Find all Facades');

        $paths = [
            __DIR__ . '/../src/Pyz/*/*/Business/',
            __DIR__ . '/../tests/*/*/*/*/Business/',
            __DIR__ . '/../vendor/spryker/*/src/*/*/*/Business/',
            __DIR__ . '/../vendor/spryker/*/tests/*/*/*/*/Business/',
        ];
        $facadeFinder = new Finder();
        $facadeFinder->files()->in($paths)->name('*Facade.php');

        /* @var $file SplFileInfo */
        foreach ($facadeFinder as $file) {
            $this->info($file->getFilename());
        }
    }

}
