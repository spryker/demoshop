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
        $stockType = $this->createStockTypeTransfer();
        if (!$this->doesStockExist($stockType)) {
            $this->writer->createStockType($stockType);
        }
    }


    /**
     * @return TypeTransfer
     */
    protected function createStockTypeTransfer()
    {
        $stockType = new TypeTransfer();
        $stockType->setName("Warehouse1");

        return $stockType;
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
