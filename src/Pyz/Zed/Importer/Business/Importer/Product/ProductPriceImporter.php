<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer\Product;

use Orm\Zed\Price\Persistence\SpyPriceProduct;
use Orm\Zed\Price\Persistence\SpyPriceProductQuery;
use Pyz\Zed\Importer\Business\Exception\PriceTypeNotFoundException;
use Pyz\Zed\Importer\Business\Importer\AbstractImporter;
use Spryker\Shared\Library\Reader\Csv\CsvReader;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;
use Spryker\Zed\Price\Persistence\PriceQueryContainerInterface;
use Spryker\Zed\Product\Persistence\ProductQueryContainerInterface;
use Spryker\Zed\Stock\Business\StockFacadeInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProductPriceImporter extends AbstractImporter
{

    const SKU = 'sku';
    const PRODUCT_ID = 'product_id';
    const VARIANT_ID = 'variant_id';
    const PRICE = 'price';
    const PRICE_TYPE = 'price_type';

    /**
     * @var \Spryker\Shared\Library\Reader\Csv\CsvReaderInterface
     */
    protected $cvsPriceReader;

    /**
     * @var string
     */
    protected $dataDirectory;

    /**
     * @var \Spryker\Zed\Price\Persistence\PriceQueryContainerInterface
     */
    protected $priceQueryContainer;

    /**
     * @var \Spryker\Zed\Product\Persistence\ProductQueryContainerInterface
     */
    protected $productQueryContainer;

    /**
     * @var \Spryker\Zed\Stock\Business\StockFacadeInterface
     */
    protected $stockFacade;

    /**
     * @var array
     */
    protected $priceTypesCache = [];

    /**
     * @param \Spryker\Zed\Locale\Business\LocaleFacadeInterface $localeFacade
     * @param string $dataDirectory
     */
    public function __construct(LocaleFacadeInterface $localeFacade, $dataDirectory)
    {
        parent::__construct($localeFacade);
        $this->dataDirectory = $dataDirectory;
    }

    /**
     * @param \Spryker\Zed\Product\Persistence\ProductQueryContainerInterface $productQueryContainer
     *
     * @return void
     */
    public function setProductQueryContainer(ProductQueryContainerInterface $productQueryContainer)
    {
        $this->productQueryContainer = $productQueryContainer;
    }

    /**
     * @param \Spryker\Zed\Stock\Business\StockFacadeInterface $stockFacade
     *
     * @return void
     */
    public function setStockFacade(StockFacadeInterface $stockFacade)
    {
        $this->stockFacade = $stockFacade;
    }

    /**
     * @param \Spryker\Zed\Price\Persistence\PriceQueryContainerInterface $priceQueryContainer
     *
     * @return void
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
     * @throws \Pyz\Zed\Importer\Business\Exception\PriceTypeNotFoundException
     *
     * @return void
     */
    protected function importOne(array $data)
    {
        $price = $this->getPriceValue();

        $productAbstract = $this->productQueryContainer
            ->queryProductAbstractBySku($price[self::SKU])
            ->findOne();

        if (!$productAbstract) {
            return;
        }

        //TODO move caching to another method
        if (!array_key_exists($price[self::PRICE_TYPE], $this->priceTypesCache)) {
            $priceTypeQuery = $this->priceQueryContainer->queryPriceType($price[self::PRICE_TYPE]);
            $priceType = $priceTypeQuery->findOne();
            if (!$priceType) {
                throw new PriceTypeNotFoundException($price[self::PRICE_TYPE]);
            }

            $priceTypesCache[$price[self::PRICE_TYPE]] = $priceType;
        } else {
            $priceType = $this->priceTypesCache[$price[self::PRICE_TYPE]];
        }

        $entity = new SpyPriceProduct();
        $entity
            ->setPrice($price[self::PRICE])
            ->setPriceType($priceType)
            ->setFkProductAbstract($productAbstract->getIdProductAbstract());

        $entity->save();
    }

    /**
     * @return array
     */
    protected function getPriceValue()
    {
        $default = [
            self::SKU => null,
            self::VARIANT_ID => 1,
            self::PRICE => 0,
            self::PRICE_TYPE => 'DEFAULT',
        ];

        if (!$this->cvsPriceReader->valid()) {
            return $default;
        }

        return $this->cvsPriceReader->read();
    }

    /**
     * @return void
     */
    protected function before()
    {
        $this->cvsPriceReader = new CsvReader();
        $this->cvsPriceReader->load($this->dataDirectory . '/prices.csv');
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

}
