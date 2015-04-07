<?php

namespace Pyz\Zed\Price\Business\Internal\DemoData;

use ProjectA\Zed\Installer\Business\Model\AbstractInstaller;
use ProjectA\Zed\Kernel\Locator;
use ProjectA\Zed\Library\Import\Reader\CsvFileReader;
use ProjectA\Zed\Price\Business\PriceFacade;
use ProjectA\Shared\Price\Transfer\Product;

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

        $transferPriceProduct = $this->locator->price()->transferProduct();

        /** @var Product $transferPriceProduct */
        $transferPriceProduct->setPrice($row[self::PRICE])
            ->setPriceTypeName($stockType->getName())
            ->setSkuProduct($row[self::SKU])
            ->setIsActive($row[self::IS_ACTiVE]);

        if ($this->priceFacade->hasValidPrice($transferPriceProduct->getSkuProduct(), $transferPriceProduct->getPriceTypeName())) {
            $idPriceProduct = $this->priceFacade->getIdPriceProduct($transferPriceProduct->getSkuProduct(), $transferPriceProduct->getPriceTypeName());
            $transferPriceProduct->setIdPriceProduct($idPriceProduct);
            $this->priceFacade->setPriceForProduct($transferPriceProduct);
        } else {
            $this->priceFacade->createPriceForProduct($transferPriceProduct);
        }
    }

}
