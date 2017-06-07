<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\ProductStock;

use Orm\Zed\Availability\Persistence\SpyAvailabilityAbstractQuery;
use Orm\Zed\Availability\Persistence\SpyAvailabilityQuery;
use Orm\Zed\Stock\Persistence\SpyStockProductQuery;
use Orm\Zed\Stock\Persistence\SpyStockQuery;
use Pyz\Zed\DataImport\Business\Model\Product\Repository\ProductRepository;
use Spryker\Zed\Availability\AvailabilityConfig;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\TouchAwareStep;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;
use Spryker\Zed\DataImport\Dependency\Facade\DataImportToTouchInterface;
use Spryker\Zed\Stock\StockConfig;

class ProductStockWriterStep extends TouchAwareStep implements DataImportStepInterface
{

    const BULK_SIZE = 50;
    const KEY_NAME = 'name';
    const KEY_CONCRETE_SKU = 'concrete_sku';
    const KEY_QUANTITY = 'quantity';
    const KEY_IS_NEVER_OUT_OF_STOCK = 'is_never_out_of_stock';

    /**
     * @var \Pyz\Zed\DataImport\Business\Model\Product\Repository\ProductRepository
     */
    protected $productRepository;

    /**
     * @param \Pyz\Zed\DataImport\Business\Model\Product\Repository\ProductRepository $productRepository
     * @param \Spryker\Zed\DataImport\Dependency\Facade\DataImportToTouchInterface $touchFacade
     * @param int|null $bulkSize
     */
    public function __construct(ProductRepository $productRepository, DataImportToTouchInterface $touchFacade, $bulkSize = null)
    {
        parent::__construct($touchFacade, $bulkSize);

        $this->productRepository = $productRepository;
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

        $this->addMainTouchable(StockConfig::TOUCH_STOCK_TYPE, $stockEntity->getIdStock());

        $idProduct = $this->productRepository->getIdProductByConcreteSku($dataSet[static::KEY_CONCRETE_SKU]);

        $stockProductEntity = SpyStockProductQuery::create()
            ->filterByFkProduct($idProduct)
            ->filterByFkStock($stockEntity->getIdStock())
            ->findOneOrCreate();

        $stockProductEntity
            ->setQuantity($dataSet[static::KEY_QUANTITY])
            ->setIsNeverOutOfStock($dataSet[static::KEY_IS_NEVER_OUT_OF_STOCK]);

        $stockProductEntity->save();

        $this->addSubTouchable(StockConfig::TOUCH_STOCK_PRODUCT, $stockProductEntity->getIdStockProduct());

        $productAbstractSku = $this->productRepository->getAbstractSkuByConcreteSku($dataSet[static::KEY_CONCRETE_SKU]);

        $availabilityAbstractEntity = SpyAvailabilityAbstractQuery::create()
            ->filterByAbstractSku($productAbstractSku)
            ->findOneOrCreate();

        $abstractQuantity = $dataSet[static::KEY_QUANTITY];
        if (!$availabilityAbstractEntity->isNew()) {
            $abstractQuantity += $availabilityAbstractEntity->getQuantity();
        }

        $availabilityAbstractEntity
            ->setQuantity($abstractQuantity)
            ->save();

        $availabilityEntity = SpyAvailabilityQuery::create()
            ->filterBySku($dataSet[static::KEY_CONCRETE_SKU])
            ->filterByFkAvailabilityAbstract($availabilityAbstractEntity->getIdAvailabilityAbstract())
            ->findOneOrCreate();

        $availabilityEntity
            ->setQuantity($dataSet[static::KEY_QUANTITY])
            ->setIsNeverOutOfStock($dataSet[static::KEY_IS_NEVER_OUT_OF_STOCK])
            ->save();

        $this->addSubTouchable(AvailabilityConfig::RESOURCE_TYPE_AVAILABILITY_ABSTRACT, $availabilityAbstractEntity->getIdAvailabilityAbstract());
    }

}
