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
     * @param array $data
     *
     * @throws \Pyz\Zed\Installer\Business\Exception\PriceTypeNotFoundException
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function importOne(array $data)
    {
        $csvFile = $this->csvReader->load('prices.csv')->getFile();
        $columns = $this->csvReader->getColumns();
        $total = (int)$this->csvReader->getTotal();
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
                ->setFkProduct($productAbstract->getIdProductAbstract());

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
        return (int)$variant > 1;
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
