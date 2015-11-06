<?php

namespace Pyz\Client\Catalog\Service;

use Generated\Client\Ide\FactoryAutoCompletion\CatalogService;
use Pyz\Client\Catalog\Service\Storage\CatalogStorage;
use SprykerFeature\Client\Catalog\Service\CatalogDependencyContainer as SprykerCatalogDependencyContainer;

/**
 * @method CatalogService getFactory()
 */
class CatalogDependencyContainer extends SprykerCatalogDependencyContainer
{
    /**
     * @return CatalogStorage
     */
    public function createCatalogStorage()
    {
         return $this->getFactory()->createStorageCatalogStorage(
             $this->createStorage(),
             $this->getFactory()->createKeyBuilderCategoryResourceKeyBuilder()
         );
    }
}
