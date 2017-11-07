<?php

namespace Pyz\Zed\Price\Business;

use Pyz\Zed\Price\Business\Model\Reader;
use Spryker\Zed\Price\Business\Model\Writer;
use Spryker\Zed\Price\Business\PriceBusinessFactory as SprykerPriceBusinessFactory;

/**
 * @method \Spryker\Zed\Price\PriceConfig getConfig()
 * @method \Spryker\Zed\Price\Persistence\PriceQueryContainer getQueryContainer()
 */
class PriceBusinessFactory extends SprykerPriceBusinessFactory
{
    /**
     * @return \Spryker\Zed\Price\Business\Model\ReaderInterface
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
     * @return \Spryker\Zed\Price\Business\Model\WriterInterface
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

}
