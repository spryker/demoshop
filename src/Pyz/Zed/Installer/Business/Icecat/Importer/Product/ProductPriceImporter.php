<?php

namespace Pyz\Zed\Installer\Business\Icecat\Importer\Product;

use Orm\Zed\Price\Persistence\SpyPriceProduct;
use Orm\Zed\Price\Persistence\SpyPriceProductQuery;
use Pyz\Zed\Installer\Business\Exception\PriceTypeNotFoundException;
use Pyz\Zed\Installer\Business\Icecat\AbstractIcecatImporter;
use Pyz\Zed\Stock\Business\StockFacadeInterface;
use Spryker\Zed\Price\Persistence\PriceQueryContainerInterface;
use Spryker\Zed\Product\Persistence\ProductQueryContainerInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProductPriceImporter extends AbstractIcecatImporter
{
    const SKU = 'sku';
    const PRODUCT_ID = 'product_id';
    const VARIANT_ID = 'variantId';
    const PRICE = 'price';
    const PRICE_TYPE = 'price_type';

    /**
     * @var \Pyz\Zed\Stock\Business\StockFacadeInterface
     */
    protected $stockFacade;

    /**
     * @var \Spryker\Zed\Product\Persistence\ProductQueryContainerInterface
     */
    protected $productQueryContainer;

    /**
     * @var \Spryker\Zed\Price\Persistence\PriceQueryContainerInterface
     */
    protected $priceQueryContainer;

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
     * @param \Spryker\Zed\Price\Persistence\PriceQueryContainerInterface $priceQueryContainer
     */
    public function setPriceQueryContainer(PriceQueryContainerInterface $priceQueryContainer)
    {
        $this->priceQueryContainer = $priceQueryContainer;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Product Price';
    }

    /**
     * @return bool
     */
    public function isImported()
    {
        $query = SpyPriceProductQuery::create();
        return $query->count() > 0;
    }

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return void
     */
    protected function generatePrices(OutputInterface $output)
    {
        $fp = fopen('/data/shop/development/current/src/Pyz/Zed/Installer/Business/Internal/DemoData/prices.csv', 'w');

        //sku,variantId,price,price_type
        fputcsv($fp, [
            self::SKU,
            self::VARIANT_ID,
            self::PRICE,
            self::PRICE_TYPE
        ]);

        $csvFile = $this->csvReader->read('products.csv');
        $columns = $this->csvReader->getColumns();
        $total = intval($this->csvReader->getTotal($csvFile));
        $step = 0;

        $csvFile->rewind();

        while (!$csvFile->eof()) {
            $step++;
            $info = 'Generating price... ' . $step . '/' . $total;
            $output->write($info);
            $output->write(str_repeat("\x08", strlen($info)));

            $csvData = $this->generateCsvItem($columns, $csvFile->fgetcsv());
            $product = $this->format($csvData);

            //sku,variantId,price,price_type
            fputcsv($fp, [
                $product[self::SKU],
                $product[self::VARIANT_ID],
                rand(0.5, 2999.00),
                'DEFAULT'
            ]);
        }

        $output->writeln('');
        $output->writeln('Installed: ' . $step);
    }

    /**
     * @param array $columns
     * @param array $data
     * @throws PriceTypeNotFoundException
     * @throws \Propel\Runtime\Exception\PropelException
     * @internal param array $extraData
     *
     */
    public function importOne(array $columns, array $data)
    {
        $csvFile = $this->csvReader->read('prices.csv');
        $columns = $this->csvReader->getColumns();
        $total = intval($this->csvReader->getTotal($csvFile));
        $step = 0;

        $priceTypesCache = [];

        $csvFile->rewind();

        while (!$csvFile->eof()) {
            $step++;
            $info = 'Importing... ' . $step . '/' . $total;
            $data->write($info);
            $data->write(str_repeat("\x08", strlen($info)));

            $csvData = $this->generateCsvItem($columns, $csvFile->fgetcsv());
            if ($this->hasVariants($csvData[self::VARIANT_ID])) {
                continue;
            }

            $price = $this->format($csvData);

            $productAbstract = $this->productQueryContainer
                ->queryProductAbstractBySku($price[self::SKU])
                ->findOne();

            if (!$productAbstract) {
                continue;
            }

            if (!array_key_exists($price[self::PRICE_TYPE], $priceTypesCache)) {
                $priceTypeQuery = $this->priceQueryContainer->queryPriceType($price[self::PRICE_TYPE]);
                $priceType = $priceTypeQuery->findOne();
                if (!$priceType) {
                    throw new PriceTypeNotFoundException($price[self::PRICE_TYPE]);
                }

                $priceTypesCache[$price[self::PRICE_TYPE]] = $priceType;
            }
            else {
                $priceType = $priceTypesCache[$price[self::PRICE_TYPE]];
            }

            $entity = new SpyPriceProduct();

            $entity
                ->setPrice($price[self::PRICE])
                ->setPriceType($priceType)
                ->setFkProductAbstract($productAbstract->getIdProductAbstract())
                ->setFkProduct($productAbstract->getIdProductAbstract()) //collectors won't export without it
            ;

            $entity->save();
        }

        $data->writeln('');
        $data->writeln('Installed: ' . $step);
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
