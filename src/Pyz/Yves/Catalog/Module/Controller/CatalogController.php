<?php
namespace Pyz\Yves\Catalog\Module\Controller;

use ProjectA\Yves\Catalog\Module\Controller\CatalogController as CoreCatalogController;
use ProjectA\Yves\Catalog\Component\Model\Category;
use Pyz\Yves\Catalog\Component\Model\FacetSearch;

class CatalogController extends CoreCatalogController
{
    public function indexAction()
    {
        $search = new FacetSearch($this->request);
        $result = $search->getResult();

        $result['categories'] = Category::getCategoryTree($this->app->getStorageKeyValue());

        return $result;
    }
}
