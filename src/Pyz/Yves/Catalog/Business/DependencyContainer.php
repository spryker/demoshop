<?php

namespace Pyz\Yves\Catalog\Business;

use ProjectA\Yves\Library\DependencyInjection\FactoryTrait;
use ProjectA\Yves\Catalog\Business\DependencyContainer as CoreDependencyContainer;

/**
 * Class DependencyContainer
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