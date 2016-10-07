<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\Collector\Business\Storage;

use Generated\Shared\Transfer\StorageAttributeMapTransfer;
use Generated\Shared\Transfer\StorageProductTransfer;
use Orm\Zed\Product\Persistence\Base\SpyProductAttributeKeyQuery;
use Orm\Zed\Product\Persistence\Map\SpyProductAttributeKeyTableMap;
use Orm\Zed\Product\Persistence\Map\SpyProductTableMap;
use Orm\Zed\Product\Persistence\SpyProductQuery;
use Propel\Runtime\ActiveQuery\Criteria;
use Pyz\Zed\Collector\Persistence\Storage\Propel\AttributeMapCollectorQuery;
use Spryker\Shared\Library\Json;
use Spryker\Shared\Product\ProductConstants;
use Spryker\Zed\Collector\Business\Collector\Storage\AbstractStoragePropelCollector;

class AttributeMapCollector extends AbstractStoragePropelCollector
{

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

        $concreteProductIds = array_keys($productConcreteSuperAttributes);

        sort($concreteProductIds);

        return [
            StorageAttributeMapTransfer::ATTRIBUTE_VARIANTS => $this->buildProductVariants($productConcreteSuperAttributes),
            StorageAttributeMapTransfer::SUPER_ATTRIBUTES => $superAttributeVariations,
            StorageAttributeMapTransfer::PRODUCT_CONCRETE_IDS => array_keys($concreteProductIds),
        ];
    }

    /**
     * @param array $superAttributes
     * @param int $idProductConcrete
     * @param array $variants
     *
     * @return array
     */
    public function buildAttributeVariants(array $superAttributes, $idProductConcrete, array $variants = [])
    {
        if (empty($superAttributes)) {
            $result = [
                StorageProductTransfer::ID => $idProductConcrete //set leaf node to id of concrete product
            ];
        }  else {
            $result = [];

            $index = 0;
            foreach ($superAttributes as $key => $value) {
                $newAttributes = $superAttributes;
                $newVariants = $variants;

                $newVariants[] = array_splice($newAttributes, $index++, 1);

                $recurseResult = $this->buildAttributeVariants($newAttributes, $idProductConcrete, $newVariants);
                if (is_array($recurseResult)) {
                    $recurseResult = array_merge($result, $recurseResult);
                }

                $result[$key . ProductConstants::ATTRIBUTE_MAP_PATH_DELIMITER . $value] = $recurseResult;
            }
        }
        return $result;
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
            ->find()
            ->toArray();
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
                    $this->buildAttributeVariants($attributes, $productId)
                );
            }
        }

        return $attributeVariants;

    }

}
