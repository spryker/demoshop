<?php

namespace Pyz\Yves\Catalog\Business;

use ProjectA\Yves\Library\DependencyInjection\FactoryInterface;
use ProjectA\Yves\Library\DependencyInjection\FactoryTrait;

/**
 * Class DependencyContainer
 * @package Pyz\Yves\Catalog\Business
 */
class DependencyContainer implements FactoryInterface
{
    use FactoryTrait;

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