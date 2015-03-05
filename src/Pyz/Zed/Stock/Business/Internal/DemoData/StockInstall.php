<?php

namespace Pyz\Zed\Stock\Business\Internal\DemoData;

use ProjectA\Zed\Console\Business\Model\Console;
use ProjectA\Zed\Kernel\Locator;
use ProjectA\Zed\Library\Business\DemoDataInstallInterface;
use ProjectA\Zed\Library\Import\Reader\CsvFileReader;
use ProjectA\Zed\Stock\Business\StockFacade;

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

    /** @var StockFacade */
    protected $stockFacade;

    public function __construct()
    {
        $locator = Locator::getInstance();
        $this->stockFacade = $locator->stock()->facade();
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
        // TODO fix me
        return;
        $stockTouched = \ProjectA\Zed\YvesExport\Persistence\Propel\PacYvesExportTouchQuery::create()
            ->filterByItemId($stockId)
            ->filterByItemEvent(\ProjectA\Zed\YvesExport\Persistence\Propel\Map\PacYvesExportTouchTableMap::COL_ITEM_EVENT_ACTIVE)
            ->filterByItemType('stock-product')
            ->filterByExportType(\ProjectA\Zed\YvesExport\Persistence\Propel\Map\PacYvesExportTouchTableMap::COL_EXPORT_TYPE_KEYVALUE)
            ->findOne();

        if (!$stockTouched) {
            $stockTouched = new \ProjectA\Zed\YvesExport\Persistence\Propel\PacYvesExportTouch();
        }

        $stockTouched
            ->setExportType(\ProjectA\Zed\YvesExport\Persistence\Propel\Map\PacYvesExportTouchTableMap::COL_EXPORT_TYPE_KEYVALUE)
            ->setItemType('stock-product')
            ->setItemEvent(\ProjectA\Zed\YvesExport\Persistence\Propel\Map\PacYvesExportTouchTableMap::COL_ITEM_EVENT_ACTIVE)
            ->setItemId($stockId)
            ->setTouched(new \DateTime())
            ->save();

        $stockType = $this->stockFacade->createStock($row[self::STOCK_TYPE]);

        $this->stockFacade->setStockProduct($row[self::SKU], $row[self::QUANTITY],$stockType->getName(), $row[self::NEVER_OUT_OF_STOCK]);
    }

}
