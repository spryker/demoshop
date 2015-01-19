<?php
namespace Pyz\Yves\Catalog\Business\Model;
use Elastica\Client;
use Elastica\Query;
use ProjectA\Shared\Library\Storage\Adapter\KeyValue\ReadInterface;
use Pyz\Yves\Catalog\Business\Model\FacetConfig;
use ProjectA\Yves\Catalog\Business\Model\AbstractSearch;
//use Solarium\QueryType\Select\Query\Component\FacetSet;
use Symfony\Component\HttpFoundation\Request;
/**
 * @package ProjectA\Yves\Catalog\Business\Model
 */
class FacetSearch extends AbstractSearch
{
    /**
     * @param Request $request
     * @param FacetConfig $facetConfig
     * @param Client $searchClient
     * @param ReadInterface $kvStorageReader
     * @param $indexName
     */
    public function __construct(
        Request $request,
        FacetConfig $facetConfig,
        Client $searchClient,
        ReadInterface $kvStorageReader,
        $indexName
    ) {
//        parent::__construct($request, $facetConfig, $searchClient, $kvStorageReader, $indexName);
//        //add FacetSearch related default stuff
//        $this->addDefaultsToFacetQuery();
//        //dynamically set facets from facet config
//        $this->addFacetsToQuery($this->facetConfig->getActiveFacets());
//        //dynamically add filters, from url segments and parameters, project stuff
//        $this->addFiltersToQuery($request);
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
     * @return Query
     */
    protected function createSearchQuery(Request $request)
    {
        $searchQuery = new Query();
        $this->addSortingToQuery($searchQuery)
            ->addFacetsToQuery($searchQuery);


        return $searchQuery;
    }

    /**
     * @param Request $request
     */
    public function addFiltersToQuery(Request $request)
    {
        $filters = array_intersect(
            $request->query->keys(),
            $this->facetConfig->getAllParamNamesForFacets(true)
        );
        foreach ($filters as $filter) {
            $rangeQuery = false;
            $facetConfig = $this->facetConfig->getFacetSetupFromParameter($filter);
            $filterFacetName = $this->facetConfig->getFacetNameFromParameter($filter);
            $filterValue = $request->query->get($filter);
            //sliders will be range queries, lets get min/max values
            if ($facetConfig[FacetConfig::KEY_TYPE] == FacetConfig::TYPE_SLIDER) {
                if (trim($filterValue) == '') {
                    continue;
                }
                $values = explode($facetConfig[FacetConfig::KEY_RANGE_DIVIDER], $filterValue);
                $minValue = $values[0];
                $maxValue = $minValue;
                if (count($values) > 1) {
                    $maxValue = $values[1];
                }
                if (isset($facetConfig[FacetConfig::KEY_VALUE_CALLBACK_BEFORE]) && is_callable($facetConfig[FacetConfig::KEY_VALUE_CALLBACK_BEFORE])) {
                    $minValue = call_user_func($facetConfig[FacetConfig::KEY_VALUE_CALLBACK_BEFORE], $minValue);
                    $maxValue = call_user_func($facetConfig[FacetConfig::KEY_VALUE_CALLBACK_BEFORE], $maxValue);
                }
                $this->selectQuery->createFilterQuery($filter)->setQuery(
                    $filterFacetName . ':[' . $minValue . ' TO ' . $maxValue . ']'
                )->addTag($filterFacetName);
                continue;
            }
            //the rest is either multi-valued or single values
            if (is_array($filterValue)) {
                $this->selectQuery->createFilterQuery($filter)->setQuery(
                    $filterFacetName . ': (' . implode(' ' . self::DEFAULT_MULTI_SEARCH_OPERATOR . ' ', $filterValue) . ')'
                )->addTag($filterFacetName);
            } else {
                $this->selectQuery->createFilterQuery($filter)->setQuery(
                    $filterFacetName . ':' . $filterValue
                )->addTag($filterFacetName);
            }
        }
    }
}