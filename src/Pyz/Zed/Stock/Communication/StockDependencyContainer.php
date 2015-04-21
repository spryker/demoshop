<?php

namespace Pyz\Zed\Stock\Communication;

use SprykerEngine\Zed\Kernel\Communication\AbstractDependencyContainer;
use Pyz\Zed\Stock\Business\StockFacade;
use SprykerFeature\Zed\Stock\Communication\StockDependencyContainer as SprykerStockDependencyContainer;

class StockDependencyContainer extends SprykerStockDependencyContainer
{

    /**
     * @return StockFacade
     */
    public function getInstallerFacade()
    {
        return $this->getLocator()->stock()->facade();
    }

}
