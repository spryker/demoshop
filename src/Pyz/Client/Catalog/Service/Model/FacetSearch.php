<?php

namespace Pyz\Client\Catalog\Service\Model;

use Elastica\Index;
use Elastica\Query;
use SprykerFeature\Client\Catalog\Service\Model\FacetSearch as SprykerFacetSearch;

/**
 */
class FacetSearch extends SprykerFacetSearch
{
    /**
     * @param Query $query
     *
     * @return self
     */
    protected function addSortingToQuery(Query $query)
    {
        $this->sortOrder = 'desc';
        if ($this->request->query->has('sort_order')) {
            $this->sortOrder = $this->request->query->get('sort_order');
        }
        if ($this->request->query->has('sort')) {
            $this->sortParam = $this->request->query->get('sort');
            $sortField = $this->facetConfig->getSortFieldFromParam($this->sortParam);
        } else {
            $sortField = FacetConfig::FIELD_INTEGER_SORT;
            $this->sortParam = sprintf('ProductCategoryOrder_%s', $this->category['node_id']);
        }
        $nestedSortField = implode('.', [$sortField, $this->sortParam]);

        $query->setSort(
            [
                $nestedSortField => [
                    'order' => $this->sortOrder,
                    'mode' => 'min',
                    'ignore_unmapped' => true,
                ],
            ]
        );
    }

}
