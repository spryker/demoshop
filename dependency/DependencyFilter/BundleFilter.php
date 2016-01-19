<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Spryker\Dependency\DependencyFilter;

class BundleFilter extends AbstractDependencyFilter
{

    /**
     * @var array
     */
    private $filterBundles = [];

    /**
     * @param array $bundles
     */
    public function __construct(array $bundles)
    {
        $this->filterBundles = $bundles;
    }

    /**
     * @param $bundle
     *
     * @return bool
     */
    public function filter($bundle)
    {
        return in_array($bundle, $this->filterBundles);
    }


}
