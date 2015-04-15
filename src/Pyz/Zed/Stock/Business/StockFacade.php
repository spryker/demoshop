<?php

namespace Pyz\Zed\Stock\Business;

use ProjectA\Zed\Kernel\Business\AbstractFacade;
use ProjectA\Zed\Stock\Business\StockFacade as SprykerStockFacade;
use Psr\Log\LoggerInterface;

/**
 * @method StockDependencyContainer getDependencyContainer()
 */
class StockFacade extends SprykerStockFacade
{

    /**
     * @param LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger)
    {
        $this->getDependencyContainer()->getDemoDataInstaller($messenger)->install();
    }
}
