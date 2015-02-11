<?php

namespace Pyz\Yves\Catalog\Business;

use ProjectA\Yves\Catalog\Business\CatalogDependencyContainer as CoreDependencyContainer;

/**
 * Class YvesExportDependencyContainer
 * @package Pyz\Yves\Catalog\Business
 */
class DependencyContainer extends CoreDependencyContainer
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