<?php

namespace Pyz\Zed\Stock\Business\Internal\DemoData;

use ProjectA\Zed\Console\Business\Model\Console;
use ProjectA\Zed\Kernel\Locator;
use ProjectA\Zed\Library\Business\DemoDataInstallInterface;
use ProjectA\Zed\Library\Import\Reader\CsvFileReader;
use ProjectA\Zed\Stock\Persistence\StockQueryContainer;
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
    const TYPE = 'type';

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
            $demoStock = $this->getDemoStock();

            $this->write($demoStock);
        }
    }

    /**
     * @return array
     */
    protected function getDemoStock()
    {
        $reader = new CsvFileReader();

        return $reader->read(__DIR__ . '/demo-stock.csv')->getData();
    }

    /**
     * @param array $demoStock
     */
    protected function write(array $demoStock)
    {
        foreach ($demoStock as $row) {
            $this->addEntry($row);
        }
    }

    /**
     * @param array $row
     */
    protected function addEntry(array $row)
    {
        $stockType = \ProjectA_Zed_Stock_Persistence_Propel_PacStockQuery::create()
            ->filterByName($row[self::TYPE])
            ->findOneOrCreate();

        if ($stockType->isNew()) {
            $stockType->save();
        }

        $stock = $this->stockFacade->setStockProduct(
            $row[self::SKU],
            $row[self::QUANTITY],
            $row[self::TYPE],
            $row[self::NEVER_OUT_OF_STOCK]
        );
        $this->touchStock($stock->getIdStockProduct());
    }

    /**
     * @param int $stockId
     */
    protected function touchStock($stockId)
    {
        $stockTouched = \SprykerCore_Zed_Touch_Persistence_Propel_PacTouchQuery::create()
            ->filterByItemId($stockId)
            ->filterByItemEvent(\SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ITEM_EVENT_ACTIVE)
            ->filterByItemType('stock-product')
            ->findOne();

        if (!$stockTouched) {
            $stockTouched = new \SprykerCore_Zed_Touch_Persistence_Propel_PacTouch();
        }

        $stockTouched
            ->setItemType('stock-product')
            ->setItemEvent(\SprykerCore_Zed_Touch_Persistence_Propel_PacTouchPeer::ITEM_EVENT_ACTIVE)
            ->setItemId($stockId)
            ->setTouched(new \DateTime())
            ->save();

    }

}
