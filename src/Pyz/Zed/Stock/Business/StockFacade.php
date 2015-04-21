<?php

namespace Pyz\Zed\Stock\Business;

use SprykerEngine\Zed\Kernel\Business\AbstractFacade;
use SprykerFeature\Zed\Stock\Business\StockFacade as SprykerStockFacade;
use Psr\Log\LoggerInterface;

class StockFacade extends SprykerStockFacade
{

    /**
     * @var StockDependencyContainer
     */
    protected $dependencyContainer;

    /**
     * @param LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger)
    {
        $this->dependencyContainer->getDemoDataInstaller($messenger)->install();
    }
}
