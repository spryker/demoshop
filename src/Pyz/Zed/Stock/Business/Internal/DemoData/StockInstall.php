<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Stock\Business\Internal\DemoData;

use Generated\Shared\Transfer\StockProductTransfer;
use Generated\Shared\Transfer\TypeTransfer;
use Pyz\Zed\Installer\Business\DemoData\AbstractDemoDataInstaller;
use Spryker\Shared\Library\Reader\Csv\CsvReader;
use Spryker\Zed\Stock\Business\Model\ReaderInterface;
use Spryker\Zed\Stock\Business\Model\WriterInterface;
use Spryker\Zed\Stock\Persistence\StockQueryContainerInterface;

class StockInstall extends AbstractDemoDataInstaller
{

    const SKU = 'sku';
    const QUANTITY = 'quantity';
    const NEVER_OUT_OF_STOCK = 'is_never_out_of_stock';
    const STOCK_TYPE = 'stock_type';

    /**
     * @var \Spryker\Zed\Stock\Business\Model\ReaderInterface
     */
    protected $reader;

    /**
     * @var \Spryker\Zed\Stock\Business\Model\WriterInterface
     */
    protected $writer;

    /**
     * @var \Spryker\Zed\Stock\Persistence\StockQueryContainerInterface
     */
    protected $queryContainer;

    /**
     * @var array
     */
    protected $stockTypeCache = [];

    /**
     * @param \Spryker\Zed\Stock\Business\Model\ReaderInterface $reader
     * @param \Spryker\Zed\Stock\Business\Model\WriterInterface $writer
     * @param \Spryker\Zed\Stock\Persistence\StockQueryContainerInterface $queryContainer
     */
    public function __construct(
        ReaderInterface $reader,
        WriterInterface $writer,
        StockQueryContainerInterface $queryContainer
    ) {
        $this->reader = $reader;
        $this->writer = $writer;
        $this->queryContainer = $queryContainer;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Stock';
    }

    /**
     * @return void
     */
    public function install()
    {
        $query = $this->queryContainer->queryAllStockTypes();
        if ($query->count() > 0) {
            $this->notice('Stock-Data is already installed. Skipping');

            return;
        }

        $this->info('This will install a dummy set of stocks in the demo shop');
        $demoStockProducts = $this->getDemoStockProducts();
        $this->writeStockProduct($demoStockProducts);
    }

    /**
     * @param array $demoStock
     *
     * @return void
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
        $reader = new CsvReader();

        return $reader
            ->load(__DIR__.'/demo-stock.csv')
            ->toArray();
    }

    /**
     * @param array $row
     *
     * @return void
     */
    protected function addEntry(array $row)
    {
        $typeTransfer = $this->createStockTypeOnce($row);

        $stockProductTransfer = $this->createStockProductTransfer($row, $typeTransfer);
        $hasProduct = $this->reader->hasStockProduct(
            $stockProductTransfer->getSku(),
            $stockProductTransfer->getStockType()
        );

        if ($hasProduct) {
            $idStockProduct = $this->reader->getIdStockProduct(
                $stockProductTransfer->getSku(),
                $stockProductTransfer->getStockType()
            );
            $stockProductTransfer->setIdStockProduct($idStockProduct);
            $this->writer->updateStockProduct($stockProductTransfer);
        } else {
            $this->writer->createStockProduct($stockProductTransfer);
        }
    }

    /**
     * @param array $row
     *
     * @return \Generated\Shared\Transfer\TypeTransfer
     */
    protected function createTypeTransfer(array $row)
    {
        $stockType = new TypeTransfer();
        $stockType->setName($row[self::STOCK_TYPE]);

        return $stockType;
    }

    /**
     * @param array $row
     * @param \Generated\Shared\Transfer\TypeTransfer $stockType
     *
     * @return \Generated\Shared\Transfer\StockProductTransfer
     */
    protected function createStockProductTransfer(array $row, TypeTransfer $stockType)
    {
        $transferStockProduct = new StockProductTransfer();
        $transferStockProduct->setSku($row[self::SKU])
            ->setIsNeverOutOfStock($row[self::NEVER_OUT_OF_STOCK])
            ->setQuantity($row[self::QUANTITY])
            ->setStockType($stockType->getName());

        return $transferStockProduct;
    }

    /**
     * @param array $row
     *
     * @return \Generated\Shared\Transfer\TypeTransfer
     */
    protected function createStockTypeOnce(array $row)
    {
        $stockTypeTransfer = $this->createTypeTransfer($row);
        if (!array_key_exists($row[self::STOCK_TYPE], $this->stockTypeCache)) {
            $idStock = $this->writer->createStockType($stockTypeTransfer);
            $stockTypeTransfer->setIdStock($idStock);
            $this->stockTypeCache[$row[self::STOCK_TYPE]] = $stockTypeTransfer;
        } else {
            $stockTypeTransfer = $this->stockTypeCache[$row[self::STOCK_TYPE]];
        }

        return $stockTypeTransfer;
    }

}
