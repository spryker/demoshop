<?php

namespace Pyz\Zed\Stock\Business;

use Pyz\Zed\Stock\Business\Internal\DemoData\StockInstall;
use Spryker\Zed\Messenger\Business\Model\MessengerInterface;
use Spryker\Zed\Stock\Business\Model\Calculator;
use Spryker\Zed\Stock\Business\Model\Reader;
use Spryker\Zed\Stock\Business\Model\Writer;
use Spryker\Zed\Stock\Business\StockBusinessFactory as SprykerStockBusinessFactory;

/**
 * @method \Spryker\Zed\Stock\Persistence\StockQueryContainer getQueryContainer()
 */
class StockBusinessFactory extends SprykerStockBusinessFactory
{

    /**
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger
     *
     * @return \Pyz\Zed\Stock\Business\Internal\DemoData\StockInstall
     */
    public function createDemoDataInstaller(MessengerInterface $messenger)
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
     * @return \Spryker\Zed\Stock\Business\Model\CalculatorInterface
     */
    public function createCalculatorModel()
    {
        return new Calculator(
            $this->createReaderModel()
        );
    }

    /**
     * @return \Spryker\Zed\Stock\Business\Model\ReaderInterface
     */
    public function createReaderModel()
    {
        return new Reader(
            $this->getQueryContainer(),
            $this->getProductFacade()
        );
    }

    /**
     * @return \Spryker\Zed\Stock\Business\Model\WriterInterface
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
