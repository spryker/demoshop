<?php

namespace Pyz\Zed\Stock\Business\Internal\DemoData;

use Generated\Shared\Transfer\StockProductTransfer;
use Generated\Shared\Transfer\TypeTransfer;
use SprykerFeature\Zed\Installer\Business\Model\AbstractInstaller;
use SprykerFeature\Zed\Library\Import\Reader\CsvFileReader;
use SprykerFeature\Zed\Stock\Business\Model\ReaderInterface;
use SprykerFeature\Zed\Stock\Business\Model\WriterInterface;
use SprykerFeature\Zed\Stock\Persistence\StockQueryContainer;

class StockInstall extends AbstractInstaller
{

    const SKU = 'sku';
    const QUANTITY = 'quantity';
    const NEVER_OUT_OF_STOCK = 'is_never_out_of_stock';
    const STOCK_TYPE = 'stock_type';

    /**
     * @var ReaderInterface
     */
    protected $reader;

    /**
     * @var WriterInterface
     */
    protected $writer;

    /**
     * @var StockQueryContainer
     */
    protected $queryContainer;

    /**
     * @param ReaderInterface $reader
     * @param WriterInterface $writer
     * @param StockQueryContainer $queryContainer
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
     * @return TypeTransfer
     */
    protected function createStockTypeTransfer(array $row)
    {
        $stockType = new TypeTransfer();
        $stockType->setName($row[self::STOCK_TYPE]);

        return $stockType;
    }

    /**
     * @param array $row
     * @param TypeTransfer $stockType
     *
     * @return StockProductTransfer
     */
    protected function createStockProductTransfer(array $row, TypeTransfer $stockType)
    {
        $transferStockProduct = new StockProductTransfer();
        $transferStockProduct->setSku($row[self::SKU])
            ->setIsNeverOutOfStock($row[self::NEVER_OUT_OF_STOCK])
            ->setQuantity($row[self::QUANTITY])
            ->setStockType($stockType->getName())
        ;

        return $transferStockProduct;
    }

    /**
     * @param TypeTransfer $stockType
     *
     * @return bool
     */
    protected function doesStockExist(TypeTransfer $stockType)
    {
        $stockCount = $this->queryContainer
            ->queryStockByName($stockType->getName())
            ->count()
        ;

        return $stockCount > 0;
    }

}
