<?php

namespace Pyz\Yves\Catalog\Communication\Controller;

use ProjectA\Shared\Library\Config;
use ProjectA\Shared\System\SystemConfig;
use Pyz\Yves\Library\Tracking\DataProvider\ProductDetailProvider;
use Pyz\Yves\Library\Tracking\PageTypeInterface;
use ProjectA\Yves\Catalog\Communication\Controller\CatalogController as CoreCatalogController;
use Pyz\Yves\Catalog\Business\Model\FacetConfig;
use ProjectA\Yves\Library\Tracking\Tracking;
use Symfony\Component\HttpFoundation\Request;

/**
 * @package Pyz\Yves\Catalog\Communication\Controller
 */
class CatalogController extends CoreCatalogController
{

    /**
     * @param FacetConfig $facetConfig
     * @param Request $request
     * @return array
     */
    public function indexAction(array $category, FacetConfig $facetConfig, Request $request)
    {
        $search = $this->getFactory()->createCatalogModelFulltextSearch(
            $request,
            $facetConfig,
            $this->getStorageElasticsearch(),
            $this->getStorageKeyValue(),
            Config::get(SystemConfig::ELASTICA_PARAMETER__INDEX_NAME),
            $this->getFactory()->createCatalogModelFacetAggregation()
        );
        $search->getResult();

        $search = $this->getFactory()->createCatalogModelFacetSearch(
            $request,
            $facetConfig,
            $this->getStorageElasticsearch(),
            $this->getStorageKeyValue(),
            Config::get(SystemConfig::ELASTICA_PARAMETER__INDEX_NAME)
        );
        $result = $search->getResult();
        //echo '<pre>' . print_r($result, true) . '</pre>';die;

        return array_merge($result, ['category' => $category]);
    }

    /**
     * @param array $product
     * @return array
     */
    public function detailAction(array $product)
    {
        Tracking::getInstance()
            ->setPageType(PageTypeInterface::PAGE_TYPE_PRODUCT_DETAIL)
            ->buildTracking()
            ->setValue(ProductDetailProvider::KEY_PRODUCT_DETAIL, $product);
        return parent::detailAction($product);
    }
}