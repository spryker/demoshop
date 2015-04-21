<?php

namespace Pyz\Zed\Stock\Business;

use SprykerEngine\Zed\Kernel\Business\AbstractFacade;
use SprykerFeature\Zed\Stock\Business\StockFacade as SprykerStockFacade;
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
