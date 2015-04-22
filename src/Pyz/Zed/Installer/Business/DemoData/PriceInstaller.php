<?php

namespace Pyz\Zed\Installer\Business\DemoData;

use ProjectA\Zed\Installer\Business\Model\AbstractInstaller;
use ProjectA\Zed\Kernel\Locator;
use ProjectA\Zed\Library\Import\Reader\CsvFileReader;
use ProjectA\Zed\Price\Business\PriceFacade;
use ProjectA\Shared\Price\Transfer\Product;

class PriceInstaller extends AbstractInstaller
{

    /**
     * @var PriceFacade
     */
    protected $priceFacade;

    protected $locator;

    /**
     * @var array
     */
    protected $rawProductData;

    /**
     * @param PriceFacade $priceFacade
     * @param array $rawProductData
     */
    public function __construct(
        PriceFacade $priceFacade,
        $rawProductData
    )
    {
        $this->locator = Locator::getInstance();
        $this->priceFacade = $priceFacade;
        $this->rawProductData = $rawProductData;
    }

    public function install()
    {
        $this->info(
            'This will install a dummy set of prices in the demo shop (you have to install the products before!)'
        );

        $this->writePrices($this->rawProductData);
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
     * @param array $row
     */
    protected function addEntry(array $row)
    {
        $stockType = $this->priceFacade->createPriceType('DEFAULT');

        $transferPriceProduct = $this->locator->price()->transferProduct();

        /** @var Product $transferPriceProduct */
        $transferPriceProduct->setPrice((integer) $row['price'] * 100)
            ->setPriceTypeName($stockType->getName())
            ->setSkuProduct($row['sku'])
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
