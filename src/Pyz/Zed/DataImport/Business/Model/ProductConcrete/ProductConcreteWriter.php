<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\ProductConcrete;

use Orm\Zed\Product\Persistence\SpyProduct;
use Orm\Zed\Product\Persistence\SpyProductLocalizedAttributesQuery;
use Orm\Zed\Product\Persistence\SpyProductQuery;
use Orm\Zed\ProductBundle\Persistence\SpyProductBundleQuery;
use Orm\Zed\ProductImage\Persistence\SpyProductImage;
use Orm\Zed\ProductImage\Persistence\SpyProductImageSetQuery;
use Orm\Zed\ProductImage\Persistence\SpyProductImageSetToProductImage;
use Orm\Zed\ProductImage\Persistence\SpyProductImageSetToProductImageQuery;
use Orm\Zed\ProductSearch\Persistence\SpyProductSearchQuery;
use Pyz\Shared\Product\ProductConfig;
use Pyz\Zed\DataImport\Business\Model\Product\Repository\ProductRepository;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\TouchAwareStep;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;
use Spryker\Zed\DataImport\Dependency\Facade\DataImportToTouchInterface;

class ProductConcreteWriter extends TouchAwareStep implements DataImportStepInterface
{

    const BULK_SIZE = 50;

    const KEY_ATTRIBUTES = 'attributes';
    const KEY_LOCALIZED_ATTRIBUTES = 'localizedAttributes';
    const KEY_NAME = 'name';
    const KEY_DESCRIPTION = 'description';
    const KEY_IMAGE_SET_NAME = 'image_set_name';
    const KEY_IMAGE_BIG = 'image_big';
    const KEY_IMAGE_SMALL = 'image_small';
    const KEY_LOCALES = 'locales';
    const KEY_CONCRETE_SKU = 'concrete_sku';
    const KEY_IS_ACTIVE = 'is_active';
    const KEY_ABSTRACT_SKU = 'abstract_sku';
    const KEY_IS_COMPLETE = 'is_complete';
    const KEY_IS_SEARCHABLE = 'is_searchable';
    const KEY_BUNDLES = 'bundled';

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
        $productEntity = $this->importProduct($dataSet);

        $this->productRepository->addProductConcrete($productEntity, $dataSet[static::KEY_ABSTRACT_SKU]);

        $this->importProductLocalizedAttributes($dataSet, $productEntity);
        $this->importProductImages($dataSet, $productEntity);
        $this->importBundles($dataSet, $productEntity);

        $this->addMainTouchable(ProductConfig::RESOURCE_TYPE_PRODUCT_CONCRETE, $productEntity->getIdProduct());
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return \Orm\Zed\Product\Persistence\SpyProduct
     */
    protected function importProduct(DataSetInterface $dataSet)
    {
        $productEntity = SpyProductQuery::create()
            ->filterBySku($dataSet[static::KEY_CONCRETE_SKU])
            ->findOneOrCreate();

        $idAbstract = $this->productRepository->getIdAbstractByAbstractSku($dataSet[static::KEY_ABSTRACT_SKU]);

        $productEntity
            ->setIsActive(isset($dataSet[static::KEY_IS_ACTIVE]) ? $dataSet[static::KEY_IS_ACTIVE] : true)
            ->setFkProductAbstract($idAbstract)
            ->setAttributes(json_encode($dataSet[static::KEY_ATTRIBUTES]));

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
        foreach ($dataSet[static::KEY_LOCALIZED_ATTRIBUTES] as $idLocale => $localizedAttributes) {
            $productLocalizedAttributesEntity = SpyProductLocalizedAttributesQuery::create()
                ->filterByFkProduct($productEntity->getIdProduct())
                ->filterByFkLocale($idLocale)
                ->findOneOrCreate();

            $productLocalizedAttributesEntity
                ->setName($localizedAttributes[static::KEY_NAME])
                ->setDescription($localizedAttributes[static::KEY_DESCRIPTION])
                ->setIsComplete(isset($localizedAttributes[static::KEY_IS_COMPLETE]) ? $localizedAttributes[static::KEY_IS_COMPLETE] : true)
                ->setAttributes(json_encode($localizedAttributes[static::KEY_ATTRIBUTES]))
                ->save();

            $productSearchEntity = SpyProductSearchQuery::create()
                ->filterByFkProduct($productEntity->getIdProduct())
                ->filterByFkLocale($idLocale)
                ->findOneOrCreate();

            $productSearchEntity
                ->setIsSearchable($localizedAttributes[static::KEY_IS_SEARCHABLE])
                ->save();
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
        $imageSetName = (isset($dataSet[static::KEY_IMAGE_SET_NAME])) ? $dataSet[static::KEY_IMAGE_SET_NAME] : ProductConfig::DEFAULT_IMAGE_SET_NAME;

        foreach ($dataSet[static::KEY_LOCALES] as $localeName => $idLocale) {
            $productImageSetEntity = SpyProductImageSetQuery::create()
                ->filterByFkProduct($productEntity->getIdProduct())
                ->filterByFkLocale($idLocale)
                ->filterByName($imageSetName)
                ->findOneOrCreate();

            $productImageSetToProductImageEntityCollection = SpyProductImageSetToProductImageQuery::create()
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
                ->setExternalUrlLarge($dataSet[static::KEY_IMAGE_BIG])
                ->setExternalUrlSmall($dataSet[static::KEY_IMAGE_SMALL]);

            $productImageSetToProductImageEntity = new SpyProductImageSetToProductImage();
            $productImageSetToProductImageEntity
                ->setSpyProductImage($productImageEntity)
                ->setSpyProductImageSet($productImageSetEntity)
                ->setSortOrder(0)
                ->save();
        }
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     * @param \Orm\Zed\Product\Persistence\SpyProduct $productEntity
     *
     * @return void
     */
    protected function importBundles(DataSetInterface $dataSet, SpyProduct $productEntity)
    {
        if (!empty($dataSet[static::KEY_BUNDLES])) {
            $bundleProducts = explode(',', $dataSet[static::KEY_BUNDLES]);
            foreach ($bundleProducts as $bundleProduct) {
                $bundleProduct = trim($bundleProduct);
                list($sku, $quantity) = explode('/', $bundleProduct);
                $idProduct = $this->productRepository->getIdProductByConcreteSku($sku);

                $productBundleEntity = SpyProductBundleQuery::create()
                    ->filterByFkProduct($productEntity->getIdProduct())
                    ->filterByFkBundledProduct($idProduct)
                    ->findOneOrCreate();

                $productBundleEntity
                    ->setQuantity($quantity)
                    ->save();
            }
        }
    }

}
