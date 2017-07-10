<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\Catalog\Plugin\Elasticsearch\Query;

use Elastica\Query;
use Elastica\Query\AbstractQuery;
use Elastica\Query\BoolQuery;
use Elastica\Query\Nested;
use Elastica\Query\Range;
use Elastica\Query\Term;
use Generated\Shared\Search\PageIndexMap;
use Spryker\Client\Kernel\AbstractPlugin;
use Spryker\Client\Search\Dependency\Plugin\QueryInterface;

class SaleSearchQueryPlugin extends AbstractPlugin implements QueryInterface
{

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
        // TODO: change this to similar as new products query (consider having a generic label filtered base query)
        // TODO: consider to have a generic query expander for labels instead?
        $priceQuery = $this->createPriceQuery('price.DEFAULT');
        $originalPriceQuery = $this->createPriceQuery('price.ORIGINAL');

        $boolQuery = new BoolQuery();
        $boolQuery
            ->addFilter($priceQuery)
            ->addFilter($originalPriceQuery);

        return $this->createQuery($boolQuery);
    }

    /**
     * @param string $priceField
     *
     * @return \Elastica\Query\Nested
     */
    protected function createPriceQuery($priceField)
    {
        $priceFilter = $this->createPriceFilter($priceField);

        $priceQuery = new Nested();
        $priceQuery
            ->setQuery($priceFilter)
            ->setPath(PageIndexMap::INTEGER_FACET);

        return $priceQuery;
    }

    /**
     * @param string $priceField
     *
     * @return \Elastica\Query\BoolQuery
     */
    protected function createPriceFilter($priceField)
    {
        $priceFieldFilter = $this->createPriceFieldFilter($priceField);
        $priceValueFilter = $this->createPriceValueFilter();

        $priceBoolQuery = new BoolQuery();
        $priceBoolQuery
            ->addFilter($priceFieldFilter)
            ->addFilter($priceValueFilter);

        return $priceBoolQuery;
    }

    /**
     * @param string $priceField
     *
     * @return \Elastica\Query\Term
     */
    protected function createPriceFieldFilter($priceField)
    {
        $termQuery = new Term();
        $termQuery->setTerm(PageIndexMap::INTEGER_FACET_FACET_NAME, $priceField);

        return $termQuery;
    }

    /**
     * @return \Elastica\Query\Range
     */
    protected function createPriceValueFilter()
    {
        $rangeQuery = new Range();
        $rangeQuery->addField(PageIndexMap::INTEGER_FACET_FACET_VALUE, ['gt' => 0]);

        return $rangeQuery;
    }

    /**
     * @param \Elastica\Query\AbstractQuery $abstractQuery
     *
     * @return \Elastica\Query
     */
    protected function createQuery(AbstractQuery $abstractQuery)
    {
        $query = new Query();
        $query
            ->setQuery($abstractQuery)
            ->setSource([PageIndexMap::SEARCH_RESULT_DATA]);

        return $query;
    }

}
