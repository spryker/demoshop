<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\Collector\Business\Storage;

use Generated\Shared\Transfer\StorageAttributeMapTransfer;
use Orm\Zed\Product\Persistence\Base\SpyProductAttributeKeyQuery;
use Orm\Zed\Product\Persistence\Map\SpyProductAttributeKeyTableMap;
use Orm\Zed\Product\Persistence\Map\SpyProductTableMap;
use Orm\Zed\Product\Persistence\SpyProductQuery;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\Map\TableMap;
use Pyz\Zed\Collector\Persistence\Storage\Propel\AttributeMapCollectorQuery;
use Spryker\Shared\Library\Json;
use Spryker\Shared\Product\ProductConstants;
use Spryker\Zed\Collector\Business\Collector\Storage\AbstractStoragePropelCollector;
use Spryker\Zed\Product\Business\ProductFacadeInterface;

class AttributeMapCollector extends AbstractStoragePropelCollector
{
    /**
     * @var \Spryker\Zed\Product\Business\ProductFacadeInterface
     */
    protected $productFacade;

    /**
     * @param \Spryker\Zed\Product\Business\ProductFacadeInterface $productFacade
     */
    public function __construct(ProductFacadeInterface $productFacade)
    {
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
        $productAttributes = $this->getProductAttributes($concreteProducts);
        $superAttributes = $this->getSuperAttributes($productAttributes);

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

        $concreteProductIds = $this->filterConcreteProductIds($concreteProducts);

        return [
            StorageAttributeMapTransfer::ATTRIBUTE_VARIANTS => $this->buildProductVariants($productConcreteSuperAttributes),
            StorageAttributeMapTransfer::SUPER_ATTRIBUTES => $superAttributeVariations,
            StorageAttributeMapTransfer::PRODUCT_CONCRETE_IDS => $concreteProductIds,
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
        return ProductConstants::RESOURCE_TYPE_ATTRIBUTE_MAP;
    }

    /**
     * @param int $idProductAbstract
     *
     * @return \Orm\Zed\Product\Persistence\SpyProduct[]|\Propel\Runtime\Collection\ObjectCollection
     */
    protected function getConcreteProducts($idProductAbstract)
    {
        return SpyProductQuery::create()
            ->select([SpyProductTableMap::COL_ATTRIBUTES, SpyProductTableMap::COL_ID_PRODUCT])
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
            $idConcreteProduct = $concreteProduct[SpyProductTableMap::COL_ID_PRODUCT];
            $productAttributes[$idConcreteProduct] = Json::decode(
                $concreteProduct[SpyProductTableMap::COL_ATTRIBUTES],
                true
            );
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
        foreach ($productAttributes as $idProductConcrete => $attributes) {
            foreach ($attributes as $key => $value) {
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
