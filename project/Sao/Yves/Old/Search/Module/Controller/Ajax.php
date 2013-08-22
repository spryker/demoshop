<?php

/**
 * Homepage
 */

class Sao_Yves_Search_Module_Controller_Ajax extends Sao_Yves_Library_Base_Controller
{
    public function actionLivesearch()
    {
//        $this->setIndex('noindex,nofollow');
//
//        $facets = ModelFactory::getYpCatalogModelFacets();
//        $facets->setStorage(Factory::getStorage());
//
//
//        $catalogListing = ModelFactory::getYpCatalogModelCatalog();
//        $catalogListing->setParams($this->getAllParams());
//
//        $queryParam = $this->getAllGetParams()['q'];
//
//        $catalogListing->setFacets($facets);
//
//        $result = $catalogListing->getResult();
//
//        $result['products'] = array_slice($result['products'], 0, 10);
//
//        $queryParam = preg_replace('#\s+#', ' ', trim($queryParam));
//        $queryRegexp = explode(' ', $queryParam);
//        if (count($queryRegexp)) {
//            foreach ($queryRegexp as $k => $v) {
//                $queryRegexp[$k] = preg_quote($v);
//            }
//            $queryRegexp = '#((?:[^\w]|^)(?:'.implode('|', $queryRegexp).'))#i';
//        } else {
//            $queryRegexp = '';
//        }
//
//        echo $this->renderPartial('search/ajax/index', array('result' => $result, 'queryParam' => $queryParam, 'queryRegexp' => $queryRegexp));
//        return true;
    }
}