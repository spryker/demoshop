<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\Catalog;

use Pyz\Client\Catalog\Plugin\Config\CatalogSearchConfigBuilder;
use Spryker\Client\Catalog\CatalogDependencyProvider as SprykerCatalogDependencyProvider;

class CatalogDependencyProvider extends SprykerCatalogDependencyProvider
{

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Search\Plugin\Config\SearchConfigBuilderInterface
     */
    protected function createSearchConfig($container)
    {
        return new CatalogSearchConfigBuilder();
    }

}
