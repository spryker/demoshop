<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Spryker\dependency;

use Spryker\Dependency\DependencyFilter\AbstractDependencyFilter;
use Spryker\Dependency\DependencyFinder\AbstractDependencyChecker;
use Symfony\Component\Finder\SplFileInfo;

class DependencyTreeBuilder
{

    /**
     * @var array
     */
    private $dependencyTree = [];

    /**
     * @var AbstractDependencyChecker[]
     */
    private $dependencyChecker = [];

    /**
     * @var AbstractDependencyFilter[]
     */
    private $dependencyFilter = [];

    /**
     * @var Finder
     */
    private $finder;

    /**
     * @var FileInfoExtractor
     */
    private $fileInfoExtractor;

    /**
     * @param Finder $finder
     * @param FileInfoExtractor $fileInfoExtractor
     */
    public function __construct(Finder $finder, FileInfoExtractor $fileInfoExtractor)
    {
        $this->finder = $finder;
        $this->fileInfoExtractor = $fileInfoExtractor;
    }

    /**
     * @param AbstractDependencyChecker|array $dependencyChecker
     *
     * @return self
     */
    public function addDependencyChecker($dependencyChecker)
    {
        if (is_array($dependencyChecker)) {
            foreach ($dependencyChecker as $checker) {
                $this->addDependencyChecker($checker);
            }

            return $this;
        }

        $this->dependencyChecker[] = $dependencyChecker;

        return $this;
    }

    /**
     * @param AbstractDependencyFilter|array $dependencyFilter
     *
     * @return void
     */
    public function addFilter($dependencyFilter)
    {
        if (is_array($dependencyFilter)) {
            foreach ($dependencyFilter as $filter) {
                $this->addDependencyChecker($filter);
            }
        }

        $this->dependencyFilter[] = $dependencyFilter;
    }

    /**
     * @throws \Exception
     *
     * @return array
     */
    public function buildDependencyTree()
    {
        foreach ($this->finder->getFiles() as $fileInfo) {
            $bundle = $this->fileInfoExtractor->getBundleNameFromFileInfo($fileInfo);
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
        $toBundle = $dependencyChecker->getDependency();

        if (!$this->acceptBundle($toBundle)) {
            return;
        }

        $application = $this->fileInfoExtractor->getApplicationNameFromFileInfo($fileInfo);
        $layer = $this->fileInfoExtractor->getLayerNameFromFileInfo($fileInfo);

        $checker = get_class($dependencyChecker);

        $meta = [
            'file' => $fileInfo->getFilename(),
            'depends' => $toBundle,
            'application' => $application,
            'bundle' => $toBundle,
            'layer' => $layer,
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
     * @param string $bundle
     *
     * @return bool
     */
    protected function acceptBundle($bundle)
    {
        foreach ($this->dependencyFilter as $filter) {
            if ($filter->filter($bundle)) {
                return false;
            }
        }

        return true;
    }

}
