<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Business\Storage;

use Generated\Shared\Transfer\RawProductAttributesTransfer;

use Generated\Shared\Transfer\StorageAttributeMapTransfer;
use Orm\Zed\Product\Persistence\Base\SpyProductAttributeKeyQuery;
use Orm\Zed\Product\Persistence\Map\SpyProductAttributeKeyTableMap;
use Orm\Zed\Product\Persistence\Map\SpyProductLocalizedAttributesTableMap;
use Orm\Zed\Product\Persistence\Map\SpyProductTableMap;
use Orm\Zed\Product\Persistence\SpyProductQuery;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\Map\TableMap;
use Pyz\Zed\Collector\Persistence\Storage\Propel\AttributeMapCollectorQuery;
use Spryker\Service\UtilDataReader\UtilDataReaderServiceInterface;
use Spryker\Shared\Product\ProductConfig;
use Spryker\Zed\Collector\Business\Collector\Storage\AbstractStoragePropelCollector;
use Spryker\Zed\Product\Business\ProductFacadeInterface;

class AttributeMapCollector extends AbstractStoragePropelCollector
{

    /**
     * @var \Spryker\Zed\Product\Business\ProductFacadeInterface
     */
    protected $productFacade;

    /**
     * @param \Spryker\Service\UtilDataReader\UtilDataReaderServiceInterface $utilDataReaderService
     * @param \Spryker\Zed\Product\Business\ProductFacadeInterface $productFacade
     */
    public function __construct(UtilDataReaderServiceInterface $utilDataReaderService, ProductFacadeInterface $productFacade)
    {
        parent::__construct($utilDataReaderService);

        $this->productFacade = $productFacade;
    }

    /**
     * @param string $touchKey
     * @param array $collectItemData
     *
     * @return array
     */
    protected function collectItem($touchKey, array $collectItemData)
    {
        $idProductAbstract = $collectItemData[AttributeMapCollectorQuery::ID_PRODUCT_ABSTRACT];

        $concreteProducts = $this->getConcreteProducts($idProductAbstract);
        $concreteProductIds = $this->filterConcreteProductIds($concreteProducts);
        $productAttributes = $this->getProductAttributes($concreteProducts);
        $superAttributes = $this->getSuperAttributes($productAttributes);

        if (count($superAttributes) < 1) {
            return $this->createStorageImport($concreteProductIds);
        }

        $productConcreteSuperAttributes = [];
        $superAttributeVariations = [];
        foreach ($productAttributes as $idProductConcrete => $attributes) {
            foreach ($attributes as $key => $value) {
                if (!isset($superAttributes[$key])) {
                    continue;
                }

                $productConcreteSuperAttributes[$idProductConcrete][$key] = $value;
                if (!isset($superAttributeVariations[$key]) || !in_array($value, $superAttributeVariations[$key])) {
                    $superAttributeVariations[$key][] = $value;
                }
            }
        }

        return $this->createStorageImport(
            $concreteProductIds,
            $superAttributeVariations,
            $this->buildProductVariants($productConcreteSuperAttributes)
        );
    }

    /**
     * @param array $concreteProductIds
     * @param array $superAttributes
     * @param array $attributeVariants
     *
     * @return array
     */
    protected function createStorageImport(
        array $concreteProductIds,
        array $superAttributes = [],
        array $attributeVariants = []
    ) {
        return [
            StorageAttributeMapTransfer::PRODUCT_CONCRETE_IDS => $concreteProductIds,
            StorageAttributeMapTransfer::SUPER_ATTRIBUTES => $superAttributes,
            StorageAttributeMapTransfer::ATTRIBUTE_VARIANTS => $attributeVariants,
        ];
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Product attribute map';
    }

    /**
     * @return string
     */
    protected function collectResourceType()
    {
        return ProductConfig::RESOURCE_TYPE_ATTRIBUTE_MAP;
    }

