<?php

namespace Pyz\Zed\Stock\Business\Internal\DemoData;


use Generated\Zed\Ide\AutoCompletion;
use ProjectA\Zed\Console\Business\Model\Console;
use ProjectA\Zed\Kernel\Locator;
use ProjectA\Zed\Library\Business\DemoDataInstallInterface;
use ProjectA\Zed\Library\Import\Reader\CsvFileReader;
use ProjectA\Zed\Stock\Business\StockFacade;
use ProjectA\Shared\Stock\Transfer\StockProduct;

/**
 * Class StockInstall
 * @package Pyz\Zed\Stock\Business\Internal\DemoData
 */
class StockInstall implements DemoDataInstallInterface
{
    const SKU = 'sku';
    const QUANTITY = 'quantity';
    const NEVER_OUT_OF_STOCK = 'is_never_out_of_stock';
    const STOCK_TYPE = 'stock_type';

    /** @var AutoCompletion $locator */
    protected $locator;

    /** @var StockFacade */
    protected $stockFacade;

    public function __construct()
    {

        $this->locator = Locator::getInstance();
        $this->stockFacade = $this->locator->stock()->facade();
    }

    /**
     * @param Console $console
     */
    public function install(Console $console)
    {
        $console->info("This will install a dummy set of stocks in the demo shop ");
        if ($console->askConfirmation('Do you really want this?')) {
            $demoStockProducts = $this->getDemoStockProducts();
            $this->writeStockProduct($demoStockProducts);
        }
    }

    /**
     * @param array $demoStock
     */
    protected function writeStockProduct(array $demoStock)
    {
        foreach ($demoStock as $row) {
            $this->addEntry($row);
        }
    }

    /**
     * @return array
     */
    protected function getDemoStockProducts()
    {
        $reader = new CsvFileReader();
        return $reader->read(__DIR__ . '/demo-stock.csv')->getData();
    }

    /**
     * @param array $row
     */
    protected function addEntry(array $row)
    {
        $stockType = $this->stockFacade->createStockType($row[self::STOCK_TYPE]);
        $transferStockProduct = $this->locator->stock()->transferStockProduct();
        /** @var $transferStockProduct StockProduct */
        $transferStockProduct->setSku($row[self::SKU])
            ->setIsNeverOutOfStock($row[self::NEVER_OUT_OF_STOCK])
            ->setQuantity($row[self::QUANTITY])
            ->setStockType($stockType->getName());
        if ($this->stockFacade->hasStockProduct($transferStockProduct->getSku(), $transferStockProduct->getStockType())) {
            $idStockProduct = $this->stockFacade->getIdStockProduct($transferStockProduct->getSku(), $transferStockProduct->getStockType());
            $transferStockProduct->setIdStockProduct($idStockProduct);
            $this->stockFacade->setStockProduct($transferStockProduct);
        } else {
            $this->stockFacade->createStockProduct($transferStockProduct);
        }
    }
}
