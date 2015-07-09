<?php

namespace Pyz\Client\Catalog\Service\Model;

use Elastica\Query;
use Symfony\Component\HttpFoundation\Request;
use SprykerFeature\Client\Catalog\Service\Model\FulltextSearch as CoreFulltextSearch;

class FulltextSearch extends CoreFulltextSearch
{
    /**
     * @param Request $request
     * @param Query $searchQuery
     */
    protected function addFulltextSearchToQuery(Request $request, Query $searchQuery)
    {
        $searchString = $request->get('q');
        $searchQuery->setQuery(
            (new Query\Wildcard())->setValue('full-text', sprintf('*%s*', $searchString))
        );
    }

}
