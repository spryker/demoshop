<?php
namespace Pyz\Yves\Catalog\Module;

use ProjectA\Yves\Catalog\Module\ControllerProvider as CoreControllerProvider;

class ControllerProvider extends CoreControllerProvider
{
    const ROUTE_CATALOG_INDEX = 'catalog/index';
    const ROUTE_CATALOG_SEARCH = 'catalog/search';
    const ROUTE_CATALOG_DETAIL = 'catalog/detail';

    protected function defineControllers()
    {
        parent::defineControllers();

        $this->createGetController('/catalog/', 'CatalogController', 'index', self::ROUTE_CATALOG_INDEX);
    }
}
