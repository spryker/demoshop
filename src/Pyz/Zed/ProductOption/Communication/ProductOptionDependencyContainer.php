<?php

namespace Pyz\Zed\ProductOption\Communication;

use Spryker\Zed\ProductOption\Communication\ProductOptionDependencyContainer as SprykerProductOptionDependencyContainer;
use Pyz\Zed\ProductOption\Business\ProductOptionFacade;
use Pyz\Zed\ProductOption\ProductOptionDependencyProvider;

class ProductOptionDependencyContainer extends SprykerProductOptionDependencyContainer
{

    /**
     * @return ProductOptionFacade
     */
    public function getInstallerFacade()
    {
        return $this->getProvidedDependency(ProductOptionDependencyProvider::FACADE_PRODUCT_OPTION);
    }

}
