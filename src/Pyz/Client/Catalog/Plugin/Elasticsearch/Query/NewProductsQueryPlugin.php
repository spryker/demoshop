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
use Elastica\Query\Term;
use Generated\Shared\Search\PageIndexMap;
use Spryker\Client\Kernel\AbstractPlugin;
use Spryker\Client\Search\Dependency\Plugin\QueryInterface;

class NewProductsQueryPlugin extends AbstractPlugin implements QueryInterface
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
        $newProductFilter = $this->newProductFilter();

        $boolQuery = new BoolQuery();
        $boolQuery->addFilter($newProductFilter);

        return $this->createQuery($boolQuery);
    }

    /**
     * @return \Elastica\Query\Nested
     */
    protected function newProductFilter()
    {
        $newProductsFilter = $this->createNewProductsFilter();

        $newProductsQuery = new Nested();
        $newProductsQuery
            ->setQuery($newProductsFilter)
            ->setPath(PageIndexMap::STRING_FACET);

        return $newProductsQuery;
    }

    /**
     * @return \Elastica\Query\BoolQuery
     */
    protected function createNewProductsFilter()
    {
        $stringFacetFieldFilter = $this->createStringFacetFieldFilter('label'); // TODO: this has to come from config
        $stringFacetValueFilter = $this->createStringFacetValueFilter(2); // TODO: this has to come from dictionary

        $newProductsBoolQuery = new BoolQuery();
        $newProductsBoolQuery
            ->addFilter($stringFacetFieldFilter)
            ->addFilter($stringFacetValueFilter);

        return $newProductsBoolQuery;
    }

    /**
     * @param string $fieldName
     *
     * @return \Elastica\Query\Term
     */
    protected function createStringFacetFieldFilter($fieldName)
    {
        $termQuery = new Term();
        $termQuery->setTerm(PageIndexMap::STRING_FACET_FACET_NAME, $fieldName);

        return $termQuery;
    }

    /**
     * @param int $idProductLabel
     *
     * @return \Elastica\Query\Term
     */
    protected function createStringFacetValueFilter($idProductLabel)
    {
        $termQuery = new Term();
        $termQuery->setTerm(PageIndexMap::STRING_FACET_FACET_VALUE, $idProductLabel);

        return $termQuery;
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
