<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Spryker\dependency;

use Spryker\Dependency\DependencyFinder\AbstractDependencyChecker;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class DependencyTreeBuilder
{

    const APPLICATION_YVES = 'Yves';
    const APPLICATION_CLIENT = 'Client';
    const APPLICATION_ZED = 'Zed';

    private $dependencyTree = [
        self::APPLICATION_YVES => [],
        self::APPLICATION_CLIENT => [],
        self::APPLICATION_ZED => [],
    ];

    /**
     * @var AbstractDependencyChecker[]
     */
    private $dependencyChecker = [];

    /**
     * @param AbstractDependencyChecker|array $dependencyChecker
     *
     * @return void
     */
    public function addDependencyChecker($dependencyChecker)
    {
        if (is_array($dependencyChecker)) {
            foreach ($dependencyChecker as $checker) {
                $this->addDependencyChecker($checker);
            }
        }

        $this->dependencyChecker[] = $dependencyChecker;
    }

    /**
     * @param Finder $finder
     *
     * @throws \Exception
     *
     * @return array
     */
    public function buildDependencyTree(Finder $finder)
    {
        foreach ($finder as $fileInfo) {
            $bundle = $this->getBundleNameFromFileInfo($fileInfo);
            foreach ($this->dependencyChecker as $dependencyChecker) {
                $dependencyChecker->checkDependencies($fileInfo, $bundle);
                if ($dependencyChecker->foundDependency()) {
                    $this->addDependency($fileInfo, $dependencyChecker, $bundle);
                }
            }
        }

        return $this->dependencyTree;
    }

    /**
     * @param SplFileInfo $fileInfo
     * @param AbstractDependencyChecker $dependencyChecker
     * @param string $bundle
     *
     * @throws \Exception
     *
     * @return void
     */
    private function addDependency(SplFileInfo $fileInfo, AbstractDependencyChecker $dependencyChecker, $bundle)
    {
        $application =$this->getApplicationNameFromFileInfo($fileInfo);
        $toBundle = $dependencyChecker->getDependency();
        $checker = get_class($dependencyChecker);

        $meta = [
            'in file' => $fileInfo->getPathname(),
        ];

        if (!array_key_exists($application, $this->dependencyTree)) {
            $this->dependencyTree[$application] = [];
        }
        if (!array_key_exists($bundle, $this->dependencyTree[$application])) {
            $this->dependencyTree[$application][$bundle] = [];
        }
        if (!array_key_exists($toBundle, $this->dependencyTree[$application][$bundle])) {
            $this->dependencyTree[$application][$bundle][$toBundle] = [];
        }
        if (!array_key_exists($checker, $this->dependencyTree[$application][$bundle][$toBundle])) {
            $this->dependencyTree[$application][$bundle][$toBundle][$checker] = [];
        }

        $this->dependencyTree[$application][$bundle][$toBundle][$checker][] = $meta;
    }

    /**
     * @param SplFileInfo $fileInfo
     *
     * @throws \Exception
     *
     * @return string
     */
    private function getApplicationNameFromFileInfo(SplFileInfo $fileInfo)
    {
        $pathParts = explode(DIRECTORY_SEPARATOR, $fileInfo->getPathname());
        $sourceDirectoryPosition = array_search('src', $pathParts);
        if ($sourceDirectoryPosition) {
            return $pathParts[$sourceDirectoryPosition + 2];
        }

        $testsDirectoryPosition = array_search('tests', $pathParts);
        if ($testsDirectoryPosition) {
            return $pathParts[$testsDirectoryPosition + 3];
        }

        throw new \Exception(sprintf('Could not extract application name from file "%s".', $fileInfo->getPathname()));
    }

    /**
     * @param SplFileInfo $fileInfo
     *
     * @throws \Exception
     *
     * @return string
     */
    private function getBundleNameFromFileInfo(SplFileInfo $fileInfo)
    {
        $pathParts = explode(DIRECTORY_SEPARATOR, $fileInfo->getPathname());
        $sourceDirectoryPosition = array_search('src', $pathParts);
        if ($sourceDirectoryPosition) {
            return $pathParts[$sourceDirectoryPosition + 3];
        }

        $testsDirectoryPosition = array_search('tests', $pathParts);
        if ($testsDirectoryPosition) {
            return $pathParts[$testsDirectoryPosition + 4];
        }

        throw new \Exception(sprintf('Could not extract bundle name from file "%s".', $fileInfo->getPathname()));
    }

}
