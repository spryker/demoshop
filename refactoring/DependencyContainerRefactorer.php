<?php

namespace ReneFactor;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class DependencyContainerRefactorer extends AbstractRefactorer
{

    public function refactor()
    {
        $this->info('Start');

        $finder = $this->getDependencyContainerFinder();

        $locatorAccessReplacer = new LocatorAccessReplacer($this->logger);
        $locatorPropertyRemover = new LocatorPropertyRemover($this->logger);
        $locatorMethodRemover = new LocatorMethodRemover($this->logger);

        $factoryAccessReplacer = new FactoryAccessReplacer($this->logger);
        $factoryPropertyRemover = new FactoryPropertyRemover($this->logger);
        $factoryMethodRemover = new FactoryMethodRemover($this->logger);

        foreach ($finder as $file) {
            $this->info($file->getPathname());

            $locatorAccessReplacer->setFile($file);
            $locatorAccessReplacer->refactor();

            $locatorPropertyRemover->setFile($file);
            $locatorPropertyRemover->refactor();

            $locatorMethodRemover->setFile($file);
            $locatorMethodRemover->refactor();

            $factoryAccessReplacer->setFile($file);
            $factoryAccessReplacer->refactor();

            $factoryPropertyRemover->setFile($file);
            $factoryPropertyRemover->refactor();

            $factoryMethodRemover->setFile($file);
            $factoryMethodRemover->refactor();
        }
    }

    /**
     * @return Finder|SplFileInfo[]
     */
    private function getDependencyContainerFinder()
    {
        $paths = [
            __DIR__ . '/../src/Pyz/*/*/',
            __DIR__ . '/../vendor/spryker/*/src/*/*/*/',
            __DIR__ . '/../vendor/spryker/*/tests/*/*/*/*/',
        ];
        $finder = new Finder();
        $finder->files()->in($paths)->name('*DependencyContainer.php');

        return $finder;
    }

}
