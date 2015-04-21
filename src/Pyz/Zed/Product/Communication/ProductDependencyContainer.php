<?php

namespace Pyz\Zed\Product\Communication;

use SprykerFeature\Zed\Product\Communication\ProductDependencyContainer as SprykerProductDependencyContainer;
use Pyz\Zed\Product\Business\ProductFacade;

class ProductDependencyContainer extends SprykerProductDependencyContainer
{

    /**
     * @return ProductFacade
     */
    public function getInstallerFacade()
    {
        return $this->locator->product()->facade();
    }

}
