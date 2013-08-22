<?php

class Sao_Yves_Catalog_Component_Model_Catalog extends ProjectA_Yves_Model_Component_Model_Catalog
{
    protected $itemsPerPage = 100;
    protected $sort = 'relevance';

    const SORT_MANDATORY = 'score_is_sellable desc, ';

    public function getResult()
    {
        if ($this->getCurrentSort() == self::SORT_MANDATORY.'relevance') {
            if(isset($this->params[self::PARAM_CATEGORY])) {
                $models = Generated_Yves_ModelFactory::getYpCategoryModelCategory(Sao_Yves_Application_Component_Model_Factory::getStorage())->getCategories(array($this->params[self::PARAM_CATEGORY]));
                $model = array_shift($models);
                if(array_key_exists('solr_sort', $model) && $model['solr_sort']) {
                    $this->params[self::PARAM_SORT] = $model['solr_sort'];
                } else {
                    $this->sort_order = 'desc';
                    $this->params[self::PARAM_SORT] = $this->getRelevanceSort();
                }
            } else {
                $this->sort_order = 'desc';
                $this->params[self::PARAM_SORT] = $this->getRelevanceSort();
            }
        } elseif ($this->getCurrentSort() == self::SORT_MANDATORY.'score') {
            $this->sort_order = 'desc';
        }

        return parent::getResult();
    }

    /**
     * @param array $selectedBoolFacets
     *
     * @return array
     */
    public function removeEmptyBoolFacets(array $selectedBoolFacets)
    {
        $nonEmptyBoolFacets = array();

        $prefix = 'bool_facet_';
        foreach ($this->params as $key => $value) {
            $facetName = $prefix . $key;
            foreach ($selectedBoolFacets as $facet) {
                if ($facetName == $facet['name'] || isset($facet['values']['true'])) {
                    $nonEmptyBoolFacets[$facet['name']] = $facet;
                    continue;
                }
            }
        }

        return $nonEmptyBoolFacets;
    }

    protected function getRelevanceSort() {
        $sortOrder = $this->getCurrentSortOrder();
        return 'score_sells '.$sortOrder.', score_cartadds '.$sortOrder.', product_id';
    }

    /**
     * Returns current sort
     * @return string
     */
    public function getCurrentSort()
    {
        $sort = self::SORT_MANDATORY;
        if (isset($this->params[self::PARAM_SORT]) && !empty($this->params[self::PARAM_SORT]) && $this->params[self::PARAM_SORT] != 'score')
            $sort .= $this->params[self::PARAM_SORT];
        elseif (isset($this->params[self::PARAM_SEARCH]) && strlen(trim($this->params[self::PARAM_SEARCH])))
            $sort .= 'score';
        else
            $sort .= $this->sort;
        return $sort;
    }
}
