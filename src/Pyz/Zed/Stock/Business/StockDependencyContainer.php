<?php

namespace Pyz\Zed\Stock\Business;

use Spryker\Zed\Stock\Business\Model\Writer;
use Spryker\Zed\Stock\Business\Model\Reader;
use Spryker\Zed\Stock\Business\Model\Calculator;
use Spryker\Zed\Stock\Business\StockDependencyContainer as SprykerStockDependencyContainer;
use Spryker\Zed\Stock\Persistence\StockQueryContainer;
use Psr\Log\LoggerInterface;
use Pyz\Zed\Stock\Business\Internal\DemoData\StockInstall;

/**
 * @method StockQueryContainer getQueryContainer()
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
        $installer = new StockInstall(
            $this->getReaderModel(),
            $this->getWriterModel(),
            $this->getQueryContainer()
        );
        $installer->setMessenger($messenger);

        return $installer;
    }

    /**
     * @return CalculatorInterface
     */
    public function getCalculatorModel()
    {
        return new Calculator(
                    $this->getReaderModel()
                );
    }

    /**
     * @return ReaderInterface
     */
    public function getReaderModel()
    {
        return new Reader(
                    $this->getQueryContainer(),
                    $this->getProductFacade()
                );
    }

    /**
     * @return WriterInterface
     */
    public function getWriterModel()
    {
        return new Writer(
                    $this->getQueryContainer(),
                    $this->getReaderModel(),
                    $this->getTouchFacade(),
                    $this->getLocator()
                );
    }

}
