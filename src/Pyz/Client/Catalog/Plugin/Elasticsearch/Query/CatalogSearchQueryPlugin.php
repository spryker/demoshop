<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\Catalog\Plugin\Elasticsearch\Query;

use Elastica\Query;
use Elastica\Query\BoolQuery;
use Elastica\Query\Match;
use Elastica\Suggest;
use Generated\Shared\Search\PageIndexMap;
use Pyz\Shared\ProductSearch\ProductSearchConfig;
use Spryker\Client\Catalog\Plugin\Elasticsearch\Query\CatalogSearchQueryPlugin as SprykerCatalogSearchQueryPlugin;

class CatalogSearchQueryPlugin extends SprykerCatalogSearchQueryPlugin
{
    /**
     * @param \Elastica\Query $baseQuery
     *
     * @return \Elastica\Query
     */
    protected function addFulltextSearchToQuery(Query $baseQuery)
    {
        $baseQuery = parent::addFulltextSearchToQuery($baseQuery);

        $this->setTypeFilter($baseQuery->getQuery());
        $this->setSuggestion($baseQuery);

        return $baseQuery;
    }

    /**
     * @param \Elastica\Query\BoolQuery $boolQuery
     *
     * @return void
     */
    protected function setTypeFilter(BoolQuery $boolQuery)
    {
        $typeFilter = (new Match())
            ->setField(PageIndexMap::TYPE, ProductSearchConfig::PRODUCT_ABSTRACT_PAGE_SEARCH_TYPE);

        $boolQuery->addMust($typeFilter);
    }

    /**
     * @param \Elastica\Query $baseQuery
     *
     * @return void
     */
    protected function setSuggestion(Query $baseQuery)
    {
        $suggest = new Suggest();
        $suggest->setGlobalText($this->getSearchString());

        $baseQuery->setSuggest($suggest);
    }
}
