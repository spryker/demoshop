<?php

namespace Pyz\Zed\Product\Business;

use ProjectA\Zed\Product\Business\Builder\SimpleAttributeMergeBuilder;
use ProjectA\Zed\Product\Business\ProductDependencyContainer as CoreDependencyContainer;

/**
 * Class ProductDependencyContainer
 *
 * @package Pyz\Zed\Product\Business
 */
class ProductDependencyContainer extends CoreDependencyContainer
{
    /**
     * @return SimpleAttributeMergeBuilder
     */
    public function getProductBuilder()
    {
        return $this->factory->create('Builder\\SimpleAttributeMergeBuilder');
    }
}
 