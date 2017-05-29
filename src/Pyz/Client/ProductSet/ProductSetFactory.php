<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\ProductSet;

use Pyz\Client\ProductSet\Plugin\Elasticsearch\Query\ProductSetSearchQueryPlugin;
use Pyz\Client\ProductSet\Plugin\Elasticsearch\ResultFormatter\ProductSetSearchResultFormatterPlugin;
use Spryker\Client\Kernel\AbstractFactory;
use Spryker\Client\Search\Plugin\Elasticsearch\QueryExpander\LocalizedQueryExpanderPlugin;
use Spryker\Client\Search\Plugin\Elasticsearch\QueryExpander\StoreQueryExpanderPlugin;
use Spryker\Client\Search\SearchClient;

class ProductSetFactory extends AbstractFactory
{

    /**
     * @return \Spryker\Client\Search\Dependency\Plugin\QueryInterface
     */
    public function createProductSetSearchQuery()
    {
        $searchQuery = new ProductSetSearchQueryPlugin();

        $searchQuery = $this
            ->getSearchClient()
            ->expandQuery($searchQuery, $this->createProductSetSearchQueryExpanders());

        return $searchQuery;
    }

    /**
     * @return \Spryker\Client\Search\SearchClientInterface
     */
    public function getSearchClient()
    {
        return new SearchClient(); // TODO: get from dependency provider
    }

    /**
     * @return \Spryker\Client\Search\Dependency\Plugin\ResultFormatterPluginInterface[]
     */
    public function createProductSetSearchResultFormatters()
    {
        return [
            new ProductSetSearchResultFormatterPlugin(), // TODO: get from dependency provider
        ];
    }

    /**
     * @return \Spryker\Client\Search\Dependency\Plugin\QueryExpanderPluginInterface[]
     */
    protected function createProductSetSearchQueryExpanders()
    {
        return [
            new LocalizedQueryExpanderPlugin(), // TODO: get from dependency provider
            new StoreQueryExpanderPlugin(),
        ];
    }

}
