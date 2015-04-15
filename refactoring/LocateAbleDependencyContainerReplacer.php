<?php

namespace ReneFactor;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class LocateAbleDependencyContainerReplacer extends AbstractRefactorer
{

    public function refactor()
    {
        $this->info('Start');

        $finderCollection = [];
        $finderCollection[] = $this->getFacadesFinder();
        $finderCollection[] = $this->getQueryContainerFinder();
        $finderCollection[] = $this->getPluginFinder();

        $dependencyContainerPropertyRemover = new DependencyContainerPropertyRemover($this->logger);
        $dependencyContainerAccessReplacer = new DependencyContainerAccessReplacer($this->logger);
        $dependencyContainerMethodRemover = new DependencyContainerMethodRemover($this->logger);
        foreach ($finderCollection as $finder) {
            foreach ($finder as $file) {
                $dependencyContainerPropertyRemover->setFile($file);
                $dependencyContainerPropertyRemover->refactor();

                $dependencyContainerAccessReplacer->setFile($file);
                $dependencyContainerAccessReplacer->refactor();

                $dependencyContainerMethodRemover->setFile($file);
                $dependencyContainerMethodRemover->refactor();
            }
        }
    }

    /**
     * @return Finder
     */
    private function getFacadesFinder()
    {
        $paths = [
            __DIR__ . '/../src/Pyz/*/*/Business/',
            __DIR__ . '/../vendor/spryker/*/src/*/*/*/Business/',
            __DIR__ . '/../vendor/spryker/*/tests/*/*/*/*/Business/',
        ];
        $finder = new Finder();
        $finder->files()->in($paths)->name('*Facade.php');

        return $finder;
    }

    /**
     * @return Finder
     */
    private function getQueryContainerFinder()
    {
        $paths = [
            __DIR__ . '/../vendor/spryker/*/src/*/*/*/Persistence/',
            __DIR__ . '/../vendor/spryker/*/tests/*/*/*/*/Persistence/',
        ];
        $finder = new Finder();
        $finder->files()->in($paths)->name('*QueryContainer.php');

        return $finder;
    }

    /**
     * @return Finder
     */
    private function getPluginFinder()
    {
        $paths = [
            __DIR__ . '/../src/Pyz/*/*/Communication/Plugin/',
            __DIR__ . '/../vendor/spryker/*/src/*/*/*/Communication/Plugin/',
        ];
        $finder = new Finder();
        $finder->files()->in($paths);

        return $finder;
    }

}
