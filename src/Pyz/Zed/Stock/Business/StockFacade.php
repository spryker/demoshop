<?php

namespace Pyz\Zed\Stock\Business;

use Spryker\Zed\Stock\Business\StockFacade as SprykerStockFacade;
use Psr\Log\LoggerInterface;

/**
 * @method \Pyz\Zed\Stock\Business\StockBusinessFactory getFactory()
 */
class StockFacade extends SprykerStockFacade implements StockFacadeInterface
{

    /**
     * @param \Psr\Log\LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger)
    {
        $this->getFactory()->createDemoDataInstaller($messenger)->install();
    }

}
