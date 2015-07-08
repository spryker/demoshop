<?php

namespace Pyz\Zed\Price\Business\Internal\DemoData;

use SprykerFeature\Zed\Installer\Business\Model\AbstractInstaller;
use SprykerFeature\Zed\Library\Import\Reader\CsvFileReader;
use SprykerFeature\Zed\Price\Business\Model\ReaderInterface;
use SprykerFeature\Zed\Price\Business\Model\WriterInterface;
use Generated\Shared\Transfer\PriceProductTransfer;

class PriceInstall extends AbstractInstaller
{

    const SKU = 'sku';
    const PRICE = 'price';
    const PRICE_TYPE = 'price_type';
    const IS_ACTIVE = 'is_active';

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

        $demoPrices = $this->getDemoPrices();
        $this->writePrices($demoPrices);
    }

    /**
     * @param array $demoPrices
     */
    protected function writePrices(array $demoPrices)
    {
        foreach ($demoPrices as $row) {
            $this->addEntry($row);
        }
    }

    /**
     * @return array
     */
    protected function getDemoPrices()
    {
        $reader = new CsvFileReader();

        return $reader->read(__DIR__ . '/demo-price.csv')->getData();
    }

    /**
     * @param array $row
     */
    protected function addEntry(array $row)
    {
        $stockType = $this->priceWriter->createPriceType($row[self::PRICE_TYPE]);

        $transferPriceProduct = new PriceProductTransfer();

        $transferPriceProduct->setPrice($row[self::PRICE])
            ->setPriceTypeName($stockType->getName())
            ->setSkuProduct($row[self::SKU])
        ;

        $sku = $transferPriceProduct->getSkuProduct();
        $priceType = $transferPriceProduct->getPriceTypeName();
        if ($this->priceReader->hasValidPrice($sku, $priceType)) {
            $idPriceProduct = $this->priceReader->getProductPriceIdBySku($sku, $priceType);
            $transferPriceProduct->setIdPriceProduct($idPriceProduct);
            $this->priceWriter->setPriceForProduct($transferPriceProduct);
        } else {
            $this->priceWriter->createPriceForProduct($transferPriceProduct);
        }
    }

}
