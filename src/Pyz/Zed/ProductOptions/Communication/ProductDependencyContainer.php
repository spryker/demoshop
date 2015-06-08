<?php

namespace Pyz\Zed\ProductOptions\Communication;

use SprykerFeature\Zed\ProductOptions\Communication\ProductOptionsDependencyContainer as SprykerProductOptionsDependencyContainer;
use Pyz\Zed\ProductOptions\Business\ProductOptionsFacade;

class ProductOptionsDependencyContainer extends SprykerProductOptionsDependencyContainer
{

    /**
     * @return ProductOptionsFacade
     */
    public function getInstallerFacade()
    {
        return $this->getLocator()->productOptions()->facade();
    }

}
