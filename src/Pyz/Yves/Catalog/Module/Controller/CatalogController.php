<?php
namespace Pyz\Yves\Catalog\Module\Controller;

use ProjectA\Yves\Catalog\Module\Controller\CatalogController as CoreCatalogController;
use Pyz\Yves\Catalog\Component\Model\FacetConfig;
use Pyz\Yves\Catalog\Component\Model\FacetSearch;
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

        return $result;
    }
}
