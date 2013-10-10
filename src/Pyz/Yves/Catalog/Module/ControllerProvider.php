<?php
namespace Pyz\Yves\Catalog\Module;

use ProjectA\Yves\Library\Silex\Controller\ControllerProvider as YvesProvider;

class ControllerProvider extends YvesProvider
{
    const ROUTE_CATALOG_INDEX = 'catalog/index';
    const ROUTE_CATALOG_SEARCH = 'catalog/search';
    const ROUTE_CATALOG_DETAIL = 'catalog/detail';

    protected function defineControllers()
    {
        $this->createGetController('/catalog/', 'CatalogController', 'index', self::ROUTE_CATALOG_INDEX);
    }
}
