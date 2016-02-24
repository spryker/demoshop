<?php

namespace Pyz\Zed\Installer\Business\Icecat\Importer\Product;

use Generated\Shared\Transfer\StockProductTransfer;
use Generated\Shared\Transfer\TypeTransfer;
use Pyz\Zed\Installer\Business\Icecat\AbstractIcecatImporter;
use Pyz\Zed\Stock\Business\StockFacadeInterface;
use Spryker\Zed\Product\Persistence\ProductQueryContainerInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProductStockImporter extends AbstractIcecatImporter
{
    const SKU = 'sku';
    const QUANTITY = 'quantity';
    const NEVER_OUT_OF_STOCK = 'is_never_out_of_stock';
    const STOCK_TYPE = 'stock_type';
    const PRODUCT_ID = 'product_id';
    const VARIANT_ID = 'variantId';
    const CATEGORY_KEY = 'category_key';

    /**
     * @var \Pyz\Zed\Stock\Business\StockFacadeInterface
     */
    protected $stockFacade;

    /**
     * @var \Spryker\Zed\Product\Persistence\ProductQueryContainerInterface
     */
    protected $productQueryContainer;

    /**
     * @var array
     */
    protected $stockTypeCache = [];

    /**
     * @param \Spryker\Zed\Product\Persistence\ProductQueryContainerInterface $productQueryContainer
     */
    public function setProductQueryContainer(ProductQueryContainerInterface $productQueryContainer)
    {
        $this->productQueryContainer = $productQueryContainer;
    }

    /**
     * @param \Pyz\Zed\Stock\Business\StockFacadeInterface $stockFacade
     */
    public function setStockFacade(StockFacadeInterface $stockFacade)
    {
        $this->stockFacade = $stockFacade;
    }

    /**
     * @return bool
     */
    public function canImport()
    {
        return true;
        //return $this->productFacade->getAbstractProductCount() > 0;
    }

    /**
     * @param array $columns
     * @param array $data
     */
    public function importOne(array $columns, array $data)
    {
        $csvFile = $this->csvReader->read('stocks.csv');
        $columns = $this->csvReader->getColumns();
        $total = intval($this->csvReader->getTotal($csvFile));
        $step = 0;

        $csvFile->rewind();

        while (!$csvFile->eof()) {
            ++$step;
            $info = 'Importing... '.$step.'/'.$total;
            $data->write($info);
            $data->write(str_repeat("\x08", strlen($info)));

            $csvData = $this->generateCsvItem($columns, $csvFile->fgetcsv());
            $stock = $this->format($csvData);

            $productAbstract = $this->productQueryContainer
                ->queryProductAbstractBySku($stock[self::SKU])
                ->findOne();

            if (!$productAbstract) {
                continue;
            }

            $stockType = $this->createStockTypeOnce($stock);
            $stockProductTransfer = $this->createStockProductTransfer($stock, $stockType);
            $this->stockFacade->createStockProduct($stockProductTransfer);
        }

        $data->writeln('');
        $data->writeln('Installed: '.$step);
    }

    /**
     * @param string|int $variant
     *
     * @return bool
     */
    protected function hasVariants($variant)
    {
        return intval($variant) > 1;
    }

    /**
     * @param array $data
     *
     * @return array
     */
    protected function format(array $data)
    {
        return $data;
    }

    /**
     * @param array $stockData
     *
     * @return \Generated\Shared\Transfer\TypeTransfer
     */
    protected function createStockTypeOnce(array $stockData)
    {
        $stockTypeTransfer = $this->createTypeTransfer($stockData);
        if (!array_key_exists($stockData[self::STOCK_TYPE], $this->stockTypeCache)) {
            $idStockType = $this->stockFacade->createStockType($stockTypeTransfer);
            $stockTypeTransfer->setIdStock($idStockType);
            $this->stockTypeCache[$stockData[self::STOCK_TYPE]] = $stockTypeTransfer;
        } else {
            $stockTypeTransfer = $this->stockTypeCache[$stockData[self::STOCK_TYPE]];
        }

        return $stockTypeTransfer;
    }

    /**
     * @param array $stockTypeData
     *
     * @return \Generated\Shared\Transfer\TypeTransfer
     */
    protected function createTypeTransfer(array $stockTypeData)
    {
        $stockType = new TypeTransfer();
        $stockType->setName($stockTypeData[self::STOCK_TYPE]);

        return $stockType;
    }

    /**
     * @param array $stockData
     * @param \Generated\Shared\Transfer\TypeTransfer $stockType
     *
     * @return \Generated\Shared\Transfer\StockProductTransfer
     */
    protected function createStockProductTransfer(array $stockData, TypeTransfer $stockType)
    {
        $transferStockProduct = new StockProductTransfer();
        $transferStockProduct->setSku($stockData[self::SKU])
            ->setIsNeverOutOfStock($stockData[self::NEVER_OUT_OF_STOCK])
            ->setQuantity($stockData[self::QUANTITY])
            ->setStockType($stockType->getName());

        return $transferStockProduct;
    }
}
