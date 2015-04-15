<?php

namespace Pyz\Zed\Product\Communication;

use ProjectA\Zed\Product\Communication\ProductDependencyContainer as SprykerProductDependencyContainer;
use Pyz\Zed\Product\Business\ProductFacade;

class ProductDependencyContainer extends SprykerProductDependencyContainer
{

    /**
     * @return ProductFacade
     */
    public function getInstallerFacade()
    {
        return $this->getLocator()->product()->facade();
    }

}
