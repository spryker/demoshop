<?php

namespace Pyz\Zed\Stock\Business\Internal\DemoData;

use ProjectA\Zed\Console\Business\Model\Console;
use ProjectA\Zed\Kernel\Locator;
use ProjectA\Zed\Library\Business\DemoDataInstallInterface;
use ProjectA\Zed\Library\Import\Reader\CsvFileReader;
use ProjectA\Zed\Stock\Persistence\StockQueryContainer;
use ProjectA\Zed\Stock\Business\StockFacade;

class StockInstall implements DemoDataInstallInterface
{
    const SKU = 'sku';
    const QUANTITY = 'quantity';
    const NEVER_OUT_OF_STOCK = 'is_never_out_of_stock';
    const STOCK_TYPE = 'stock_type';

    /** @var StockQueryContainer */
    protected $queryContainer;

    /** @var StockFacade */
    protected $stockFacade;

    public function __construct()
    {
        $locator = new Locator();
        $this->queryContainer = $locator->stock()->queryContainer();
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
        $stockType = $this->stockFacade->createStock($row[self::STOCK_TYPE]);
        $this->touchStockType($stockType->getIdStock());

        $stock = $this->stockFacade->setStockProduct($row[self::SKU], $row[self::QUANTITY],$stockType->getName(), $row[self::NEVER_OUT_OF_STOCK]);
        $this->touchStockProduct($stock->getIdStockProduct());
    }

    /**
     * @param int $stockId
     * @throws \Exception
     * @throws \PropelException
     */
    protected function touchStockProduct($stockId)
    {
        $stockTouched = \ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchQuery::create()
            ->filterByItemId($stockId)
            ->filterByItemEvent(\ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::ITEM_EVENT_ACTIVE)
            ->filterByItemType('stock-product')
            ->filterByExportType(\ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::EXPORT_TYPE_KEYVALUE)
            ->findOne();

        if (!$stockTouched) {
            $stockTouched = new \ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouch();
        }

        $stockTouched
            ->setExportType(\ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::EXPORT_TYPE_KEYVALUE)
            ->setItemType('stock-product')
            ->setItemEvent(\ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::ITEM_EVENT_ACTIVE)
            ->setItemId($stockId)
            ->setTouched(new \DateTime())
            ->save();

    }

    /**
     * @param int $stockTypeId
     * @throws \Exception
     * @throws \PropelException
     */
    protected function touchStockType($stockTypeId)
    {
        $stockTouched = \ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchQuery::create()
            ->filterByItemId($stockTypeId)
            ->filterByItemEvent(\ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::ITEM_EVENT_ACTIVE)
            ->filterByItemType('stock-type')
            ->filterByExportType(\ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::EXPORT_TYPE_KEYVALUE)
            ->findOne();

        if (!$stockTouched) {
            $stockTouched = new \ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouch();
        }

        $stockTouched
            ->setExportType(\ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::EXPORT_TYPE_KEYVALUE)
            ->setItemType('stock-type')
            ->setItemEvent(\ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::ITEM_EVENT_ACTIVE)
            ->setItemId($stockTypeId)
            ->setTouched(new \DateTime())
            ->save();
    }

}
