<?php

namespace Pyz\Zed\Price\Business;

use Spryker\Zed\Messenger\Business\Model\MessengerInterface;
use Spryker\Zed\Price\Business\Internal\Install;
use Spryker\Zed\Price\Business\Model\BulkWriter;
use Spryker\Zed\Price\Business\Model\BulkWriterInterface;
use Spryker\Zed\Price\Business\Model\ReaderInterface;
use Spryker\Zed\Price\Business\Model\Writer;
use Spryker\Zed\Price\Business\Model\Reader;
use Spryker\Zed\Price\Business\Model\WriterInterface;
use Spryker\Zed\Price\Business\PriceBusinessFactory as SprykerPriceBusinessFactory;
use Psr\Log\LoggerInterface;
use Pyz\Zed\Price\Business\Internal\DemoData\PriceInstall;

class PriceBusinessFactory extends SprykerPriceBusinessFactory
{

    /**
     * @param LoggerInterface $messenger
     *
     * @return PriceInstall
     */
    public function createDemoDataInstaller(LoggerInterface $messenger)
    {
        $installer = new PriceInstall(
            $this->createWriterModel(),
            $this->createReaderModel()
        );
        $installer->setMessenger($messenger);

        return $installer;
    }

    /**
     * @return ReaderInterface
     */
    public function createReaderModel()
    {
        return new Reader(
            $this->getQueryContainer(),
            $this->getProductFacade(),
            $this->getConfig()
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
            $this->getTouchFacade(),
            $this->getConfig()
        );
    }

    /**
     * @return BulkWriterInterface
     */
    public function createBulkWriterModel()
    {
        return new BulkWriter(
            $this->getQueryContainer(),
            $this->createReaderModel(),
            $this->getTouchFacade(),
            $this->getConfig()
        );
    }

    /**
     * @param MessengerInterface $messenger
     *
     * @return Install
     */
    public function createInstaller(MessengerInterface $messenger)
    {
        $installer = new Install(
            $this->createWriterModel(),
            $this->getConfig()
        );
        $installer->setMessenger($messenger);

        return $installer;
    }

}
