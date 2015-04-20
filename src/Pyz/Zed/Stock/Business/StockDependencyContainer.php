<?php

namespace Pyz\Zed\Stock\Business;

use Generated\Zed\Ide\FactoryAutoCompletion\StockBusiness;
use ProjectA\Zed\Stock\Business\StockDependencyContainer as SprykerStockDependencyContainer;
use ProjectA\Zed\Stock\Persistence\StockQueryContainer;
use Psr\Log\LoggerInterface;
use Pyz\Zed\Stock\Business\Internal\DemoData\StockInstall;

class StockDependencyContainer extends SprykerStockDependencyContainer
{

    /**
     * @var StockBusiness
     */
    protected $factory;

    /**
     * @param LoggerInterface $messenger
     *
     * @return StockInstall
     */
    public function getDemoDataInstaller(LoggerInterface $messenger)
    {
        $installer = $this->factory->createInternalDemoDataStockInstall(
            $this->locator,
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
        return $this->locator->stock()->queryContainer();
    }

    /**
     * @return StockFacade
     */
    protected function getStockFacade()
    {
        return $this->locator->stock()->facade();
    }
}
