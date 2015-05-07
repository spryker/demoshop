<?php

namespace ReneFactor;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use Zend\Filter\Word\CamelCaseToUnderscore;

class RenameTransferDefinitionFile extends AbstractRefactorer
{

    public function refactor()
    {
        $finder = $this->getFinder();

        foreach ($finder as $file) {
            $pathParts = explode(DIRECTORY_SEPARATOR, $file->getPathname());
            $bundle = array_slice($pathParts, 11, 1);
            $filter = new CamelCaseToUnderscore();
            $bundle = strtolower($filter->filter($bundle[0]));

            $newFileName = $bundle . '.transfer.xml';
            $directory = dirname($file->getPathname());
            $newPath = $directory . '/' . $newFileName;

            file_put_contents($newPath, $file->getContents());
            unlink($file->getPathname());
        }
    }

    /**
     * @return Finder|SplFileInfo[]
     */
    private function getFinder()
    {
        $finder = new Finder();
        $finder->files()
            ->in(__DIR__ . '/../vendor/spryker/spryker/Bundles/*/src/*/Shared/*/Transfer')
            ->name('*.xml')
        ;

        return $finder;
    }

}
