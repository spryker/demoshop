<?php

namespace Pyz\Yves\Catalog\Business;

use ProjectA\Yves\Catalog\Business\CatalogDependencyContainer as CoreCatalogDependencyContainer;

/**
 * Class YvesExportDependencyContainer
 * @package Pyz\Yves\Catalog\Business
 */
class CatalogDependencyContainer extends CoreCatalogDependencyContainer
{
    /**
     * @return Creator\CategoryResourceCreator
     */
    public function createCategoryResourceCreator()
    {
        return $this->factory->createCatalogCreatorCategoryResourceCreator(
            $this->factory->createCatalogModelFacetConfig()
        );
    }
}