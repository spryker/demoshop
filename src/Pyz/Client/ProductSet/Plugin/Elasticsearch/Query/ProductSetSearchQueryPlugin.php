<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\ProductSet\Plugin\Elasticsearch\Query;

use Elastica\Query;
use Elastica\Query\BoolQuery;
use Elastica\Query\Match;
use Generated\Shared\Search\PageIndexMap;
use Generated\Shared\Transfer\ProductSetStorageTransfer;
use Spryker\Client\Kernel\AbstractPlugin;
use Spryker\Client\Search\Dependency\Plugin\QueryInterface;
use Spryker\Shared\ProductSetCollector\ProductSetCollectorConfig;

class ProductSetSearchQueryPlugin extends AbstractPlugin implements QueryInterface
{

    const SIZE = 100;

    /**
     * @var string
     */
    protected $searchString;

    /**
     * @var \Elastica\Query
     */
    protected $query;

    public function __construct()
    {
        $this->query = $this->createSearchQuery();
    }

    /**
     * @return \Elastica\Query
     */
    public function getSearchQuery()
    {
        return $this->query;
    }

    /**
     * @return \Elastica\Query
     */
    protected function createSearchQuery()
    {
        $query = new Query();

        $this->setQuery($query)
            ->setSorting($query)
            ->setSize($query)
            ->setSource($query);

        return $query;
    }

    /**
     * @param \Elastica\Query $baseQuery
     *
     * @return $this
     */
    protected function setQuery(Query $baseQuery)
    {
        $boolQuery = new BoolQuery();
        $this->setTypeFilter($boolQuery);

        $baseQuery->setQuery($boolQuery);

        return $this;
    }

    /**
     * @param \Elastica\Query\BoolQuery $boolQuery
     *
     * @return void
     */
    protected function setTypeFilter(BoolQuery $boolQuery)
    {
        $typeFilter = new Match();
        $typeFilter->setField(PageIndexMap::TYPE, ProductSetCollectorConfig::SEARCH_TYPE_PRODUCT_SET);

        $boolQuery->addMust($typeFilter);
    }

    /**
     * @param \Elastica\Query $query
     *
     * @return $this
     */
    protected function setSorting(Query $query)
    {
        $query->addSort(
            [
                PageIndexMap::INTEGER_SORT . '.' . ProductSetStorageTransfer::WEIGHT => [
                    'order' => 'desc',
                    'mode' => 'min',
                    'unmapped_type' => 'integer',
                ],
            ]
        );

        return $this;
    }

    /**
     * @param \Elastica\Query $query
     *
     * @return $this
     */
    protected function setSize(Query $query)
    {
        $query->setSize(static::SIZE);

        return $this;
    }

    /**
     * @param \Elastica\Query $query
     *
     * @return $this
     */
    protected function setSource(Query $query)
    {
        $query->setSource([PageIndexMap::SEARCH_RESULT_DATA]);

        return $this;
    }

}
