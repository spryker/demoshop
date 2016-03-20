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
use Spryker\Shared\Library\Collection\Collection;
use Spryker\Shared\Library\Reader\Csv\CsvReader;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;
use Spryker\Zed\Price\Persistence\PriceQueryContainerInterface;
use Spryker\Zed\Product\Persistence\ProductQueryContainerInterface;
use Spryker\Zed\Stock\Business\StockFacadeInterface;

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
     * @var \Spryker\Shared\Library\Collection\CollectionInterface
     */
    protected $cachePriceType;

    /**
     * @param \Spryker\Zed\Locale\Business\LocaleFacadeInterface $localeFacade
     * @param \Spryker\Zed\Stock\Business\StockFacadeInterface $stockFacade
     * @param \Spryker\Zed\Product\Persistence\ProductQueryContainerInterface $productQueryContainer
     * @param \Spryker\Zed\Price\Persistence\PriceQueryContainerInterface $priceQueryContainer
     * @param string $dataDirectory
     */
    public function __construct(
        LocaleFacadeInterface $localeFacade,
        StockFacadeInterface $stockFacade,
        ProductQueryContainerInterface $productQueryContainer,
        PriceQueryContainerInterface $priceQueryContainer,
        $dataDirectory
    ) {
        parent::__construct($localeFacade);

        $this->stockFacade = $stockFacade;
        $this->productQueryContainer = $productQueryContainer;
        $this->priceQueryContainer = $priceQueryContainer;
        $this->dataDirectory = $dataDirectory;

        $this->cachePriceType = new Collection([]);
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

        $priceType = $this->getPriceTypeEntity($price[self::PRICE_TYPE]);

        $entity = new SpyPriceProduct();
        $entity
            ->setPrice($price[self::PRICE])
            ->setPriceType($priceType)
            ->setFkProductAbstract($productAbstract->getIdProductAbstract());

        $entity->save();
    }

    /**
     * @param string $priceType
     *
     * @throws \Pyz\Zed\Importer\Business\Exception\PriceTypeNotFoundException
     * @return string
     */
    protected function getPriceTypeEntity($priceType)
    {
        $priceTypeEntity = null;
        
        if (!$this->cachePriceType->has($priceType)) {
            $priceTypeEntity = $this->priceQueryContainer
                ->queryPriceType($priceType)
                ->findOne();

            if (!$priceTypeEntity) {
                throw new PriceTypeNotFoundException($priceType);
            }

            $this->cachePriceType->set($priceType, $priceTypeEntity);
        } else {
            $priceTypeEntity = $this->cachePriceType->get($priceType);
        }

        return $priceTypeEntity;
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
