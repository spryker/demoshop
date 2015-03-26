<?php

namespace Pyz\Zed\Stock\Business;

use ProjectA\Zed\Kernel\Business\AbstractFacade;
use ProjectA\Zed\Stock\Business\StockFacade as SprykerStockFacade;
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
    public function installDemoData(LoggerInterface $messenger = null)
    {
        $this->dependencyContainer->getDemoDataInstaller($messenger)->install();
    }
}
