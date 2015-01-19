<?php

namespace Pyz\Yves\Catalog\Business\Model;
use Elastica\Query;
use ProjectA\Yves\Catalog\Business\Model\AbstractSearch;
use Symfony\Component\HttpFoundation\Request;

/**
 * @package ProjectA\Yves\Catalog\Business\Model
 */
class FulltextSearch extends AbstractSearch
{
    /**
     * @param Request $request
     * @return Query
     */
    protected function createSearchQuery(Request $request)
    {
        $searchString = $request->get('search');
        $query = new Query();
//        $matchQuery = (new Query\Match())->setField('full-text-boosted', $searchString);
//        $query->setQuery($matchQuery);
        $this->facetAggregation->addFacetsToQuery(
            $query,
            $this->facetConfig->getStringFacetField(),
            $this->facetConfig->getNumberFacetField()
        );
        return $query;
    }
}
