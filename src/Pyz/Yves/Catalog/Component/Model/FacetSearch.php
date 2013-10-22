<?php
namespace Pyz\Yves\Catalog\Component\Model;

use ProjectA\Shared\Catalog\Code\Storage\StorageKeyGenerator;
use ProjectA\Shared\Library\Storage\StorageInstanceBuilder;
use ProjectA\Shared\Solr\Code\SolrInstanceBuilder;
use ProjectA\Yves\Catalog\Component\Model\Search;
use Solarium\QueryType\Select\Query\Component\FacetSet;
use Symfony\Component\HttpFoundation\Request;

/**
 * @package ProjectA\Yves\Catalog\Component\Model
 */
class FacetSearch extends Search
{

    public function __construct(Request $request)
    {
        parent::__construct($request);

        //add FacetSearch related default stuff
        $this->addDefaultsToFacetQuery();

        //dynamically set facets from facet config
        $activeFacets = FacetConfig::getActiveFacets();
        $this->addFacetsToQuery($activeFacets);

        //dynamically add filters, from url segments and parameters, project stuff
        $this->addFiltersToQuery($request);

    }

    /**
     * those values have formerly been set in the solrconfig.xml as RequestHandlers
     * now we are able to control them during runtime
     */
    protected function addDefaultsToFacetQuery()
    {
        $this->selectQuery->setOmitHeader(true);
        $this->selectQuery->addField('sku');
        $this->selectQuery->addParam('tie', '0.01');

        //the default solarium query has * and score in the field list, we don`t need those lets remove them
        $this->selectQuery->removeField('*');
        $this->selectQuery->removeField('score');

        //TODO currently we need the id to read the entries from the kvStorage, this needs to be adapted once that changes
        // current kvStorage entry -> US.catalog.product.3
        $this->selectQuery->addField('id');

        $facetSet = $this->selectQuery->getFacetSet();
        $facetSet->setMinCount(1);
        $facetSet->setLimit(-1);

        //important, because solarium will handle default behavior "map" wrong
        //TODO provide a pull-request for solarium
        $this->selectQuery->addParam('json.nl', 'flat');
    }

    /**
     * @param Request $request
     */
    public function addFiltersToQuery(Request $request)
    {
        $filters = array_intersect(
            $request->query->keys(),
            FacetConfig::getAllParamNamesForFacets(true)
        );

        foreach ($filters as $filter) {
            $filterFacetName = FacetConfig::getFacetNameFromParameter($filter);
            $filterValue = $request->query->get($filter);
            if (is_array($filterValue)) {
                $this->selectQuery->createFilterQuery($filter)->setQuery(
                    $filterFacetName . ': (' . implode(' ' . self::DEFAULT_MULTI_SEARCH_OPERATOR . ' ', $filterValue) . ')'
                );
            } else {
                $this->selectQuery->createFilterQuery($filter)->setQuery(
                    $filterFacetName . ':' . $filterValue
                );
            }
        }
    }
}
