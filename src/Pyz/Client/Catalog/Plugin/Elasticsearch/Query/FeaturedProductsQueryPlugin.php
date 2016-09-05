<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\Catalog\Plugin\Elasticsearch\Query;

use Elastica\Query;
use Elastica\Query\Match;
use Generated\Shared\Search\PageIndexMap;
use Spryker\Client\Search\Dependency\Plugin\QueryInterface;

class FeaturedProductsQueryPlugin implements QueryInterface
{

    /**
     * @var int
     */
    protected $limit;

    /**
     * @param int $limit
     */
    public function __construct($limit)
    {
        $this->limit = $limit;
    }

    /**
     * @return \Elastica\Query
     */
    public function getSearchQuery()
    {
        $matchQuery = (new Match())
            ->setField(PageIndexMap::IS_FEATURED, true);

        $query = (new Query())
            ->setSource([PageIndexMap::SEARCH_RESULT_DATA])
            ->setQuery($matchQuery)
            ->setSize($this->limit);

        return $query;
    }

}
