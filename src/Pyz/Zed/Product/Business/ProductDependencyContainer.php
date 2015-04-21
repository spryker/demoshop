<?php

namespace Pyz\Zed\Product\Business;

use Generated\Zed\Ide\FactoryAutoCompletion\ProductBusiness;
use ProjectA\Zed\Product\Business\Builder\SimpleAttributeMergeBuilder;
use ProjectA\Zed\Product\Business\ProductDependencyContainer as SprykerDependencyContainer;

class ProductDependencyContainer extends SprykerDependencyContainer
{
    /**
     * @var ProductBusiness
     */
    protected $factory;

    /**
     * @return SimpleAttributeMergeBuilder
     */
    public function createProductBuilder()
    {
        return $this->factory->createBuilderSimpleAttributeMergeBuilder();
    }
}
