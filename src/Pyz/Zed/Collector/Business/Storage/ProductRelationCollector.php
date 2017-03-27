<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Business\Storage;

use Generated\Shared\Transfer\StorageProductAbstractRelationTransfer;
use Generated\Shared\Transfer\StorageProductImageTransfer;
use Generated\Shared\Transfer\StorageProductRelationsTransfer;
use Orm\Zed\ProductRelation\Persistence\Map\SpyProductRelationProductAbstractTableMap;
use Orm\Zed\ProductRelation\Persistence\Map\SpyProductRelationTypeTableMap;
use Orm\Zed\Product\Persistence\Map\SpyProductAbstractLocalizedAttributesTableMap;
use Orm\Zed\Product\Persistence\Map\SpyProductAbstractTableMap;
use Orm\Zed\Url\Persistence\Map\SpyUrlTableMap;
use Pyz\Zed\Collector\Persistence\Storage\Propel\ProductRelationCollectorQuery;
use Spryker\Service\UtilDataReader\UtilDataReaderServiceInterface;
use Spryker\Zed\Collector\Business\Collector\Storage\AbstractStoragePropelCollector;
use Spryker\Zed\Price\Business\PriceFacadeInterface;
use Spryker\Zed\ProductImage\Persistence\ProductImageQueryContainerInterface;
use Spryker\Zed\ProductRelation\Persistence\ProductRelationQueryContainerInterface;
use Spryker\Zed\ProductRelation\ProductRelationConfig;
use Spryker\Zed\Product\Business\ProductFacadeInterface;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class ProductRelationCollector extends AbstractStoragePropelCollector
{

    /**
     * @var \Spryker\Zed\ProductImage\Persistence\ProductImageQueryContainerInterface
     */
    protected $productImageQueryContainer;

    /**
     * @var \Spryker\Zed\Price\Business\PriceFacadeInterface
     */
    protected $priceFacade;

    /**
     * @var \Spryker\Zed\Product\Business\ProductFacadeInterface
     */
    protected $productFacade;

    /**
     * @var \Spryker\Zed\ProductRelation\Persistence\ProductRelationQueryContainerInterface
     */
    protected $productRelationQueryContainer;

    /**
     * @param \Spryker\Service\UtilDataReader\UtilDataReaderServiceInterface $utilDataReaderService
     * @param \Spryker\Zed\ProductImage\Persistence\ProductImageQueryContainerInterface $productImageQueryContainer
     * @param \Spryker\Zed\Product\Business\ProductFacadeInterface $productFacade
     * @param \Spryker\Zed\Price\Business\PriceFacadeInterface $priceFacade
     * @param \Spryker\Zed\ProductRelation\Persistence\ProductRelationQueryContainerInterface $productRelationQueryContainer
     */
    public function __construct(
        UtilDataReaderServiceInterface $utilDataReaderService,
        ProductImageQueryContainerInterface $productImageQueryContainer,
        ProductFacadeInterface $productFacade,
        PriceFacadeInterface $priceFacade,
        ProductRelationQueryContainerInterface $productRelationQueryContainer
    ) {
        $this->productImageQueryContainer = $productImageQueryContainer;
        $this->priceFacade = $priceFacade;
        $this->productFacade = $productFacade;
        $this->productRelationQueryContainer = $productRelationQueryContainer;

        parent::__construct($utilDataReaderService);
    }

    /**
     * @param string $touchKey
     * @param array $collectItemData
     *
     * @return array
     */
    protected function collectItem($touchKey, array $collectItemData)
    {
        $relatedProductIds = explode(',', $collectItemData[ProductRelationCollectorQuery::PRODUCT_RELATIONS]);

        $results = [];
        foreach ($relatedProductIds as $idProductRelation) {
            $relationProducts = $this->findRelationProducts($idProductRelation);

            foreach ($relationProducts as $relationProduct) {
                if (!isset($results[$relationProduct[SpyProductRelationTypeTableMap::COL_KEY]])) {
                    $results[$relationProduct[SpyProductRelationTypeTableMap::COL_KEY]] = [
                        StorageProductRelationsTransfer::ABSTRACT_PRODUCTS => [],
                        StorageProductRelationsTransfer::IS_ACTIVE => $collectItemData[ProductRelationCollectorQuery::IS_ACTIVE],
                    ];
                }
                $results[$relationProduct[SpyProductRelationTypeTableMap::COL_KEY]][StorageProductRelationsTransfer::ABSTRACT_PRODUCTS][] = $this->mapProductRelation($relationProduct);
            }
        }

        return $results;
    }

    /**
     * @param array $relationProduct
     *
     * @return array
     */
    protected function mapProductRelation(array $relationProduct)
    {
        return [
            StorageProductAbstractRelationTransfer::NAME => $relationProduct[SpyProductAbstractLocalizedAttributesTableMap::COL_NAME],
            StorageProductAbstractRelationTransfer::PRICE => $this->getPriceBySku($relationProduct[SpyProductAbstractTableMap::COL_SKU]),
            StorageProductAbstractRelationTransfer::SKU => $relationProduct[SpyProductAbstractTableMap::COL_SKU],
            StorageProductAbstractRelationTransfer::URL => $relationProduct[SpyUrlTableMap::COL_URL],
            StorageProductAbstractRelationTransfer::ORDER => $relationProduct[SpyProductRelationProductAbstractTableMap::COL_ORDER],
            StorageProductAbstractRelationTransfer::IMAGE_SETS => $this->generateProductAbstractImageSets(
                $relationProduct[SpyProductAbstractTableMap::COL_ID_PRODUCT_ABSTRACT]
            ),
        ];
    }

    /**
     * @param int $idProductRelation
     *
     * @return array|mixed|\Orm\Zed\Cms\Persistence\SpyCmsBlock[]|\Propel\Runtime\ActiveRecord\ActiveRecordInterface[]|\Propel\Runtime\Collection\ObjectCollection
     */
    protected function findRelationProducts($idProductRelation)
    {
        return $this->productRelationQueryContainer
            ->queryProductRelationProductAbstractByIdProductRelation($idProductRelation)
                ->useSpyProductRelationQuery()
                ->joinSpyProductRelationType()
            ->endUse()
            ->useSpyProductAbstractQuery()
                ->useSpyProductAbstractLocalizedAttributesQuery()
                    ->filterByFkLocale($this->locale->getIdLocale())
                ->endUse()
                ->joinSpyUrl()
                ->useSpyUrlQuery()
                    ->filterByFkLocale($this->locale->getIdLocale())
                ->endUse()
            ->endUse()
            ->select([
                SpyProductAbstractTableMap::COL_SKU,
                SpyProductAbstractTableMap::COL_ID_PRODUCT_ABSTRACT,
                SpyProductAbstractLocalizedAttributesTableMap::COL_NAME,
                SpyProductRelationProductAbstractTableMap::COL_ORDER,
                SpyUrlTableMap::COL_URL,
                SpyProductRelationTypeTableMap::COL_KEY,
            ])
            ->find();
    }

    /**
     * @param string $sku
     *
     * @return int
     */
    protected function getPriceBySku($sku)
    {
        return $this->priceFacade->getPriceBySku($sku);
    }

    /**
     * @param int $idProductAbstract
     *
     * @return array
     */
    protected function generateProductAbstractImageSets($idProductAbstract)
    {
        $imageSets = $this->productImageQueryContainer
            ->queryImageSetByProductAbstractId($idProductAbstract)
            ->find();

        $result = [];
        foreach ($imageSets as $imageSetEntity) {
            $result[$imageSetEntity->getName()] = [];
            foreach ($imageSetEntity->getSpyProductImageSetToProductImages() as $productsToImageEntity) {
                $imageEntity = $productsToImageEntity->getSpyProductImage();
                $result[$imageSetEntity->getName()][] = [
                    StorageProductImageTransfer::ID_PRODUCT_IMAGE => $imageEntity->getIdProductImage(),
                    StorageProductImageTransfer::EXTERNAL_URL_LARGE => $imageEntity->getExternalUrlLarge(),
                    StorageProductImageTransfer::EXTERNAL_URL_SMALL => $imageEntity->getExternalUrlSmall(),
                ];
            }
        }

        return $result;
    }

    /**
     * @return string
     */
    protected function collectResourceType()
    {
        return ProductRelationConfig::RESOURCE_TYPE_PRODUCT_RELATION;
    }

}
