<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\SpecialOffers\Plugin\Elasticsearch\Query;

use Elastica\Query;
use Elastica\Query\FunctionScore;
use Elastica\Query\MatchAll;
use Generated\Shared\Search\PageIndexMap;
use Spryker\Client\Search\Dependency\Plugin\QueryInterface;

class PersonalizedProductsQueryPlugin implements QueryInterface
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
        $functionScoreQuery = (new FunctionScore())
            ->setQuery(new MatchAll())
            ->addFunction('random_score', ['seed' => session_id()])
            ->setScoreMode('sum');

        $query = (new Query())
            ->setSource([PageIndexMap::SEARCH_RESULT_DATA])
            ->setQuery($functionScoreQuery)
            ->setSize($this->limit);

        return $query;
    }

}
