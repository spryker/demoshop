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
        $finderCollection[] = $this->getFacadeFinder();
        $finderCollection[] = $this->getSdkFinder();
        $finderCollection[] = $this->getQueryContainerFinder();
        $finderCollection[] = $this->getPluginFinder();
//        $finderCollection[] = $this->getControllerFinder();

        $dependencyContainerPropertyRemover = new DependencyContainerPropertyRemover($this->logger);
        $dependencyContainerAccessReplacer = new DependencyContainerAccessReplacer($this->logger);
        $dependencyContainerMethodRemover = new DependencyContainerMethodRemover($this->logger);
        $locatorAccessReplacer = new LocatorAccessReplacer($this->logger);
        $locatorPropertyRemover = new LocatorPropertyRemover($this->logger);
        $locatorMethodRemover = new LocatorMethodRemover($this->logger);

        foreach ($finderCollection as $finder) {
            foreach ($finder as $file) {
                $locatorAccessReplacer->setFile($file);
                $locatorAccessReplacer->refactor();

                $locatorPropertyRemover->setFile($file);
                $locatorPropertyRemover->refactor();

                $locatorMethodRemover->setFile($file);
                $locatorMethodRemover->refactor();

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
    private function getFacadeFinder()
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
    private function getSdkFinder()
    {
        $paths = [
            __DIR__ . '/../src/Pyz/*/*/',
            __DIR__ . '/../vendor/spryker/*/src/*/*/*/',
            __DIR__ . '/../vendor/spryker/*/tests/*/*/*/*/',
        ];
        $finder = new Finder();
        $finder->files()->in($paths)->name('*Sdk.php');

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
            __DIR__ . '/../src/Pyz/*/*/Plugin/',
            __DIR__ . '/../vendor/spryker/*/src/*/*/*/Communication/Plugin/',
            __DIR__ . '/../vendor/spryker/*/src/*/*/*/Plugin/',
        ];
        $finder = new Finder();
        $finder->files()->in($paths);

        return $finder;
    }

    /**
     * @return Finder
     */
    private function getControllerFinder()
    {
        $paths = [
            __DIR__ . '/../src/Pyz/*/*/Communication/Controller/',
//            __DIR__ . '/../src/Pyz/*/*/Controller/',
            __DIR__ . '/../vendor/spryker/*/src/*/*/*/Communication/Controller/',
            __DIR__ . '/../vendor/spryker/*/src/*/*/*/Controller/',
        ];
        $finder = new Finder();
        $finder->files()->in($paths);

        return $finder;
    }

}
