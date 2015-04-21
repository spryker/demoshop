<?php

namespace Pyz\Zed\ProductSearch\Communication;

use SprykerEngine\Zed\Kernel\Communication\AbstractDependencyContainer;
use SprykerFeature\Zed\ProductSearch\Communication\ProductSearchDependencyContainer
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
