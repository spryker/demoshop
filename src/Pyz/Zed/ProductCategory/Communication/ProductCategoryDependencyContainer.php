<?php

namespace Pyz\Zed\ProductCategory\Communication;

use Pyz\Zed\ProductCategory\Business\ProductCategoryFacade;
use ProjectA\Zed\ProductCategory\Communication\ProductCategoryDependencyContainer as
    SprykerProductCategoryDependencyContainer;

class ProductCategoryDependencyContainer extends SprykerProductCategoryDependencyContainer
{

    /**
     * @return ProductCategoryFacade
     */
    public function getInstallerFacade()
    {
        return $this->locator->productCategory()->facade();
    }

}
