<?php

namespace Pyz\Zed\Price\Business;

use SprykerFeature\Zed\Price\Business\Internal\Install;
use SprykerFeature\Zed\Price\Business\Model\BulkWriter;
use SprykerFeature\Zed\Price\Business\Model\Writer;
use SprykerFeature\Zed\Price\Business\Model\Reader;
use Generated\Zed\Ide\FactoryAutoCompletion\PriceBusiness;
use SprykerFeature\Zed\Price\Business\PriceDependencyContainer as SprykerPriceDependencyContainer;
use Psr\Log\LoggerInterface;
use Pyz\Zed\Price\Business\Internal\DemoData\PriceInstall;

/**
 * @method PriceBusiness getFactory()
 */
class PriceDependencyContainer extends SprykerPriceDependencyContainer
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
                    $this->getLocator(),
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
                    $this->getLocator(),
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
    public function getInstaller(\SprykerEngine\Shared\Kernel\Messenger\MessengerInterface $messenger)
    {
        $installer = new Install(
                    $this->getLocator()->price()->facade(),
                    $this->getConfig()
                );
        $installer->setMessenger($messenger);

        return $installer;
    }

}
