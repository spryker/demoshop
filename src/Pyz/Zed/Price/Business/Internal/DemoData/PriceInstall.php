<?php

namespace Pyz\Zed\Price\Business\Internal\DemoData;

use SprykerFeature\Zed\Installer\Business\Model\AbstractInstaller;
use SprykerEngine\Zed\Kernel\Locator;
use SprykerFeature\Zed\Library\Import\Reader\CsvFileReader;
use SprykerFeature\Zed\Price\Business\PriceFacade;
use Generated\Shared\Transfer\PriceProductTransfer;

class PriceInstall extends AbstractInstaller
{

    const SKU = 'sku';
    const PRICE = 'price';
    const PRICE_TYPE = 'price_type';
    const IS_ACTIVE = 'is_active';

    /**
     * @var PriceFacade
     */
    protected $priceFacade;

    protected $locator;

    /**
     * @param PriceFacade $priceFacade
     */
    public function __construct(PriceFacade $priceFacade)
    {
        $this->locator = Locator::getInstance();
        $this->priceFacade = $priceFacade;
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
        $stockType = $this->priceFacade->createPriceType($row[self::PRICE_TYPE]);

        $transferPriceProduct = new PriceProductTransfer();

        $transferPriceProduct->setPrice($row[self::PRICE])
            ->setPriceTypeName($stockType->getName())
            ->setSkuProduct($row[self::SKU])
        ;

        $sku = $transferPriceProduct->getSkuProduct();
        $priceType = $transferPriceProduct->getPriceTypeName();
        if ($this->priceFacade->hasValidPrice($sku, $priceType)) {
            $idPriceProduct = $this->priceFacade->getIdPriceProduct($sku, $priceType);
            $transferPriceProduct->setIdPriceProduct($idPriceProduct);
            $this->priceFacade->setPriceForProduct($transferPriceProduct);
        } else {
            $this->priceFacade->createPriceForProduct($transferPriceProduct);
        }
    }

}
