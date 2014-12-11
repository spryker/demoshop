<?php
namespace Pyz\Yves\Catalog\Module\Controller;

use Pyz\Yves\Library\Tracking\DataProvider\ProductDetailProvider;
use Pyz\Yves\Library\Tracking\PageTypeInterface;
use ProjectA\Yves\Catalog\Module\Controller\CatalogController as CoreCatalogController;
use Pyz\Yves\Catalog\Component\Model\FacetConfig;
use ProjectA\Yves\Library\Tracking\Tracking;
use Symfony\Component\HttpFoundation\Request;

/**
 * @package Pyz\Yves\Catalog\Module\Controller
 */
class CatalogController extends CoreCatalogController
{
    /**
     * @param FacetConfig $facetConfig
     * @param Request $request
     * @return array
     */
    public function indexAction(FacetConfig $facetConfig, Request $request)
    {
        $search = $this->getFactory()->createCatalogModelFacetSearch($request, $facetConfig); // TODO Change to RequestStack as of Symfony 2.4
        $result = $search->getResult();
        //echo '<pre>' . print_r($result, true) . '</pre>';die;
        return $result;
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
