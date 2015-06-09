<?php

namespace Pyz\Zed\ProductOption\Communication;

use SprykerFeature\Zed\ProductOption\Communication\ProductOptionDependencyContainer as SprykerProductOptionDependencyContainer;
use Pyz\Zed\ProductOption\Business\ProductOptionFacade;

class ProductOptionDependencyContainer extends SprykerProductOptionDependencyContainer
{

    /**
     * @return ProductOptionFacade
     */
    public function getInstallerFacade()
    {
        return $this->getLocator()->productOptions()->facade();
    }

}
