<?php

namespace Pyz\Zed\Stock\Business;

use Generated\Zed\Ide\FactoryAutoCompletion\StockBusiness;
use ProjectA\Zed\Kernel\Business\AbstractDependencyContainer;
use ProjectA\Zed\Stock\Business\StockDependencyContainer as SprykerStockDependencyContainer;
use Psr\Log\LoggerInterface;
use Pyz\Zed\Stock\Business\Internal\DemoData\StockInstall;

/**
 * @method StockBusiness getFactory()
 */
class StockDependencyContainer extends SprykerStockDependencyContainer
{

    /**
     * @param LoggerInterface $messenger
     *
     * @return StockInstall
     */
    public function getDemoDataInstaller(LoggerInterface $messenger)
    {
        $installer = $this->getFactory()->createInternalDemoDataStockInstall(
            $this->getLocator()
        );
        $installer->setMessenger($messenger);

        return $installer;
    }

}
