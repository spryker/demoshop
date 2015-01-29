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
     * @param array       $category
     * @param FacetConfig $facetConfig
     * @param Request     $request
     * @return array
     * @throws \Exception
     */
    public function indexAction(array $category, FacetConfig $facetConfig, Request $request)
    {
        $search = $this->getFactory()->createCatalogDependencyContainer()->createFacetSearch(
            $request,
            $this->getElasticsearchIndex(),
            $this->getStorageKeyValue(),
            $category,
            $facetConfig
        );
        $result = $search->getResult();

        return array_merge($result, ['category' => $category]);
    }

    /**
     * @param Request     $request
     * @param FacetConfig $facetConfig
     * @return array
     */
    public function fulltextSearchAction(Request $request, FacetConfig $facetConfig)
    {
        $search = $this->getFactory()->createCatalogDependencyContainer()->createFulltextSearch(
            $request,
            $this->getElasticsearchIndex(),
            $this->getStorageKeyValue(),
            $facetConfig
        );

        return $search->getResult();
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

    /**
     * @return \Elastica\Index
     * @throws \Exception
     */
    protected function getElasticsearchIndex()
    {
        $indexName = Config::get(SystemConfig::ELASTICA_PARAMETER__INDEX_NAME);
        $searchClient = $this->getStorageElasticsearch();

        return $searchClient->getIndex($indexName);
    }
}