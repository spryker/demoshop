<?php

namespace ReneFactor;

use Faker\Provider\File;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use Zend\Filter\Word\CamelCaseToDash;

class GitiffyBundles extends AbstractRefactorer
{


    public function refactor()
    {
        $fileSystem = new Filesystem();
        $finder = $this->getBundleFinder();

        foreach ($finder as $dir) {

            // git init
            // git add
            // create repo
            // push to that repo

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
        ;

        return $finder;
    }

}
