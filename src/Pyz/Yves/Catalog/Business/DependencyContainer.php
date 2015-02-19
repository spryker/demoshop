<?php

namespace Pyz\Yves\Catalog\Business;

use SprykerFeature\Yves\Catalog\CatalogDependencyContainer;

/**
 * Class FrontendExporterDependencyContainer
 * @package Pyz\Yves\Catalog\Business
 */
class DependencyContainer extends CatalogDependencyContainer
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
