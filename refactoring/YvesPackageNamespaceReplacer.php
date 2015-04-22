<?php

namespace ReneFactor;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\Process\Process;
use Zend\Filter\Word\CamelCaseToDash;
use Zend\Filter\Word\DashToCamelCase;

class YvesPackageNamespaceReplacer extends AbstractRefactorer
{

    public function refactor()
    {
        $fileSystem = new Filesystem();
        $finder = $this->getYvesTestFinder();

        foreach ($finder as $file) {
            $path = str_replace(__DIR__ . '/../vendor/spryker/', '', $file->getPathname());
            $pathParts = explode('/', $path);
            $bundle = $pathParts[0];

            $filter = new DashToCamelCase();
            $bundle = $filter->filter($bundle);

            $content = $file->getContents();
            $content = str_replace('YvesPackage', $bundle, $content);
            file_put_contents($file->getPathname(), $content);
        }
    }

    /**
     * @return Finder|SplFileInfo[]
     */
    private function getYvesTestFinder()
    {
        $finder = new Finder();
        $finder
            ->files()
            ->in(__DIR__ . '/../vendor/spryker/*/tests/')
        ;

        return $finder;
    }

}
