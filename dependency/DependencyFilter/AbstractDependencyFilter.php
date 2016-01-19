<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Spryker\Dependency\DependencyFilter;

abstract class AbstractDependencyFilter
{

    /**
     * @param $bundle
     *
     * @return bool
     */
    abstract public function filter($bundle);

}
