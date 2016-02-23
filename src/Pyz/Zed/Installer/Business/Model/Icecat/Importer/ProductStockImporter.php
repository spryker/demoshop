<?php

namespace Pyz\Zed\Installer\Business\Model\Icecat\Importer;

use Generated\Shared\Transfer\StockProductTransfer;
use Generated\Shared\Transfer\TypeTransfer;
use Pyz\Zed\Installer\Business\Model\Icecat\AbstractIcecatImporter;
use Pyz\Zed\Stock\Business\StockFacadeInterface;
use Spryker\Zed\Product\Persistence\ProductQueryContainerInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProductStockImporter extends AbstractIcecatImporter
{
    const SKU = 'sku';
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
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return void
     */
    protected function importData(OutputInterface $output)
    {
        $csvFile = $this->csvReader->read('products.csv');
        $columns = $this->csvReader->getColumns();
        $total = intval($this->csvReader->getTotal($csvFile));
        $step = 0;

        $stockType = new TypeTransfer();
        $stockType->setName('Warehouse1');
        $idStockType = $this->stockFacade->createStockType($stockType);
        $stockType->setIdStock($idStockType);

        $csvFile->rewind();

        while (!$csvFile->eof()) {
            $step++;
            $info = 'Importing... ' . $step . '/' . $total;
            $output->write($info);
            $output->write(str_repeat("\x08", strlen($info)));

            $csvData = $this->generateCsvItem($columns, $csvFile->fgetcsv());
            if ($this->hasVariants($csvData[self::VARIANT_ID])) {
                continue;
            }

            $product = $this->format($csvData);

            $productAbstract = $this->productQueryContainer
                ->queryProductAbstractBySku($product[self::SKU])
                ->findOne();

            if (!$productAbstract) {
                continue;
            }

            $transferStockProduct = new StockProductTransfer();
            $transferStockProduct->setSku($product[self::SKU])
                ->setIsNeverOutOfStock(false)
                ->setQuantity(5)
                ->setStockType($stockType->getIdStock());

            $this->stockFacade->createStockProduct($transferStockProduct);
        }

        $output->writeln('');
        $output->writeln('Installed: ' . $step);
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

}
