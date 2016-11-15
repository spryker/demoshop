<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\SpecialOffers;

use Pyz\Client\SpecialOffers\Plugin\Elasticsearch\Query\PersonalizedProductsQueryPlugin;
use Spryker\Client\Catalog\Plugin\Elasticsearch\ResultFormatter\RawCatalogSearchResultFormatterPlugin;
use Spryker\Client\Kernel\AbstractFactory;

class SpecialOffersFactory extends AbstractFactory
{

    /**
     * @return \Spryker\Client\Search\SearchClientInterface
     */
    public function getSearchClient()
    {
        return $this->getProvidedDependency(SpecialOffersDependencyProvider::CLIENT_SEARCH);
    }

    /**
     * @param int $limit
     *
     * @return \Pyz\Client\SpecialOffers\Plugin\Elasticsearch\Query\PersonalizedProductsQueryPlugin
     */
    public function createPersonalizedProductsQueryPlugin($limit)
    {
        return new PersonalizedProductsQueryPlugin($limit);
    }

    /**
     * @return \Spryker\Client\Search\Dependency\Plugin\QueryExpanderPluginInterface[]
     */
    public function createFeaturedProductsResultFormatters()
    {
        return [
            new RawCatalogSearchResultFormatterPlugin(),
        ];
    }

}
