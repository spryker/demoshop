<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\ProductSet;

use Spryker\Client\ProductSet\Plugin\Elasticsearch\ResultFormatter\ProductSetListResultFormatterPlugin;
use Spryker\Client\ProductSet\ProductSetDependencyProvider as SprykerProductSetDependencyProvider;
use Spryker\Client\Search\Plugin\Elasticsearch\QueryExpander\LocalizedQueryExpanderPlugin;
use Spryker\Client\Search\Plugin\Elasticsearch\QueryExpander\StoreQueryExpanderPlugin;

class ProductSetDependencyProvider extends SprykerProductSetDependencyProvider
{
    /**
     * @return array
     */
    protected function getProductSetListResultFormatterPlugins()
    {
        return [
            new ProductSetListResultFormatterPlugin(),
        ];
    }

    /**
     * @return array
     */
    protected function getProductSetListQueryExpanderPlugins()
    {
        return [
            new LocalizedQueryExpanderPlugin(),
            new StoreQueryExpanderPlugin(),
        ];
    }
}
