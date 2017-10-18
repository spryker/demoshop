<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\ProductImage;

use Orm\Zed\ProductImage\Persistence\SpyProductImage;
use Orm\Zed\ProductImage\Persistence\SpyProductImageQuery;
use Orm\Zed\ProductImage\Persistence\SpyProductImageSet;
use Orm\Zed\ProductImage\Persistence\SpyProductImageSetQuery;
use Orm\Zed\ProductImage\Persistence\SpyProductImageSetToProductImageQuery;
use Pyz\Zed\DataImport\Business\Model\Locale\Repository\LocaleRepositoryInterface;
use Pyz\Zed\DataImport\Business\Model\Product\Repository\ProductRepositoryInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class ProductImageWriterStep implements DataImportStepInterface
{
    const BULK_SIZE = 100;

    const KEY_LOCALE = 'locale';
    const KEY_IMAGE_SET_NAME = 'image_set_name';
    const KEY_ABSTRACT_SKU = 'abstract_sku';
    const KEY_CONCRETE_SKU = 'concrete_sku';
    const KEY_EXTERNAL_URL_LARGE = 'external_url_large';
    const KEY_EXTERNAL_URL_SMALL = 'external_url_small';

    /**
     * @var \Pyz\Zed\DataImport\Business\Model\Locale\Repository\LocaleRepositoryInterface
     */
    protected $localeRepository;

    /**
     * @var \Pyz\Zed\DataImport\Business\Model\Product\Repository\ProductRepositoryInterface
     */
    protected $productRepository;

    /**
     * @param \Pyz\Zed\DataImport\Business\Model\Locale\Repository\LocaleRepositoryInterface $localeRepository
     * @param \Pyz\Zed\DataImport\Business\Model\Product\Repository\ProductRepositoryInterface $productRepository
     */
    public function __construct(LocaleRepositoryInterface $localeRepository, ProductRepositoryInterface $productRepository)
    {
        $this->localeRepository = $localeRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $imageSetEntity = $this->findOrCreateImageSet($dataSet);
        $productImageEntity = $this->findOrCreateImage($dataSet);

        $this->updateOrCreateImageToImageSetRelation($imageSetEntity, $productImageEntity);
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return \Orm\Zed\ProductImage\Persistence\SpyProductImageSet
     */
    protected function findOrCreateImageSet(DataSetInterface $dataSet)
    {
        $idLocale = $this->getIdLocaleByLocale($dataSet);

        $query = SpyProductImageSetQuery::create()
            ->filterByName($dataSet[static::KEY_IMAGE_SET_NAME])
            ->filterByFkLocale($idLocale);

        if (!empty($dataSet[static::KEY_ABSTRACT_SKU])) {
            $idProductAbstract = $this->productRepository->getIdProductAbstractByAbstractSku($dataSet[static::KEY_ABSTRACT_SKU]);
            $query->filterByFkProductAbstract($idProductAbstract);
        }

        if (!empty($dataSet[static::KEY_CONCRETE_SKU])) {
            $idProduct = $this->productRepository->getIdProductByConcreteSku($dataSet[static::KEY_CONCRETE_SKU]);
            $query->filterByFkProduct($idProduct);
        }

        $productImageSetEntity = $query->findOneOrCreate();
        if ($productImageSetEntity->isNew() || $productImageSetEntity->isModified()) {
            $productImageSetEntity->save();
        }

        return $productImageSetEntity;
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return int
     */
    protected function getIdLocaleByLocale(DataSetInterface $dataSet)
    {
        $idLocale = null;

        if (!empty($dataSet[static::KEY_LOCALE])) {
            $idLocale = $this->localeRepository->getIdLocaleByLocale($dataSet[static::KEY_LOCALE]);
        }

        return $idLocale;
    }

    /**
     * We expect that the large URL is the unique identifier for an image.
     *
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return \Orm\Zed\ProductImage\Persistence\SpyProductImage
     */
    protected function findOrCreateImage(DataSetInterface $dataSet)
    {
        $productImageEntity = SpyProductImageQuery::create()
            ->filterByExternalUrlLarge($dataSet[static::KEY_EXTERNAL_URL_LARGE])
            ->findOneOrCreate();

        $productImageEntity
            ->setExternalUrlSmall($dataSet[static::KEY_EXTERNAL_URL_SMALL]);

        if ($productImageEntity->isNew() || $productImageEntity->isModified()) {
            $productImageEntity->save();
        }

        return $productImageEntity;
    }

    /**
     * @param \Orm\Zed\ProductImage\Persistence\SpyProductImageSet $imageSetEntity
     * @param \Orm\Zed\ProductImage\Persistence\SpyProductImage $productImageEntity
     *
     * @return void
     */
    protected function updateOrCreateImageToImageSetRelation(SpyProductImageSet $imageSetEntity, SpyProductImage $productImageEntity)
    {
        $productImageSetToProductImageEntity = SpyProductImageSetToProductImageQuery::create()
            ->filterByFkProductImageSet($imageSetEntity->getIdProductImageSet())
            ->filterByFkProductImage($productImageEntity->getIdProductImage())
            ->findOneOrCreate();

        $productImageSetToProductImageEntity
            ->setSortOrder(0);

        if ($productImageSetToProductImageEntity->isNew() || $productImageSetToProductImageEntity->isModified()) {
            $productImageSetToProductImageEntity->save();
        }
    }
}
