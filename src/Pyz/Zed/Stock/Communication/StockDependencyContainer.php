<?php

namespace Pyz\Zed\Stock\Communication;

use ProjectA\Zed\Kernel\Communication\AbstractDependencyContainer;
use Pyz\Zed\Stock\Business\StockFacade;
use ProjectA\Zed\Stock\Communication\StockDependencyContainer as SprykerStockDependencyContainer;

class StockDependencyContainer extends SprykerStockDependencyContainer
{

    /**
     * @return StockFacade
     */
    public function getInstallerFacade()
    {
        return $this->locator->stock()->facade();
    }

}
