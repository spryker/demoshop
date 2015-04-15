<?php

namespace Pyz\Zed\ProductSearch\Communication;

use ProjectA\Zed\Kernel\Communication\AbstractDependencyContainer;
use ProjectA\Zed\ProductSearch\Communication\ProductSearchDependencyContainer
    as SprykerProductSearchDependencyContainer;

use Pyz\Zed\ProductSearch\Business\ProductSearchFacade;

class ProductSearchDependencyContainer extends SprykerProductSearchDependencyContainer
{

    /**
     * @return ProductSearchFacade
     */
    public function getInstallerFacade()
    {
        return $this->getLocator()->productSearch()->facade();
    }

}
