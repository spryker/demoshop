<?php

namespace Pyz\Zed\ProductCategory\Communication;

use ProjectA\Zed\Kernel\Communication\AbstractDependencyContainer;
use Pyz\Zed\ProductCategory\Business\ProductCategoryFacade;

class ProductCategoryDependencyContainer extends AbstractDependencyContainer
{

    /**
     * @return ProductCategoryFacade
     */
    public function getInstallerFacade()
    {
        return $this->locator->productCategory()->facade();
    }

}
