<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Spryker\Dependency\DependencyFinder;

use Symfony\Component\Finder\SplFileInfo;

abstract class AbstractDependencyChecker
{

    /**
     * @var string
     */
    private $bundle;

    /**
     * @param SplFileInfo $fileInfo
     * @param string $bundle
     *
     * @return void
     */
    abstract public function checkDependencies(SplFileInfo $fileInfo, $bundle);

    /**
     * @param $toBundle
     *
     * @return void
     */
    protected function addDependency($toBundle)
    {
        $this->bundle = $toBundle;
    }

    /**
     * @return bool
     */
    public function foundDependency()
    {
        return ($this->bundle !== null);
    }

    /**
     * @return string
     */
    public function getDependency()
    {
        $dependentBundle = $this->bundle;
        $this->bundle = null;

        return $dependentBundle;
    }
}
