<?php
/**
 * Advanced Search
 *
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @version 07.08.12 13:26
 */

class Sao_Yves_Search_Module_Controller_Advanced extends Sao_Yves_Library_Base_Controller
{

    public function actionIndex()
    {
//        $this->setPageTitle(t(L::ADVANCED_SEARCH));
//        $this->addBodyClass('advancedSearch');
//
//        /* @var $form Sao_Yves_Application_Component_Form_AdvancedSearch */
//        $form = FormsFactory::getAdvancedSearchForm();
//
//        if ($this->getParam('AdvancedSearchForm')) {
//            $form->populate($this->getParam('AdvancedSearchForm'));
//
//            if ($form->validate()) {
//
//                $params = array();
//                $priceFrom = null;
//                $priceTo = null;
//                $priceSearch = false;
//
//                foreach($form->getValues() as $name => $value) {
//
//                    /* @var $formElement Sao_Yves_Library_Form_Element */
//                    $formElement = $form->getElement($name);
//                    $formElementAttributes = $formElement->getAttributes();
//
//                    $searchtype = isset($formElementAttributes[AdvancedSearchForm::SEARCHTYPE]) ? $formElementAttributes[AdvancedSearchForm::SEARCHTYPE] : '';
//                    switch($searchtype) {
//                        case AdvancedSearchForm::SEARCHTYPE_BOOL_FACET: if($value > 0) {
//                                                                            $params[$name] = $value;
//                                                                        }
//                                                                        break;
//                        case AdvancedSearchForm::SEARCHTYPE_FACET:      if($value) {
//                                                                            $params[$name] = $value;
//                                                                        }
//                                                                        break;
//                        case AdvancedSearchForm::SEARCHTYPE_PRICE:      if($name == AdvancedSearchForm::PRICE_FROM && !empty($value)) {
//                                                                            $priceFrom = floatval(str_replace(',', '.', $value)) * 100;
//                                                                            $priceSearch = true;
//                                                                        }
//                                                                        if($name == AdvancedSearchForm::PRICE_TO && !empty($value)) {
//                                                                            $priceTo = floatval(str_replace(',', '.', $value)) * 100;
//                                                                            $priceSearch = true;
//                                                                        }
//                                                                        break;
//                        case AdvancedSearchForm::SEARCHTYPE_TEXT:
//                        default:                                        if(!isset($params['q']) && $value) {
//                                                                            $params['q'] = '';
//                                                                        }
//                                                                        if($value) {
//                                                                            $params['q'] .= $value . ' ';
//                                                                        }
//                    }
//
//                }
//
//                //set prices
//                if($priceSearch) {
//                    $params[AdvancedSearchForm::SEARCHTYPE_PRICE] = $this->preparePriceForSearch($priceFrom, $priceTo);
//                }
//
//                $this->redirect(Yp_Catalog_Model_Helper::getUrl($params));
//            }
//        }
//
//        $this->render('index', array('advancedSearchForm' => $form));
    }

    /**
     * @param $priceFrom
     * @param $priceTo
     * @return string
     */
    protected function preparePriceForSearch($priceFrom, $priceTo)
    {
//        //correct negatives
//        if($priceFrom < 0) {
//            $priceFrom *= -1;
//        }
//        if($priceTo < 0) {
//            $priceTo *= -1;
//        }
//        //switch prices if from bigger then to
//        if($priceFrom > $priceTo) {
//            $newPriceTo = $priceFrom;
//            $priceFrom = $priceTo;
//            $priceTo = $newPriceTo;
//        }
//        //correct missing from or to values
//        if(!$priceFrom && $priceTo) {
//            $priceFrom = 0;
//        }
//        elseif($priceFrom && !$priceTo) {
//            $priceTo = PHP_INT_MAX;
//        }
//        //combine and return
//        return $priceFrom . '-' . $priceTo;
    }

    public function actionFacets()
    {
//        $params = $this->_getAllUrlParams();
//
//        try {
//            $facets = Factory::getSolrFacetModel()->getFacetSpreading($params, true);
//        } catch (PalShared_Solr_Exception $e) {
//            echo '{}';
//        }
//        echo json_encode($facets);
    }


}
