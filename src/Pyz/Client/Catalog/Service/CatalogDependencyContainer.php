<?php

namespace Pyz\Client\Catalog\Service;

use Pyz\Client\Catalog\Service\Storage\CatalogStorage;
use SprykerFeature\Client\Catalog\Service\CatalogDependencyContainer as SprykerCatalogDependencyContainer;

class CatalogDependencyContainer extends SprykerCatalogDependencyContainer
{
    /**
     * @return CatalogStorage
     */
    public function createCatalogStorage()
    {
         return $this->getFactory()->createStorageCatalogStorage();
    }
}
