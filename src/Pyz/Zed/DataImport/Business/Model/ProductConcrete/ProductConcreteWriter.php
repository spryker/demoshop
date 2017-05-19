<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\ProductConcrete;

use Orm\Zed\Product\Persistence\SpyProduct;
use Orm\Zed\Product\Persistence\SpyProductLocalizedAttributesQuery;
use Orm\Zed\Product\Persistence\SpyProductQuery;
use Orm\Zed\ProductImage\Persistence\SpyProductImage;
use Orm\Zed\ProductImage\Persistence\SpyProductImageSetQuery;
use Orm\Zed\ProductImage\Persistence\SpyProductImageSetToProductImage;
use Orm\Zed\ProductImage\Persistence\SpyProductImageSetToProductImageQuery;
use Orm\Zed\ProductSearch\Persistence\SpyProductSearchQuery;
use Pyz\Shared\Product\ProductConfig;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;
use Symfony\Component\VarDumper\VarDumper;

class ProductConcreteWriter implements DataImportStepInterface
{

    const ATTRIBUTES = 'attributes';
    const LOCALIZED_ATTRIBUTES = 'localizedAttributes';
    const NAME = 'name';
    const DESCRIPTION = 'description';
    const IMAGE_SET_NAME = 'image_set_name';
    const IMAGE_BIG = 'image_big';
    const IMAGE_SMALL = 'image_small';
    const LOCALES = 'locales';
    const CONCRETE_SKU = 'concrete_sku';
    const IS_ACTIVE = 'is_active';
    const ID_ABSTRACT_PRODUCT = 'idAbstractProduct';
    const IS_COMPLETE = 'is_complete';
    const IS_SEARCHABLE = 'is_searchable';

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $productEntity = $this->importProduct($dataSet);

        $this->importProductLocalizedAttributes($dataSet, $productEntity);
        $this->importProductImages($dataSet, $productEntity);
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return \Orm\Zed\Product\Persistence\SpyProduct
     */
    protected function importProduct(DataSetInterface $dataSet)
    {
        $query = SpyProductQuery::create();
        $productEntity = $query
            ->filterBySku($dataSet[static::CONCRETE_SKU])
            ->findOneOrCreate();

        $productEntity
            ->setIsActive(isset($dataSet[static::IS_ACTIVE]) ? $dataSet[static::IS_ACTIVE] : true)
            ->setFkProductAbstract($dataSet[static::ID_ABSTRACT_PRODUCT])
            ->setAttributes(json_encode($dataSet[static::ATTRIBUTES]));

        $productEntity->save();

        return $productEntity;
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     * @param \Orm\Zed\Product\Persistence\SpyProduct $productEntity
     *
     * @return void
     */
    protected function importProductLocalizedAttributes(DataSetInterface $dataSet, SpyProduct $productEntity)
    {
        foreach ($dataSet[static::LOCALIZED_ATTRIBUTES] as $idLocale => $localizedAttributes) {
            $query = SpyProductLocalizedAttributesQuery::create();
            $productLocalizedAttributesEntity = $query
                ->filterByFkProduct($productEntity->getIdProduct())
                ->filterByFkLocale($idLocale)
                ->findOneOrCreate();

            $productLocalizedAttributesEntity
                ->setName($localizedAttributes[static::NAME])
                ->setDescription($localizedAttributes[static::DESCRIPTION])
                ->setIsComplete(isset($localizedAttributes[static::IS_COMPLETE]) ? $localizedAttributes[static::IS_COMPLETE] : true)
                ->setAttributes(json_encode($localizedAttributes[static::ATTRIBUTES]));

            $productLocalizedAttributesEntity->save();

            $query = SpyProductSearchQuery::create();
            $productSearchEntity = $query
                ->filterByFkProduct($productEntity->getIdProduct())
                ->filterByFkLocale($idLocale)
                ->findOneOrCreate();

            $productSearchEntity->setIsSearchable($localizedAttributes[static::IS_SEARCHABLE]);
            $productSearchEntity->save();
        }
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     * @param \Orm\Zed\Product\Persistence\SpyProduct $productEntity
     *
     * @return void
     */
    protected function importProductImages(DataSetInterface $dataSet, SpyProduct $productEntity)
    {
        $imageSetName = (isset($dataSet[static::IMAGE_SET_NAME])) ? $dataSet[static::IMAGE_SET_NAME] : ProductConfig::DEFAULT_IMAGE_SET_NAME;

        foreach ($dataSet[static::LOCALES] as $localeName => $idLocale) {
            $query = SpyProductImageSetQuery::create();
            $productImageSetEntity = $query
                ->filterByFkProduct($productEntity->getIdProduct())
                ->filterByFkLocale($idLocale)
                ->filterByName($imageSetName)
                ->findOneOrCreate();

            $query = SpyProductImageSetToProductImageQuery::create();
            $productImageSetToProductImageEntityCollection = $query
                ->filterByFkProductImageSet($productImageSetEntity->getIdProductImageSet())
                ->find();

            if ($productImageSetToProductImageEntityCollection->count() > 0) {
                foreach ($productImageSetToProductImageEntityCollection as $productImageSetToProductImageEntity) {
                    $productImageEntity = $productImageSetToProductImageEntity->getSpyProductImage();
                    $productImageSetToProductImageEntity->delete();
                    $productImageEntity->delete();
                }
            }

            $productImageEntity = new SpyProductImage();
            $productImageEntity
                ->setExternalUrlLarge($dataSet[static::IMAGE_BIG])
                ->setExternalUrlSmall($dataSet[static::IMAGE_SMALL]);

            $productImageSetToProductImageEntity = new SpyProductImageSetToProductImage();
            $productImageSetToProductImageEntity
                ->setSpyProductImage($productImageEntity)
                ->setSpyProductImageSet($productImageSetEntity)
                ->setSortOrder(0)
                ->save();
        }
    }

}
