<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer\Product;

use Generated\Shared\Transfer\StockProductTransfer;
use Generated\Shared\Transfer\TypeTransfer;
use Orm\Zed\Stock\Persistence\Base\SpyStockQuery;
use Pyz\Zed\Importer\Business\Importer\AbstractImporter;
use Spryker\Shared\Library\Collection\Collection;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;
use Spryker\Zed\Product\Persistence\ProductQueryContainerInterface;
use Spryker\Zed\Stock\Business\StockFacadeInterface;

class ProductStockImporter extends AbstractImporter
{

    const SKU = 'sku';
    const VARIANT_ID = 'variant_id';
    const CONCRETE_SKU = 'concrete_sku';
    const CATEGORY_KEY = 'category_key';
    const QUANTITY = 'quantity';
    const NEVER_OUT_OF_STOCK = 'is_never_out_of_stock';
    const STOCK_TYPE = 'stock_type';
    const PRODUCT_ID = 'product_id';

    /**
     * @var \Spryker\Shared\Library\Reader\Csv\CsvReaderInterface
     */
    protected $csvReader;

    /**
     * @var string
     */
    protected $dataDirectory;

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
    protected $stockTypeCache;

    /**
     * @param \Spryker\Zed\Locale\Business\LocaleFacadeInterface $localeFacade
     * @param \Spryker\Zed\Stock\Business\StockFacadeInterface $stockFacade
     * @param \Spryker\Zed\Product\Persistence\ProductQueryContainerInterface $productQueryContainer
     * @param string $dataDirectory
     */
    public function __construct(
        LocaleFacadeInterface $localeFacade,
        StockFacadeInterface $stockFacade,
        ProductQueryContainerInterface $productQueryContainer,
        $dataDirectory
    ) {
        parent::__construct($localeFacade);

        $this->stockFacade = $stockFacade;
        $this->productQueryContainer = $productQueryContainer;
        $this->dataDirectory = $dataDirectory;

        $this->stockTypeCache = new Collection([]);
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Product Stock';
    }

    /**
     * @return bool
     */
    public function isImported()
    {
        $query = SpyStockQuery::create();

        return $query->count() > 0;
    }

    /**
     * @param array $data
     *
     * @return void
     */
    protected function importOne(array $data)
    {
        if (!$data) {
            return;
        }

        $stockType = $this->createStockTypeOnce($data);

        $stockProductTransfer = $this->buildStockProductTransfer($data, $stockType);
        $this->stockFacade->createStockProduct($stockProductTransfer);
    }

    /**
     * @param array $stockData
     *
     * @return \Generated\Shared\Transfer\TypeTransfer
     */
    protected function createStockTypeOnce(array $stockData)
    {
        $stockTypeTransfer = $this->createTypeTransfer($stockData);
        if (!$this->stockTypeCache->has($stockData[self::STOCK_TYPE])) {
            $idStockType = $this->stockFacade->createStockType($stockTypeTransfer);
            $stockTypeTransfer->setIdStock($idStockType);
            $this->stockTypeCache->set($stockData[self::STOCK_TYPE], $stockTypeTransfer);
        } else {
            $stockTypeTransfer = $this->stockTypeCache->get($stockData[self::STOCK_TYPE]);
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
    protected function buildStockProductTransfer(array $stockData, TypeTransfer $stockType)
    {
        $transferStockProduct = new StockProductTransfer();
        $transferStockProduct
            ->setSku($stockData[self::CONCRETE_SKU])
            ->setIsNeverOutOfStock($stockData[self::NEVER_OUT_OF_STOCK])
            ->setQuantity($stockData[self::QUANTITY])
            ->setStockType($stockType->getName());

        return $transferStockProduct;
    }

}
