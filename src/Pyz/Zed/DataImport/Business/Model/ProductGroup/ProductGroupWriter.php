<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\ProductGroup;

use Orm\Zed\ProductGroup\Persistence\SpyProductAbstractGroupQuery;
use Orm\Zed\ProductGroup\Persistence\SpyProductGroupQuery;
use Pyz\Zed\DataImport\Business\Model\Product\Repository\ProductRepository;
use Spryker\Shared\ProductGroup\ProductGroupConfig;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\TouchAwareStep;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;
use Spryker\Zed\DataImport\Dependency\Facade\DataImportToTouchInterface;

class ProductGroupWriter extends TouchAwareStep implements DataImportStepInterface
{

    const BULK_SIZE = 50;

    const KEY_ABSTRACT_SKU = 'abstract_sku';
    const KEY_PRODUCT_GROUP_KEY = 'group_key';
    const KEY_POSITION = 'position';

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
        $productGroupEntity = SpyProductGroupQuery::create()
            ->filterByProductGroupKey($dataSet[static::KEY_PRODUCT_GROUP_KEY])
            ->findOneOrCreate();

        $productGroupEntity->save();

        $this->addMainTouchable(ProductGroupConfig::RESOURCE_TYPE_PRODUCT_GROUP, $productGroupEntity->getIdProductGroup());

        $idProductAbstract = $this->productRepository->getIdAbstractByAbstractSku($dataSet[static::KEY_ABSTRACT_SKU]);

        $productAbstractGroup = SpyProductAbstractGroupQuery::create()
            ->filterByFkProductAbstract($idProductAbstract)
            ->filterByFkProductGroup($productGroupEntity->getIdProductGroup())
            ->findOneOrCreate();

        $productAbstractGroup
            ->setPosition($dataSet[static::KEY_POSITION])
            ->save();

        $this->addSubTouchable(ProductGroupConfig::RESOURCE_TYPE_PRODUCT_ABSTRACT_GROUPS, $productAbstractGroup->getFkProductAbstract());
    }

}
