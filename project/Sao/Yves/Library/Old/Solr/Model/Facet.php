<?php

class Sao_Yves_Library_Solr_Model_Facet extends ProjectA_Yves_Library_Solr_Model_Facet
{
    /**
     * @param array $selectedFacets
     * @param boolean $notFilterByItself
     * @return array
     */
    public function getFacetSpreading ($selectedFacets = null, $notFilterByItself = false)
    {
        if (empty($selectedFacets)) {
            $selectedFacets = array();
        }

        $query = ProjectA_Shared_Library_Solr::getCore()->facetQuery();

        // we do not wan't to get results, just the facets
        $query->setRows(0);

        foreach ($selectedFacets as $name => $value) {
            if (!strpos($name, '_facet_')) {
                continue;
            }
            if (preg_match('~^(\d+)-(\d+)$~i', $value, $matches)) {
                $query->addFilterQueryRange($name, $matches[1], $matches[2]);
            } else {
                if ($notFilterByItself) {
                    $name = '{!tag=' . $name . '}' .$name;
                }
                $query->addFilterQuery($name, $value);
            }
        }
        $facets = Sao_Yves_Application_Component_Model_Factory::getStorage()->get(ProjectA_Shared_Library_Storage::getFacetsKey());
        $query->addFacetFieldList($facets, $notFilterByItself);
        $result = $query->execute();

        $result = array_merge($result['facet_counts']['facet_fields'], $result['facet_counts']['facet_queries']);
        $result = $this->prepareFacetSpreadingData($result);

        return $result;
    }

    /**
     * Sort, trim, format.. for facetSpreading
     * @param $facets
     * @return array
     */
    protected function prepareFacetSpreadingData($facets)
    {

        foreach ($facets as $facetName => &$keyValuePairs) {

            // remove empty entries
            $keyValuePairs = array_filter($keyValuePairs);

            switch($facetName) {
                case Sao_Yves_Catalog_Component_Model_Facets::$FACET_WIDTH['name']:
                    //sort by relevance, first all numbers
                    uksort($keyValuePairs, function($a, $b) {
                        $la=strlen(floor($a)); $lb=strlen(floor($b));
                        if ($la < 3 && $lb >= 3) {
                            return 1;
                        } else if ($lb < 3 && $la >= 3) {
                            return -1;
                        } else {
                            if($a == $b) return 0;
                            return ($a < $b)? -1: 1;
                        }
                    });
                    break;
                case Sao_Yves_Catalog_Component_Model_Facets::$FACET_HEIGHT['name']:
                case Sao_Yves_Catalog_Component_Model_Facets::$FACET_RIM['name']:
                    uksort($keyValuePairs, function($a, $b) {
                        $la=strlen(floor($a)); $lb=strlen(floor($b));
                        if ($la < 2 && $lb >= 2) {
                            return 1;
                        } else if ($lb < 2 && $la >= 2) {
                            return -1;
                        } else {
                            if($a == $b) return 0;
                            return ($a < $b)? -1: 1;
                        }
                    });
                    break;
                case Sao_Yves_Catalog_Component_Model_Facets::$FACET_SPEED['name']:
                    uksort($keyValuePairs, function($a, $b) {
                        $sortSpeed = array('A1', 'A2', 'A3', 'A4', 'A5', 'A6', 'A7', 'A8', 'B', 'C', 'D', 'E', 'F', 'G', 'J', 'K', 'L', 'M', 'N', 'P', 'Q', 'R', 'S', 'T', 'U', 'H', 'V', 'VR', 'W', 'ZR', 'Y');
                        $posA = array_search($a, $sortSpeed);
                        $posB = array_search($b, $sortSpeed);
                        return $posA - $posB;
                    });
                    break;
                default:
                    ksort($keyValuePairs);
            }
        }
        return $facets;
    }

}