    /**
     * @param int $idProductAbstract
     *
     * @return \Orm\Zed\Product\Persistence\SpyProduct[]|\Propel\Runtime\Collection\ObjectCollection
     */
    protected function getConcreteProducts($idProductAbstract)
    {
        return SpyProductQuery::create()
            ->select([
                SpyProductTableMap::COL_ID_PRODUCT,
                SpyProductTableMap::COL_ATTRIBUTES,
            ])
            ->withColumn(SpyProductLocalizedAttributesTableMap::COL_ATTRIBUTES, 'localized_attributes')
            ->useSpyProductLocalizedAttributesQuery()
                ->filterByFkLocale($this->locale->getIdLocale())
            ->endUse()
            ->filterByFkProductAbstract($idProductAbstract)
            ->filterByIsActive(true)
            ->find()
            ->toArray(null, false, TableMap::TYPE_CAMELNAME);
    }

    /**
     * @param array $concreteProducts
     *
     * @return array
     */
    protected function getProductAttributes(array $concreteProducts)
    {
        $productAttributes = [];
        foreach ($concreteProducts as $concreteProduct) {
            $concreteAttributes = $this->productFacade
                ->decodeProductAttributes($concreteProduct[SpyProductTableMap::COL_ATTRIBUTES]);

            $concreteLocalizedAttributes = $this->productFacade
                ->decodeProductAttributes($concreteProduct['localized_attributes']);

            $rawProductAttributesTransfer = new RawProductAttributesTransfer();
            $rawProductAttributesTransfer
                ->setConcreteAttributes($concreteAttributes)
                ->setConcreteLocalizedAttributes($concreteLocalizedAttributes);

            $idConcreteProduct = $concreteProduct[SpyProductTableMap::COL_ID_PRODUCT];
            $productAttributes[$idConcreteProduct] = $this->productFacade->combineRawProductAttributes($rawProductAttributesTransfer);
        }

        return $productAttributes;
    }

    /**
     * @param array $productAttributes
     *
     * @return array
     */
    protected function getSuperAttributes(array $productAttributes)
    {
        $uniqueAttributeKeys = $this->filterUniqueAttributeKeys($productAttributes);

        $superAttributes = SpyProductAttributeKeyQuery::create()
            ->select(SpyProductAttributeKeyTableMap::COL_KEY)
            ->filterByIsSuper(true)
            ->filterByKey(array_keys($uniqueAttributeKeys), Criteria::IN)
            ->find()
            ->toArray();

        $superAttributes = array_flip($superAttributes);

        return $superAttributes;
    }

    /**
     * @param array $productAttributes
     *
     * @return array
     */
    protected function filterUniqueAttributeKeys(array $productAttributes)
    {
        $uniqueAttributes = [];
        foreach ($productAttributes as $attributes) {
            foreach (array_keys($attributes) as $key) {
                if (isset($uniqueAttributes[$key])) {
                    continue;
                }

                $uniqueAttributes[$key] = true;
            }
        }
        return $uniqueAttributes;
    }

    /**
     * @param array $productSuperAttributes
     *
     * @return array
     */
    protected function buildProductVariants(array $productSuperAttributes)
    {
        $attributeVariants = [];
        if (count($productSuperAttributes) > 1) {
            foreach ($productSuperAttributes as $productId => $attributes) {
                $attributeVariants = array_merge_recursive(
                    $attributeVariants,
                    $this->productFacade->generateAttributePermutations($attributes, $productId)
                );
            }
        }

        return $attributeVariants;
    }

    /**
     * @param array $concreteProducts
     *
     * @return array
     */
    protected function filterConcreteProductIds(array $concreteProducts)
    {
        $concreteProductIds = array_map(function ($product) {
            return $product[SpyProductTableMap::COL_ID_PRODUCT];
        }, $concreteProducts);

        sort($concreteProductIds);

        return $concreteProductIds;
    }

}
