<?php

namespace Pyz\Zed\Stock\Business;

use Generated\Zed\Ide\FactoryAutoCompletion\StockBusiness;
use ProjectA\Zed\Kernel\Business\AbstractDependencyContainer;
use ProjectA\Zed\Stock\Business\StockDependencyContainer as SprykerStockDependencyContainer;
use Psr\Log\LoggerInterface;
use Pyz\Zed\Stock\Business\Internal\DemoData\StockInstall;

class StockDependencyContainer extends SprykerStockDependencyContainer
{

    /**
     * @var StockBusiness
     */
    protected $factory;

    /**
     * @param LoggerInterface $logger
     *
     * @return StockInstall
     */
    public function getDemoDataInstaller(LoggerInterface $logger = null)
    {
        $installer = $this->factory->createInternalDemoDataStockInstall(
            $this->locator
        );
        $installer->setLogger($logger);

        return $installer;
    }

}
