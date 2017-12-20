<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\ProductStock;

use Orm\Zed\Stock\Persistence\SpyStockProductQuery;
use Orm\Zed\Stock\Persistence\SpyStockProductStore;
use Orm\Zed\Stock\Persistence\SpyStockProductStoreQuery;
use Orm\Zed\Stock\Persistence\SpyStockQuery;
use Orm\Zed\Store\Persistence\SpyStoreQuery;
use Pyz\Zed\DataImport\Business\Model\Product\Repository\ProductRepository;
use Spryker\Zed\Availability\Business\AvailabilityFacadeInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\TouchAwareStep;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;
use Spryker\Zed\DataImport\Dependency\Facade\DataImportToTouchInterface;
use Spryker\Zed\ProductBundle\Business\ProductBundleFacadeInterface;
use Spryker\Zed\Stock\StockConfig;

class ProductStockWriterStep extends TouchAwareStep implements DataImportStepInterface
{
    const BULK_SIZE = 100;
    const KEY_NAME = 'name';
    const KEY_CONCRETE_SKU = 'concrete_sku';
    const KEY_QUANTITY = 'quantity';
    const KEY_IS_NEVER_OUT_OF_STOCK = 'is_never_out_of_stock';
    const KEY_IS_BUNDLE = 'is_bundle';
    const KEY_STORE = 'store';

    /**
     * @var \Pyz\Zed\DataImport\Business\Model\Product\Repository\ProductRepository
     */
    protected $productRepository;

    /**
     * @var \Spryker\Zed\Availability\Business\AvailabilityFacadeInterface
     */
    protected $availabilityFacade;

    /**
     * @var \Spryker\Zed\ProductBundle\Business\ProductBundleFacadeInterface
     */
    protected $productBundleFacade;

    /**
     * @param \Pyz\Zed\DataImport\Business\Model\Product\Repository\ProductRepository $productRepository
     * @param \Spryker\Zed\Availability\Business\AvailabilityFacadeInterface $availabilityFacade
     * @param \Spryker\Zed\ProductBundle\Business\ProductBundleFacadeInterface $productBundleFacade
     * @param \Spryker\Zed\DataImport\Dependency\Facade\DataImportToTouchInterface $touchFacade
     * @param int|null $bulkSize
     */
    public function __construct(ProductRepository $productRepository, AvailabilityFacadeInterface $availabilityFacade, ProductBundleFacadeInterface $productBundleFacade, DataImportToTouchInterface $touchFacade, $bulkSize = null)
    {
        parent::__construct($touchFacade, $bulkSize);

        $this->productRepository = $productRepository;
        $this->availabilityFacade = $availabilityFacade;
        $this->productBundleFacade = $productBundleFacade;
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $stockEntity = SpyStockQuery::create()
            ->filterByName($dataSet[static::KEY_NAME])
            ->findOneOrCreate();

        $stockEntity->save();

        $storeEntity = SpyStoreQuery::create()
            ->filterByName($dataSet[static::KEY_STORE])
            ->findOne();


        $this->addSubTouchable(StockConfig::TOUCH_STOCK_TYPE, $stockEntity->getIdStock());

        $idProduct = $this->productRepository->getIdProductByConcreteSku($dataSet[static::KEY_CONCRETE_SKU]);

        $stockProductEntity = SpyStockProductQuery::create()
            ->filterByFkProduct($idProduct)
            ->filterByFkStock($stockEntity->getIdStock())
            ->findOneOrCreate();

        $stockProductEntity
            ->setQuantity($dataSet[static::KEY_QUANTITY])
            ->setIsNeverOutOfStock($dataSet[static::KEY_IS_NEVER_OUT_OF_STOCK]);

        $stockProductEntity->save();

        $this->addMainTouchable(StockConfig::TOUCH_STOCK_PRODUCT, $stockProductEntity->getIdStockProduct());

        $this->availabilityFacade->updateAvailability($dataSet[static::KEY_CONCRETE_SKU]);

        if ($dataSet[static::KEY_IS_BUNDLE]) {
            $this->productBundleFacade->updateBundleAvailability($dataSet[static::KEY_CONCRETE_SKU]);
            $this->productBundleFacade->updateAffectedBundlesAvailability($dataSet[static::KEY_CONCRETE_SKU]);
        }
    }
}
