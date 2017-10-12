<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\Catalog\Plugin\Elasticsearch\Query;

use Elastica\Query;
use Elastica\Query\BoolQuery;
use Elastica\Query\Match;
use Generated\Shared\Search\PageIndexMap;
use Pyz\Shared\ProductSearch\ProductSearchConfig;
use Spryker\Client\Search\Dependency\Plugin\QueryInterface;

class FeaturedProductsQueryPlugin implements QueryInterface
{
    /**
     * @var int
     */
    protected $limit;

    /**
     * @var \Elastica\Query
     */
    protected $searchQuery;

    /**
     * @param int $limit
     */
    public function __construct($limit)
    {
        $this->limit = $limit;
        $this->searchQuery = $this->createSearchQuery();
    }

    /**
     * @return \Elastica\Query
     */
    public function getSearchQuery()
    {
        return $this->searchQuery;
    }

    /**
     * @return \Elastica\Query
     */
    protected function createSearchQuery()
    {
        $boolQuery = (new BoolQuery())
            ->addMust((new Match())
                ->setField(PageIndexMap::IS_FEATURED, true))
            ->addMust((new Match())
                ->setField(PageIndexMap::TYPE, ProductSearchConfig::PRODUCT_ABSTRACT_PAGE_SEARCH_TYPE));

        $query = (new Query())
            ->setSource([PageIndexMap::SEARCH_RESULT_DATA])
            ->setQuery($boolQuery)
            ->setSize($this->limit);

        return $query;
    }
}
