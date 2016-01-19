<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Spryker\Dependency;

use Symfony\Component\Finder\SplFileInfo;

class FileInfoExtractor
{

    /**
     * @param SplFileInfo $fileInfo
     *
     * @throws \Exception
     *
     * @return string
     */
    public function getApplicationNameFromFileInfo(SplFileInfo $fileInfo)
    {
        $classNameParts = $this->getClassNameParts($fileInfo);

        return $classNameParts[1];
    }

    /**
     * @param SplFileInfo $fileInfo
     *
     * @throws \Exception
     *
     * @return string
     */
    public function getBundleNameFromFileInfo(SplFileInfo $fileInfo)
    {
        $classNameParts = $this->getClassNameParts($fileInfo);

        return $classNameParts[2];
    }

    /**
     * @param SplFileInfo $fileInfo
     *
     * @throws \Exception
     *
     * @return string
     */
    public function getLayerNameFromFileInfo(SplFileInfo $fileInfo)
    {
        $classNameParts = $this->getClassNameParts($fileInfo);

        $layer = $classNameParts[3];
        if (in_array($layer, ['Business', 'Communication', 'Persistence'])) {
            return $layer;
        }

        return 'no layer';
    }

    /**
     * @param SplFileInfo $fileInfo
     *
     * @throws \Exception
     *
     * @return array
     */
    private function getClassNameParts(SplFileInfo $fileInfo)
    {
        $pathParts = explode(DIRECTORY_SEPARATOR, $fileInfo->getPathname());
        $sourceDirectoryPosition = array_search('src', $pathParts);
        if ($sourceDirectoryPosition) {
            return array_slice($pathParts, $sourceDirectoryPosition + 1);
        }

        $testsDirectoryPosition = array_search('tests', $pathParts);
        if ($testsDirectoryPosition) {
            return array_slice($pathParts, $testsDirectoryPosition + 2);
        }

        throw new \Exception(sprintf('Could not extract class name parts from file "%s".', $fileInfo->getPathname()));
    }
}
