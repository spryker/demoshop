<?php

namespace Pyz\Zed\ProductCategory\Communication;

use Pyz\Zed\ProductCategory\Business\ProductCategoryFacade;
use SprykerFeature\Zed\ProductCategory\Communication\ProductCategoryDependencyContainer as
    SprykerProductCategoryDependencyContainer;

class ProductCategoryDependencyContainer extends SprykerProductCategoryDependencyContainer
{

    /**
     * @return ProductCategoryFacade
     */
    public function getInstallerFacade()
    {
        return $this->getLocator()->productCategory()->facade();
    }

}
