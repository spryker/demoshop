<?php

namespace Pyz\Zed\Price\Business;

use Spryker\Shared\Kernel\Messenger\MessengerInterface;
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
    public function getDemoDataInstaller(LoggerInterface $messenger)
    {
        $installer = new PriceInstall(
            $this->getWriterModel(),
            $this->getReaderModel()
        );
        $installer->setMessenger($messenger);

        return $installer;
    }

    /**
     * @return ReaderInterface
     */
    public function getReaderModel()
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
    public function getWriterModel()
    {
        return new Writer(
            $this->getQueryContainer(),
            $this->getReaderModel(),
            $this->getTouchFacade(),
            $this->getConfig()
        );
    }

    /**
     * @return BulkWriterInterface
     */
    public function getBulkWriterModel()
    {
        return new BulkWriter(
            $this->getQueryContainer(),
            $this->getReaderModel(),
            $this->getTouchFacade(),
            $this->getConfig()
        );
    }

    /**
     * @param MessengerInterface $messenger
     *
     * @return Install
     */
    public function getInstaller(MessengerInterface $messenger)
    {
        $installer = new Install(
            $this->getWriterModel(),
            $this->getConfig()
        );
        $installer->setMessenger($messenger);

        return $installer;
    }

}
