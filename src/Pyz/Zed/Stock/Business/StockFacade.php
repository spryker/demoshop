<?php

namespace Pyz\Zed\Stock\Business;

use Spryker\Zed\Stock\Business\StockFacade as SprykerStockFacade;
use Psr\Log\LoggerInterface;

/**
 * @method StockBusinessFactory getFactory()
 */
class StockFacade extends SprykerStockFacade
{

    /**
     * @param LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger)
    {
        $this->getFactory()->getDemoDataInstaller($messenger)->install();
    }

}
