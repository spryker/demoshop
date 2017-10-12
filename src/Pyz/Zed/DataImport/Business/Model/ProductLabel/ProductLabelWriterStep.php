<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\ProductLabel;

use Orm\Zed\ProductLabel\Persistence\Map\SpyProductLabelTableMap;
use Orm\Zed\ProductLabel\Persistence\SpyProductLabel;
use Orm\Zed\ProductLabel\Persistence\SpyProductLabelLocalizedAttributesQuery;
use Orm\Zed\ProductLabel\Persistence\SpyProductLabelProductAbstractQuery;
use Orm\Zed\ProductLabel\Persistence\SpyProductLabelQuery;
use Pyz\Zed\DataImport\Business\Model\DataImportStep\LocalizedAttributesExtractorStep;
use Pyz\Zed\DataImport\Business\Model\ProductAbstract\AddProductAbstractSkusStep;
use Spryker\Shared\ProductLabel\ProductLabelConstants;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\TouchAwareStep;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class ProductLabelWriterStep extends TouchAwareStep implements DataImportStepInterface
{
    const BULK_SIZE = 100;

    const KEY_NAME = 'name';
    const KEY_IS_ACTIVE = 'is_active';
    const KEY_IS_EXCLUSIVE = 'is_exclusive';
    const KEY_IS_DYNAMIC = 'is_dynamic';
    const KEY_FRONT_END_REFERENCE = 'front_end_reference';

    const KEY_VALID_FROM = 'valid_from';
    const KEY_VALID_TO = 'valid_to';

    const COL_MAX_POSITION = 'max_position';
    const KEY_PRODUCT_ABSTRACT_SKUS = 'product_abstract_skus';

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $productLabelEntity = $this->findOrCreateProductLabel($dataSet);

        $this->findOrCreateProductLabelLocalizedAttributes($dataSet, $productLabelEntity);
        $this->findOrCreateProductLabelToProductAbstractRelations($dataSet, $productLabelEntity);
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return \Orm\Zed\ProductLabel\Persistence\SpyProductLabel
     */
    protected function findOrCreateProductLabel(DataSetInterface $dataSet)
    {
        $productLabelEntity = SpyProductLabelQuery::create()
            ->filterByName($dataSet[static::KEY_NAME])
            ->findOneOrCreate();

        $productLabelEntity
            ->setIsActive($dataSet[static::KEY_IS_ACTIVE])
            ->setIsExclusive($dataSet[static::KEY_IS_EXCLUSIVE])
            ->setIsDynamic($dataSet[static::KEY_IS_DYNAMIC])
            ->setFrontEndReference($dataSet[static::KEY_FRONT_END_REFERENCE]);

        if ($dataSet[static::KEY_VALID_FROM]) {
            $productLabelEntity->setValidFrom($dataSet[static::KEY_VALID_FROM]);
        }

        if ($dataSet[static::KEY_VALID_TO]) {
            $productLabelEntity->setValidTo($dataSet[static::KEY_VALID_TO]);
        }

        if ($productLabelEntity->isNew()) {
            $productLabelEntity->setPosition($this->getPosition());
        }

        if ($productLabelEntity->isNew() || $productLabelEntity->isModified()) {
            $productLabelEntity->save();
        }

        return $productLabelEntity;
    }

    /**
     * @return mixed|\Orm\Zed\ProductLabel\Persistence\SpyProductLabel
     */
    protected function getPosition()
    {
        return SpyProductLabelQuery::create()
            ->withColumn(
                sprintf('MAX(%s)', SpyProductLabelTableMap::COL_POSITION),
                static::COL_MAX_POSITION
            )
            ->select([
                static::COL_MAX_POSITION,
            ])
            ->findOne() + 1;
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     * @param \Orm\Zed\ProductLabel\Persistence\SpyProductLabel $productLabelEntity
     *
     * @return void
     */
    protected function findOrCreateProductLabelLocalizedAttributes(DataSetInterface $dataSet, SpyProductLabel $productLabelEntity)
    {
        foreach ($dataSet[LocalizedAttributesExtractorStep::KEY_LOCALIZED_ATTRIBUTES] as $idLocale => $localizedAttributes) {
            $productLabelLocalizedAttributesEntity = SpyProductLabelLocalizedAttributesQuery::create()
                ->filterByFkProductLabel($productLabelEntity->getIdProductLabel())
                ->filterByFkLocale($idLocale)
                ->findOneOrCreate();

            $productLabelLocalizedAttributesEntity->setName($localizedAttributes[static::KEY_NAME]);

            if ($productLabelLocalizedAttributesEntity->isNew() || $productLabelLocalizedAttributesEntity->isModified()) {
                $productLabelLocalizedAttributesEntity->save();
            }
        }
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     * @param \Orm\Zed\ProductLabel\Persistence\SpyProductLabel $productLabelEntity
     *
     * @return void
     */
    protected function findOrCreateProductLabelToProductAbstractRelations(DataSetInterface $dataSet, SpyProductLabel $productLabelEntity)
    {
        if (!$dataSet[static::KEY_PRODUCT_ABSTRACT_SKUS]) {
            return;
        }

        $productAbstractSkus = explode(',', $dataSet[static::KEY_PRODUCT_ABSTRACT_SKUS]);

        if (!count($productAbstractSkus)) {
            return;
        }

        foreach ($productAbstractSkus as $productAbstractSku) {
            $idProductAbstract = trim($dataSet[AddProductAbstractSkusStep::KEY_PRODUCT_ABSTRACT_SKUS][$productAbstractSku]);
            $productLabelAbstractProductEntity = SpyProductLabelProductAbstractQuery::create()
                ->filterByFkProductLabel($productLabelEntity->getIdProductLabel())
                ->filterByFkProductAbstract($idProductAbstract)
                ->findOneOrCreate();

            if ($productLabelAbstractProductEntity->isNew() || $productLabelAbstractProductEntity->isModified()) {
                $productLabelAbstractProductEntity->save();

                $this->addMainTouchable(
                    ProductLabelConstants::RESOURCE_TYPE_PRODUCT_ABSTRACT_PRODUCT_LABEL_RELATIONS,
                    $idProductAbstract
                );
            }
        }
    }
}
