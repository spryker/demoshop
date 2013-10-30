<?php
namespace Pyz\Yves\Catalog\Module\Controller;

use ProjectA\Yves\Catalog\Module\Controller\CatalogController as CoreCatalogController;
use Pyz\Yves\Catalog\Component\Model\FacetConfig;
use Pyz\Yves\Catalog\Component\Model\FacetSearch;

/**
 * @package Pyz\Yves\Catalog\Module\Controller
 */
class CatalogController extends CoreCatalogController
{
    /**
     * @param FacetConfig $facetConfig
     * @return array
     */
    public function indexAction(FacetConfig $facetConfig)
    {
        $search = new FacetSearch($this->request, $facetConfig);
        $result = $search->getResult();

        return $result;
    }
}
