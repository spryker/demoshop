<?php

namespace Pyz\Zed\Stock\Business\Internal\DemoData;

use Generated\Shared\Transfer\StockProductTransfer;
use Generated\Shared\Transfer\TypeTransfer;
use Spryker\Zed\Installer\Business\Model\AbstractInstaller;
use Spryker\Zed\Library\Import\Reader\CsvFileReader;
use Spryker\Zed\Stock\Business\Model\ReaderInterface;
use Spryker\Zed\Stock\Business\Model\WriterInterface;
use Spryker\Zed\Stock\Persistence\StockQueryContainer;

class StockInstall extends AbstractInstaller
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
     * @var \Spryker\Zed\Stock\Persistence\StockQueryContainer
     */
    protected $queryContainer;

    /**
     * @param \Spryker\Zed\Stock\Business\Model\ReaderInterface $reader
     * @param \Spryker\Zed\Stock\Business\Model\WriterInterface $writer
     * @param \Spryker\Zed\Stock\Persistence\StockQueryContainer $queryContainer
     */
    public function __construct(
        ReaderInterface $reader,
        WriterInterface $writer,
        StockQueryContainer $queryContainer
    ) {
        $this->reader = $reader;
        $this->writer = $writer;
        $this->queryContainer = $queryContainer;
    }

    public function install()
    {
        $query = $this->queryContainer->queryAllStockTypes();
        if ($query->count() > 0) {
            $this->warning('Stock-Data is already installed. Skipping');

            return;
        }

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
            $this->writer->createStockType($stockType);
        }
        $stockProductTransfer = $this->createStockProductTransfer($row, $stockType);
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
    protected function createStockTypeTransfer(array $row)
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
     * @param \Generated\Shared\Transfer\TypeTransfer $stockType
     *
     * @return bool
     */
    protected function doesStockExist(TypeTransfer $stockType)
    {
        $stockCount = $this->queryContainer
            ->queryStockByName($stockType->getName())
            ->count();

        return $stockCount > 0;
    }

}
