<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\ProductSet;

use Orm\Zed\ProductImage\Persistence\SpyProductImageQuery;
use Orm\Zed\ProductImage\Persistence\SpyProductImageSetQuery;
use Orm\Zed\ProductImage\Persistence\SpyProductImageSetToProductImageQuery;
use Orm\Zed\ProductSet\Persistence\SpyProductAbstractSetQuery;
use Orm\Zed\ProductSet\Persistence\SpyProductSet;
use Orm\Zed\ProductSet\Persistence\SpyProductSetDataQuery;
use Orm\Zed\ProductSet\Persistence\SpyProductSetQuery;
use Orm\Zed\Url\Persistence\SpyUrlQuery;
use Pyz\Zed\DataImport\Business\Model\DataImportStep\LocalizedAttributesExtractorStep;
use Pyz\Zed\DataImport\Business\Model\Product\Repository\ProductRepositoryInterface;
use Spryker\Shared\ProductSet\ProductSetConfig;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\TouchAwareStep;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;
use Spryker\Zed\DataImport\Dependency\Facade\DataImportToTouchInterface;
use Spryker\Zed\Url\UrlConfig;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class ProductSetWriterStep extends TouchAwareStep implements DataImportStepInterface
{

    const BULK_SIZE = 100;

    const KEY_PRODUCT_SET_KEY = 'product_set_key';
    const KEY_NAME = 'name';
    const KEY_DESCRIPTION = 'description';
    const KEY_META_TITLE = 'meta_title';
    const KEY_META_DESCRIPTION = 'meta_description';
    const KEY_META_KEYWORDS = 'meta_keywords';
    const KEY_URL = 'url';
    const KEY_IS_ACTIVE = 'is_active';
    const KEY_WEIGHT = 'weight';
    const KEY_ABSTRACT_SKUS = 'abstract_skus';
    const KEY_IMAGE_SET = 'image_set';
    const KEY_IMAGES = 'images';
    const KEY_IMAGE_LARGE = 'image_large';

    /**
     * @var \Pyz\Zed\DataImport\Business\Model\Product\Repository\ProductRepositoryInterface
     */
    protected $productRepository;

    /**
     * @param \Pyz\Zed\DataImport\Business\Model\Product\Repository\ProductRepositoryInterface $productRepository
     * @param \Spryker\Zed\DataImport\Dependency\Facade\DataImportToTouchInterface $touchFacade
     * @param null|int $bulkSize
     */
    public function __construct(ProductRepositoryInterface $productRepository, DataImportToTouchInterface $touchFacade, $bulkSize = null)
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
        $productSetEntity = $this->findOrCreateProductSet($dataSet);

        $this->findOrCreateProductAbstractSet($dataSet, $productSetEntity);
        $this->findOrCreateProductSetData($dataSet, $productSetEntity);
        $this->findOrCreateProductImageSet($dataSet, $productSetEntity);
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return \Orm\Zed\ProductSet\Persistence\SpyProductSet
     */
    protected function findOrCreateProductSet(DataSetInterface $dataSet)
    {
        $productSetEntity = SpyProductSetQuery::create()
            ->filterByProductSetKey($dataSet[static::KEY_PRODUCT_SET_KEY])
            ->findOneOrCreate();

        $productSetEntity
            ->setIsActive($dataSet[static::KEY_IS_ACTIVE])
            ->setWeight($dataSet[static::KEY_WEIGHT]);

        if ($productSetEntity->isNew() || $productSetEntity->isModified()) {
            $productSetEntity->save();
            $this->addMainTouchable(ProductSetConfig::RESOURCE_TYPE_PRODUCT_SET, $productSetEntity->getIdProductSet());
        }

        return $productSetEntity;
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     * @param \Orm\Zed\ProductSet\Persistence\SpyProductSet $productSetEntity
     *
     * @return void
     */
    protected function findOrCreateProductAbstractSet(DataSetInterface $dataSet, SpyProductSet $productSetEntity)
    {
        $productAbstractSkus = explode(',', $dataSet[static::KEY_ABSTRACT_SKUS]);
        $productAbstractSkus = array_map('trim', $productAbstractSkus);

        $position = 0;

        foreach ($productAbstractSkus as $productAbstractSku) {
            $idProductAbstract = $this->productRepository->getIdProductAbstractByAbstractSku($productAbstractSku);

            $productAbstractSetEntity = SpyProductAbstractSetQuery::create()
                ->filterByFkProductSet($productSetEntity->getIdProductSet())
                ->filterByFkProductAbstract($idProductAbstract)
                ->findOneOrCreate();

            $position++;
            $productAbstractSetEntity->setPosition($position);

            if ($productAbstractSetEntity->isNew() || $productAbstractSetEntity->isModified()) {
                $productAbstractSetEntity->save();
            }
        }
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     * @param \Orm\Zed\ProductSet\Persistence\SpyProductSet $productSetEntity
     *
     * @return void
     */
    protected function findOrCreateProductSetData(DataSetInterface $dataSet, SpyProductSet $productSetEntity)
    {
        foreach ($dataSet[LocalizedAttributesExtractorStep::KEY_LOCALIZED_ATTRIBUTES] as $idLocale => $localizedAttributes) {
            $productSetDataEntity = SpyProductSetDataQuery::create()
                ->filterByFkProductSet($productSetEntity->getIdProductSet())
                ->filterByFkLocale($idLocale)
                ->findOneOrCreate();

            $productSetDataEntity
                ->setName($localizedAttributes[static::KEY_NAME])
                ->setDescription($localizedAttributes[static::KEY_DESCRIPTION])
                ->setMetaTitle($localizedAttributes[static::KEY_META_TITLE])
                ->setMetaDescription($localizedAttributes[static::KEY_META_DESCRIPTION])
                ->setMetaKeywords($localizedAttributes[static::KEY_META_KEYWORDS]);

            if ($productSetDataEntity->isNew() || $productSetDataEntity->isModified()) {
                $productSetDataEntity->save();
            }

            $productSetUrlEntity = SpyUrlQuery::create()
                ->filterByFkResourceProductSet($productSetEntity->getIdProductSet())
                ->filterByFkLocale($idLocale)
                ->findOneOrCreate();

            $productSetUrlEntity->setUrl($localizedAttributes[static::KEY_URL]);

            if ($productSetUrlEntity->isNew() || $productSetUrlEntity->isModified()) {
                $productSetUrlEntity->save();
                $this->addSubTouchable(UrlConfig::RESOURCE_TYPE_URL, $productSetUrlEntity->getIdUrl());
            }
        }
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     * @param \Orm\Zed\ProductSet\Persistence\SpyProductSet $productSetEntity
     *
     * @return void
     */
    protected function findOrCreateProductImageSet(DataSetInterface $dataSet, SpyProductSet $productSetEntity)
    {
        foreach ($dataSet[ProductSetImageExtractorStep::KEY_TARGET] as $imageSet) {
            $productImageSetEntity = SpyProductImageSetQuery::create()
                ->filterByFkResourceProductSet($productSetEntity->getIdProductSet())
                ->filterByName($imageSet[static::KEY_IMAGE_SET])
                ->findOneOrCreate();

            if ($productImageSetEntity->isNew() || $productImageSetEntity->isModified()) {
                $productImageSetEntity->save();
            }

            foreach ($imageSet[static::KEY_IMAGES] as $image) {
                $productImageEntity = SpyProductImageQuery::create()
                    ->filterByExternalUrlLarge($image[static::KEY_IMAGE_LARGE])
                    ->findOneOrCreate();

                $productImageEntity->setExternalUrlSmall($image[static::KEY_IMAGE_LARGE]);

                if ($productImageEntity->isNew() || $productImageEntity->isModified()) {
                    $productImageEntity->save();
                }

                $productImageSetToProductImageEntity = SpyProductImageSetToProductImageQuery::create()
                    ->filterByFkProductImage($productImageEntity->getIdProductImage())
                    ->filterByFkProductImageSet($productImageSetEntity->getIdProductImageSet())
                    ->findOneOrCreate();

                $productImageSetToProductImageEntity->setSortOrder(0);

                if ($productImageSetToProductImageEntity->isNew() || $productImageSetToProductImageEntity->isModified()) {
                    $productImageSetToProductImageEntity->save();
                }
            }
        }
    }

}
