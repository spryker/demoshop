<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\ProductAbstract;

use Orm\Zed\Product\Persistence\SpyProductAbstract;
use Orm\Zed\Product\Persistence\SpyProductAbstractLocalizedAttributesQuery;
use Orm\Zed\Product\Persistence\SpyProductAbstractQuery;
use Orm\Zed\ProductCategory\Persistence\SpyProductCategory;
use Orm\Zed\ProductCategory\Persistence\SpyProductCategoryQuery;
use Orm\Zed\ProductImage\Persistence\SpyProductImage;
use Orm\Zed\ProductImage\Persistence\SpyProductImageSetQuery;
use Orm\Zed\ProductImage\Persistence\SpyProductImageSetToProductImage;
use Orm\Zed\ProductImage\Persistence\SpyProductImageSetToProductImageQuery;
use Pyz\Shared\Product\ProductConfig;
use Spryker\Zed\DataImport\Business\Exception\DataKeyNotFoundInDataSetException;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\TouchAwareStep;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class ProductAbstractWriter extends TouchAwareStep implements DataImportStepInterface
{

    const BULK_SIZE = 50;

    const TOUCH_ITEM_TYPE_KEY = 'touchItemType';
    const TOUCH_ITEM_ID_KEY = 'touchItemId';

    const ABSTRACT_SKU = 'abstract_sku';
    const IS_FEATURED = 'is_featured';
    const COLOR_CODE = 'color_code';
    const ID_TAX_SET = 'idTaxSet';
    const ATTRIBUTES = 'attributes';
    const LOCALIZED_ATTRIBUTES = 'localizedAttributes';
    const NAME = 'name';
    const DESCRIPTION = 'description';
    const META_TITLE = 'meta_title';
    const META_DESCRIPTION = 'meta_description';
    const META_KEYWORDS = 'meta_keywords';
    const CATEGORY_KEY = 'category_key';
    const CATEGORY_KEYS = 'categoryKeys';
    const IMAGE_SET_NAME = 'image_set_name';
    const IMAGE_BIG = 'image_big';
    const IMAGE_SMALL = 'image_small';
    const LOCALES = 'locales';

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $productAbstractEntity = $this->importProductAbstract($dataSet);

        $this->importProductAbstractLocalizedAttributes($dataSet, $productAbstractEntity);
        $this->importProductCategories($dataSet, $productAbstractEntity);
        $this->importProductAbstractImages($dataSet, $productAbstractEntity);

        $this->addMainTouchable(ProductConfig::RESOURCE_TYPE_PRODUCT_ABSTRACT, $productAbstractEntity->getIdProductAbstract());
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return \Orm\Zed\Product\Persistence\SpyProductAbstract
     */
    protected function importProductAbstract(DataSetInterface $dataSet)
    {
        $query = SpyProductAbstractQuery::create();
        $productAbstractEntity = $query
            ->filterBySku($dataSet[static::ABSTRACT_SKU])
            ->findOneOrCreate();

        $productAbstractEntity
            ->setIsFeatured($dataSet[static::IS_FEATURED])
            ->setColorCode($dataSet[static::COLOR_CODE])
            ->setFkTaxSet($dataSet[static::ID_TAX_SET])
            ->setAttributes(json_encode($dataSet[static::ATTRIBUTES]));

        $productAbstractEntity->save();

        return $productAbstractEntity;
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     * @param \Orm\Zed\Product\Persistence\SpyProductAbstract $productAbstractEntity
     *
     * @return void
     */
    protected function importProductAbstractLocalizedAttributes(DataSetInterface $dataSet, SpyProductAbstract $productAbstractEntity)
    {
        foreach ($dataSet[static::LOCALIZED_ATTRIBUTES] as $idLocale => $localizedAttributes) {
            $query = SpyProductAbstractLocalizedAttributesQuery::create();
            $productAbstractLocalizedAttributesEntity = $query
                ->filterByFkProductAbstract($productAbstractEntity->getIdProductAbstract())
                ->filterByFkLocale($idLocale)
                ->findOneOrCreate();

            $productAbstractLocalizedAttributesEntity
                ->setName($localizedAttributes[static::NAME])
                ->setDescription($localizedAttributes[static::DESCRIPTION])
                ->setMetaTitle($localizedAttributes[static::META_TITLE])
                ->setMetaDescription($localizedAttributes[static::META_DESCRIPTION])
                ->setMetaKeywords($localizedAttributes[static::META_KEYWORDS])
                ->setAttributes(json_encode($localizedAttributes[static::ATTRIBUTES]));

            $productAbstractLocalizedAttributesEntity->save();
        }
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     * @param \Orm\Zed\Product\Persistence\SpyProductAbstract $productAbstractEntity
     *
     * @return void
     */
    protected function importProductCategories(DataSetInterface $dataSet, SpyProductAbstract $productAbstractEntity)
    {
        $this->deleteAssignedCategories($productAbstractEntity);
        $this->reAssignCategories($dataSet, $productAbstractEntity);
    }

    /**
     * @param \Orm\Zed\Product\Persistence\SpyProductAbstract $productAbstractEntity
     *
     * @return void
     */
    protected function deleteAssignedCategories(SpyProductAbstract $productAbstractEntity)
    {
        $query = SpyProductCategoryQuery::create();
        $query
            ->filterByFkProductAbstract($productAbstractEntity->getIdProductAbstract())
            ->find()
            ->delete();
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     * @param \Orm\Zed\Product\Persistence\SpyProductAbstract $productAbstractEntity
     *
     * @throws \Spryker\Zed\DataImport\Business\Exception\DataKeyNotFoundInDataSetException
     *
     * @return void
     */
    protected function reAssignCategories(DataSetInterface $dataSet, SpyProductAbstract $productAbstractEntity)
    {
        $categoryKeys = $this->getCategoryKeys($dataSet[static::CATEGORY_KEY]);

        foreach ($categoryKeys as $categoryKey) {

            if (!isset($dataSet[static::CATEGORY_KEYS][$categoryKey])) {
                throw new DataKeyNotFoundInDataSetException(sprintf(
                    'The category with key "%s" was not found in categoryKeys. Maybe there is a typo. Given Categories: "%s"',
                    $categoryKey,
                    implode(array_values($dataSet[static::CATEGORY_KEYS]))
                ));
            }

            $productCategoryEntity = new SpyProductCategory();
            $productCategoryEntity
                ->setFkProductAbstract($productAbstractEntity->getIdProductAbstract())
                ->setFkCategory($dataSet[static::CATEGORY_KEYS][$categoryKey])
                ->save();
        }
    }

    /**
     * @param string $categoryKeys
     *
     * @return array
     */
    protected function getCategoryKeys($categoryKeys)
    {
        $categoryKeys = explode(',', $categoryKeys);
        $callback = function ($value) {
            return trim($value);
        };

        return array_map($callback, $categoryKeys);
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     * @param \Orm\Zed\Product\Persistence\SpyProductAbstract $productAbstractEntity
     *
     * @return void
     */
    protected function importProductAbstractImages(DataSetInterface $dataSet, SpyProductAbstract $productAbstractEntity)
    {
        $imageSetName = (isset($dataSet[static::IMAGE_SET_NAME])) ? $dataSet[static::IMAGE_SET_NAME] : ProductConfig::DEFAULT_IMAGE_SET_NAME;

        foreach ($dataSet[static::LOCALES] as $localeName => $idLocale) {

            $query = SpyProductImageSetQuery::create();
            $productImageSetEntity = $query
                ->filterByFkProductAbstract($productAbstractEntity->getIdProductAbstract())
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
