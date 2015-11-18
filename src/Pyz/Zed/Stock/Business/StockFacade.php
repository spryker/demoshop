<?php

namespace Pyz\Zed\Stock\Business;

use Orm\Zed\Stock\Persistence\SpyStockProduct;
use Pyz\Zed\Stock\Dependency\Facade\StockToProductInterface;
use SprykerFeature\Zed\Stock\Business\StockFacade as SprykerStockFacade;
use Psr\Log\LoggerInterface;

/**
 * @method StockDependencyContainer getDependencyContainer()
 */
class StockFacade extends SprykerStockFacade implements StockToProductInterface
{

    /**
     * @param LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger)
    {
        $this->getDependencyContainer()->getDemoDataInstaller($messenger)->install();
    }

    /**
     * @return array
     */
    public function getStockTypes() {
        return $this->getDependencyContainer()->getReaderModel()->getStockTypes();
    }

    /**
     * @param $sku
     * @return SpyStockProduct[]
     */
    public function getStocksProduct($sku) {
        return $this->getDependencyContainer()->getReaderModel()->getStocksProduct($sku);
    }

}
