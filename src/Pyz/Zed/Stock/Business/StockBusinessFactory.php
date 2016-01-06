<?php

namespace Pyz\Zed\Stock\Business;

use Spryker\Zed\Stock\Business\Model\CalculatorInterface;
use Spryker\Zed\Stock\Business\Model\ReaderInterface;
use Spryker\Zed\Stock\Business\Model\Writer;
use Spryker\Zed\Stock\Business\Model\Reader;
use Spryker\Zed\Stock\Business\Model\Calculator;
use Spryker\Zed\Stock\Business\Model\WriterInterface;
use Spryker\Zed\Stock\Business\StockBusinessFactory as SprykerStockBusinessFactory;
use Spryker\Zed\Stock\Persistence\StockQueryContainer;
use Psr\Log\LoggerInterface;
use Pyz\Zed\Stock\Business\Internal\DemoData\StockInstall;

/**
 * @method StockQueryContainer getQueryContainer()
 */
class StockBusinessFactory extends SprykerStockBusinessFactory
{

    /**
     * @param LoggerInterface $messenger
     *
     * @return StockInstall
     */
    public function createDemoDataInstaller(LoggerInterface $messenger)
    {
        $installer = new StockInstall(
            $this->createReaderModel(),
            $this->createWriterModel(),
            $this->getQueryContainer()
        );
        $installer->setMessenger($messenger);

        return $installer;
    }

    /**
     * @return CalculatorInterface
     */
    public function createCalculatorModel()
    {
        return new Calculator(
            $this->createReaderModel()
        );
    }

    /**
     * @return ReaderInterface
     */
    public function createReaderModel()
    {
        return new Reader(
            $this->getQueryContainer(),
            $this->getProductFacade()
        );
    }

    /**
     * @return WriterInterface
     */
    public function createWriterModel()
    {
        return new Writer(
            $this->getQueryContainer(),
            $this->createReaderModel(),
            $this->getTouchFacade()
        );
    }

}
