<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Spryker\Refactor;

use SprykerFeature\Zed\Development\Business\Refactor\RefactorException;
use SprykerFeature\Zed\Development\Business\Refactor\RefactorInterface;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

abstract class AbstractRefactor implements RefactorInterface
{

    const NAMESPACE_PROJECT = 'Pyz';
    const ERROR_MESSAGE_CANT_FIND_SRC_POSITION =
        'Can not extract src directory position from given path "%s". Check your directory/filename pattern used in findFiles.';

    /**
     * @param array $directories
     * @param string $name
     * @param string|int $depth
     *
     * @throws RefactorException
     *
     * @return Finder|SplFileInfo[]
     */
    final protected function getFiles(array $directories, $name = null, $depth = null)
    {
        foreach ($directories as $key => $directory) {
            if (!glob($directory)) {
                unset($directories[$key]);
            }
        }

        if (count($directories) === 0) {
            throw new RefactorException('Directories can not be resolved with glob. Maybe you have a wrong path pattern applied.');
        }

        $finder = new Finder();
        $finder->files()->in($directories);

        if ($name !== null) {
            $finder->name($name);
        }

        if ($depth !== null) {
            $finder->depth($depth);
        }

        return $finder;
    }

    /**
     * @param SplFileInfo $fileInfo
     *
     * @return string
     */
    protected function getNamespaceFromFileInfo(SplFileInfo $fileInfo)
    {
        $pathParts = $this->getPathParts($fileInfo);
        $srcDirectoryPosition = $this->getSrcDirectoryPosition($pathParts);

        return $pathParts[$srcDirectoryPosition + 1];
    }

    /**
     * @param SplFileInfo $fileInfo
     *
     * @return string
     */
    protected function getApplicationFromFileInfo(SplFileInfo $fileInfo)
    {
        $pathParts = $this->getPathParts($fileInfo);
        $srcPosition = $this->getSrcDirectoryPosition($pathParts);

        return $pathParts[$srcPosition + 2];
    }

    /**
     * @param SplFileInfo $fileInfo
     *
     * @return string
     */
    protected function getBundleFromFileInfo(SplFileInfo $fileInfo)
    {
        $pathParts = $this->getPathParts($fileInfo);
        $srcPosition = $this->getSrcDirectoryPosition($pathParts);

        return $pathParts[$srcPosition + 3];
    }

    /**
     * @param SplFileInfo $fileInfo
     *
     * @return string
     */
    protected function getLayerFromFileInfo(SplFileInfo $fileInfo)
    {
        $pathParts = $this->getPathParts($fileInfo);
        $srcPosition = $this->getSrcDirectoryPosition($pathParts);

        return $pathParts[$srcPosition + 4];
    }

    /**
     * @param SplFileInfo $fileInfo
     *
     * @return array
     */
    protected function getPathParts(SplFileInfo $fileInfo)
    {
        $pathParts = explode(DIRECTORY_SEPARATOR, $fileInfo->getPathname());

        return $pathParts;
    }

    /**
     * @param array $pathParts
     *
     * @throws RefactorException
     *
     * @return int
     */
    protected function getSrcDirectoryPosition(array $pathParts)
    {
        if (!in_array('src', array_values($pathParts))) {
            throw new RefactorException(
                sprintf(self::ERROR_MESSAGE_CANT_FIND_SRC_POSITION, implode(DIRECTORY_SEPARATOR, $pathParts))
            );
        }
        $srcPosition = array_search('src', array_values($pathParts));

        return $srcPosition;
    }

    /**
     * @param SplFileInfo $fileInfo
     *
     * @throws RefactorException
     *
     * @return string
     */
    protected function getClassNameFromFileInfo(SplFileInfo $fileInfo)
    {
        $pathParts = $this->getPathParts($fileInfo);
        $srcPosition = $this->getSrcDirectoryPosition($pathParts);

        $classParts = array_slice($pathParts, $srcPosition + 1);
        $className = implode('\\', $classParts);
        $className = str_replace('.php', '', $className);

        return $className;
    }

    /**
     * @param SplFileInfo $dependencyContainer
     *
     * @return bool
     */
    protected function isProject(SplFileInfo $dependencyContainer)
    {
        if ($this->getNamespaceFromFileInfo($dependencyContainer) === self::NAMESPACE_PROJECT) {
            return true;
        }

        return false;
    }

}
