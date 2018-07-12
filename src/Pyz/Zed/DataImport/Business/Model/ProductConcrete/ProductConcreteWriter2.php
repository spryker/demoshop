<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\ProductConcrete;

use Orm\Zed\Product\Persistence\SpyProduct;
use Orm\Zed\Product\Persistence\SpyProductLocalizedAttributesQuery;
use Orm\Zed\Product\Persistence\SpyProductQuery;
use Orm\Zed\ProductBundle\Persistence\SpyProductBundleQuery;
use Orm\Zed\ProductSearch\Persistence\SpyProductSearchQuery;
use Pyz\Zed\DataImport\Business\Model\Product\Repository\ProductRepository;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\PublishAwareStep;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;
use Spryker\Zed\Product\Dependency\ProductEvents;

class ProductConcreteWriter extends PublishAwareStep implements DataImportStepInterface
{
    const BULK_SIZE = 100;

    const KEY_ATTRIBUTES = 'attributes';
    const KEY_LOCALIZED_ATTRIBUTES = 'localizedAttributes';
    const KEY_NAME = 'name';
    const KEY_DESCRIPTION = 'description';
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
     */
    public function __construct(ProductRepository $productRepository)
    {
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
        $this->importBundles($dataSet, $productEntity);

        $this->addPublishEvents(ProductEvents::PRODUCT_CONCRETE_PUBLISH, $productEntity->getIdProduct());
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

        $idAbstract = $this->productRepository->getIdProductAbstractByAbstractSku($dataSet[static::KEY_ABSTRACT_SKU]);

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
                ->setAttributes(json_encode($localizedAttributes[static::KEY_ATTRIBUTES]));

            $productLocalizedAttributesEntity->save();

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
