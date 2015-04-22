<?php

namespace ReneFactor;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class CodeCeptionIncludeList extends AbstractRefactorer
{


    public function refactor()
    {
        $fileSystem = new Filesystem();
        $finder = $this->getBundleFinder();

        foreach ($finder as $dir) {
            $bundle = $dir->getFilename();
            echo ' - vendor/spryker/' . $bundle . '/' . PHP_EOL;
        }
    }

    /**
     * @return Finder|SplFileInfo[]
     */
    private function getBundleFinder()
    {
        $finder = new Finder();
        $finder
            ->directories()
            ->in(__DIR__ . '/../vendor/spryker/')
            ->exclude([
                'pillar',
                'saltstack',
                'yves-package',
                'zed-package'
            ])
            ->depth('< 1')
        ;

        return $finder;
    }

}
