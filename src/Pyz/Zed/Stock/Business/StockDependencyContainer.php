<?php

namespace Pyz\Zed\Stock\Business;

use Generated\Zed\Ide\FactoryAutoCompletion\StockBusiness;
use SprykerFeature\Zed\Stock\Business\StockDependencyContainer as SprykerStockDependencyContainer;
use SprykerFeature\Zed\Stock\Persistence\StockQueryContainer;
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
            $this->getLocator(),
            $this->getQueryContainer(),
            $this->getStockFacade()
        );
        $installer->setMessenger($messenger);

        return $installer;
    }

    /**
     * @return StockQueryContainer
     */
    protected function getQueryContainer()
    {
        return $this->getLocator()->stock()->queryContainer();
    }

    /**
     * @return StockFacade
     */
    protected function getStockFacade()
    {
        return $this->getLocator()->stock()->facade();
    }
}
