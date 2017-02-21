<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Updater\Business\Updater\Product;

use Generated\Shared\Transfer\StockProductTransfer;
use Generated\Shared\Transfer\TypeTransfer;
use Propel\Runtime\ActiveQuery\Criteria;
use Pyz\Zed\Updater\Business\Updater\AbstractUpdater;
use Spryker\Shared\Library\Collection\Collection;
use Spryker\Shared\Library\Reader\Csv\CsvReader;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;
use Spryker\Zed\Oms\Business\OmsFacadeInterface;
use Spryker\Zed\Product\Persistence\ProductQueryContainerInterface;
use Spryker\Zed\Sales\Persistence\SalesQueryContainerInterface;
use Spryker\Zed\Stock\Business\StockFacadeInterface;
use Spryker\Zed\Stock\Persistence\StockQueryContainerInterface;

class ProductStockUpdater extends AbstractUpdater
{

    const SKU = 'sku';
    const VARIANT_ID = 'variant_id';
    const QUANTITY = 'quantity';
    const NEVER_OUT_OF_STOCK = 'is_never_out_of_stock';
    const STOCK_TYPE = 'stock_type';
    const STOCK_UPDATE = 'stock-update';

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
     * @var \Spryker\Zed\Oms\Business\OmsFacadeInterface
     */
    protected $omsFacade;

    /**
     * @var \Spryker\Zed\Sales\Persistence\SalesQueryContainerInterface
     */
    protected $salesQueryContainer;

    /**
     * @var \Spryker\Zed\Stock\Persistence\StockQueryContainerInterface
     */
    protected $stockQueryContainer;

    /**
     * @var \Spryker\Shared\Library\Collection\CollectionInterface
     */
    protected $stockTypeCache;

    /**
     * ProductStockUpdater constructor.
     *
     * @param \Spryker\Zed\Locale\Business\LocaleFacadeInterface $localeFacade
     * @param \Spryker\Zed\Stock\Business\StockFacadeInterface $stockFacade
     * @param \Spryker\Zed\Oms\Business\OmsFacadeInterface $omsFacade
     * @param \Spryker\Zed\Product\Persistence\ProductQueryContainerInterface $productQueryContainer
     * @param \Spryker\Zed\Stock\Persistence\StockQueryContainerInterface $stockQueryContainer
     * @param \Spryker\Zed\Sales\Persistence\SalesQueryContainerInterface $salesQueryContainer
     * @param string $dataDirectory
     */
    public function __construct(
        CsvReader $csvReader,
        LocaleFacadeInterface $localeFacade,
        StockFacadeInterface $stockFacade,
        OmsFacadeInterface $omsFacade,
        ProductQueryContainerInterface $productQueryContainer,
        StockQueryContainerInterface $stockQueryContainer,
        SalesQueryContainerInterface $salesQueryContainer,
        $dataDirectory
    ) {
        parent::__construct($localeFacade);

        $this->csvReader = $csvReader;
        $this->stockFacade = $stockFacade;
        $this->omsFacade = $omsFacade;
        $this->productQueryContainer = $productQueryContainer;
        $this->stockQueryContainer = $stockQueryContainer;
        $this->salesQueryContainer = $salesQueryContainer;
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
        return false;
    }

    /**
     * @param array $data
     *
     * @return void
     */
    protected function importOne(array $data)
    {
        $stock = $this->getStockValue();
        $stock[self::SKU] .= '-1';

        if (empty($data)) {
            return;
        }

        if ($this->hasVariants($data[self::VARIANT_ID])) {
            return;
        }

        $productConcrete = $this->productQueryContainer
            ->queryProductConcreteBySku($stock[self::SKU])
            ->findOne();

        if (!$productConcrete || $productConcrete->getSpyProductBundlesRelatedByFkProduct()->count() > 0) {
            return;
        }

        $stockType = $this->createStockTypeOnce($stock);
        $stockProductTransfer = $this->buildStockProductTransfer($stock, $stockType);

        if ($this->stockFacade->hasStockProduct($stock[self::SKU], $stock[self::STOCK_TYPE])) {
            $stockProductEntity = $this->stockQueryContainer
                ->queryStockProductBySkuAndType(
                    $stock[self::SKU],
                    $stock[self::STOCK_TYPE]
                )
                ->findOne();

            $stockProductTransfer->setIdStockProduct($stockProductEntity->getIdStockProduct());
            $this->stockFacade->updateStockProduct($stockProductTransfer);
        } else {
            $this->stockFacade->createStockProduct($stockProductTransfer);
        }
    }

    /**
     * @return void
     */
    protected function before()
    {
        $this->loadCsvFile();
    }

    /**
     * @return void
     */
    public function triggerStockUpdateEvent()
    {
        $allSku = $this->getAffectedAllSku();
        $allOrderItemIds = $this->getAffectedOrderItems($allSku);

        $this->omsFacade->triggerEventForOrderItems(self::STOCK_UPDATE, $allOrderItemIds);
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
     * @return array
     */
    protected function getStockValue()
    {
        $default = [
            self::SKU => null,
            self::VARIANT_ID => 1,
            self::QUANTITY => 0,
            self::NEVER_OUT_OF_STOCK => true,
            self::STOCK_TYPE => null,
        ];

        if (!$this->csvReader->valid()) {
            return $default;
        }

        $data = $this->csvReader->read();

        if (empty($data)) {
            return $default;
        }

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

        $stockTypeEntities = $this->stockQueryContainer->queryAllStockTypes()->find();
        foreach ($stockTypeEntities as $stockTypeEntity) {
            if ($stockTypeEntity->getName() === $stockData[self::STOCK_TYPE]) {
                $stockTypeTransfer->setIdStock($stockTypeEntity->getIdStock());
                $this->stockTypeCache->set($stockData[self::STOCK_TYPE], $stockTypeTransfer);
            }
        }

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
        $transferStockProduct->setSku($stockData[self::SKU])
            ->setIsNeverOutOfStock($stockData[self::NEVER_OUT_OF_STOCK])
            ->setQuantity($stockData[self::QUANTITY])
            ->setStockType($stockType->getName());

        return $transferStockProduct;
    }

    /**
     * @return void
     */
    protected function loadCsvFile()
    {
        $this->csvReader->load($this->dataDirectory . '/stocks.csv');
    }

    /**
     * @return array
     */
    protected function getAffectedAllSku()
    {
        $allSku = [];
        $csvArray = $this->getCsvData();

        foreach ($csvArray as $item) {
            if (array_key_exists('sku', $item)) {
                $allSku[] = $item['sku'] . '-' . $item['variant_id'];
            }
        }

        return $allSku;
    }

    /**
     * @param array $allSku
     *
     * @return array
     */
    protected function getAffectedOrderItems(array $allSku)
    {
        $orderItemIds = [];
        $orderItemEntities = $this->salesQueryContainer->querySalesOrderItem()->filterBySku($allSku, Criteria::IN)
            ->find();

        foreach ($orderItemEntities as $orderItemEntity) {
            $orderItemIds[] = $orderItemEntity->getIdSalesOrderItem();
        }

        return $orderItemIds;
    }

    /**
     * @return array
     */
    protected function getCsvData()
    {
        $this->loadCsvFile();

        return $this->csvReader->toArray();
    }

}
