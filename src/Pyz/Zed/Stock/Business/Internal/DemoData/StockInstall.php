<?php

namespace Pyz\Zed\Stock\Business\Internal\DemoData;

use Generated\Zed\Ide\AutoCompletion;
use ProjectA\Shared\Stock\Transfer\StockProduct;
use ProjectA\Shared\Stock\Transfer\StockType;
use ProjectA\Zed\Installer\Business\Model\AbstractInstaller;
use ProjectA\Zed\Kernel\Locator;
use ProjectA\Zed\Library\Import\Reader\CsvFileReader;
use ProjectA\Zed\Stock\Business\StockFacade;
use ProjectA\Zed\Stock\Persistence\Propel\SpyStock;
use ProjectA\Zed\Stock\Persistence\StockQueryContainer;

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

    /**
     * @var AutoCompletion
     */
    protected $locator;

    /**
     * @var StockFacade
     */
    protected $stockFacade;

    /**
     * @var StockQueryContainer
     */
    protected $queryContainer;

    /**
     * @param Locator|AutoCompletion $locator
     */
    public function __construct(Locator $locator)
    {
        $this->locator = $locator;
        $this->stockFacade = $locator->stock()->facade();
        $this->queryContainer = $locator->stock()->queryContainer();
    }

    public function install()
    {
        $this->info('This will install a dummy set of stocks in the demo shop');
        $demoStockProducts = $this->getDemoStockProducts();
        $this->writeStockProduct($demoStockProducts);
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
        $stockType = $this->createStockTypeTransfer($row);
        if (!$this->doesStockExist($stockType)) {
            $this->stockFacade->createStockType($stockType);
        }
        $stockProductTransfer = $this->createStockProductTransfer($row, $stockType);
        $hasProduct = $this->stockFacade->hasStockProduct(
            $stockProductTransfer->getSku(),
            $stockProductTransfer->getStockType()
        );

        if ($hasProduct) {
            $idStockProduct = $this->stockFacade->getIdStockProduct(
                $stockProductTransfer->getSku(),
                $stockProductTransfer->getStockType()
            );
            $stockProductTransfer->setIdStockProduct($idStockProduct);
            $this->stockFacade->updateStockProduct($stockProductTransfer);
        } else {
            $this->stockFacade->createStockProduct($stockProductTransfer);
        }
    }

    /**
     * @param array $row
     *
     * @return StockType
     */
    protected function createStockTypeTransfer(array $row)
    {
        $stockType = $this->locator->stock()->transferStockType();
        $stockType->setName($row[self::STOCK_TYPE]);

        return $stockType;
    }

    /**
     * @param array $row
     * @param StockType $stockType
     *
     * @return StockProduct
     */
    protected function createStockProductTransfer(array $row, StockType $stockType)
    {
        $transferStockProduct = $this->locator->stock()->transferStockProduct();
        $transferStockProduct->setSku($row[self::SKU])
            ->setIsNeverOutOfStock($row[self::NEVER_OUT_OF_STOCK])
            ->setQuantity($row[self::QUANTITY])
            ->setStockType($stockType->getName());

        return $transferStockProduct;
    }

    /**
     * @param StockType $stockType
     * @return SpyStock
     */
    protected function doesStockExist(StockType $stockType)
    {
        $stockCount = $this->queryContainer
            ->queryStockByName($stockType->getName())
            ->count()
        ;

        return $stockCount > 0;
    }
}
