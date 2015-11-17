<?php

namespace Pyz\Zed\Price\Business\Internal\DemoData;

use SprykerFeature\Zed\Installer\Business\Model\AbstractInstaller;
use SprykerFeature\Zed\Library\Import\Reader\CsvFileReader;
use SprykerFeature\Zed\Price\Business\Model\ReaderInterface;
use SprykerFeature\Zed\Price\Business\Model\WriterInterface;
use Generated\Shared\Transfer\PriceProductTransfer;
use SprykerFeature\Zed\Price\PriceConfig;

class PriceInstall extends AbstractInstaller
{

    /**
     * @var WriterInterface
     */
    protected $priceWriter;

    /**
     * @var ReaderInterface
     */
    protected $priceReader;

    /**
     * @param WriterInterface $priceWriter
     * @param ReaderInterface $priceReader
     */
    public function __construct(WriterInterface $priceWriter, ReaderInterface $priceReader)
    {
        $this->priceWriter = $priceWriter;
        $this->priceReader = $priceReader;
    }

    public function install()
    {
        $this->info(
            'This will install a dummy set of prices in the demo shop (you have to install the products before!)'
        );

        $this->priceWriter->createPriceType(PriceConfig::DEFAULT_PRICE_TYPE);
    }
}
