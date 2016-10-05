<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\Collector\Business\Storage;

use Orm\Zed\Product\Persistence\Base\SpyProductAttributeKeyQuery;
use Orm\Zed\Product\Persistence\SpyProductQuery;
use Propel\Runtime\ActiveQuery\Criteria;
use Spryker\Shared\Product\ProductConstants;
use Spryker\Zed\Collector\Business\Collector\Storage\AbstractStoragePropelCollector;

class AttributeMapCollector extends AbstractStoragePropelCollector
{

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Product attribute map';
    }

    /**
     * @param string $touchKey
     * @param array $collectItemData
     *
     * @return array
     */
    protected function collectItem($touchKey, array $collectItemData)
    {
        $idProductAbstract = $collectItemData['id_product_abstract'];

        $concreteProducts = SpyProductQuery::create()
            ->filterByFkProductAbstract($idProductAbstract)
            ->find();

        $productAttributes = [];
        $uniqueAttributes = [];
        foreach ($concreteProducts as $product) {
            $cAttributes = json_decode($product->getAttributes(), true);
            $productAttributes[$product->getIdProduct()] = $cAttributes;

            foreach ($cAttributes as $key => $value) {
                if (isset($uniqueAttributes[$key])) {
                    continue;
                }

                $uniqueAttributes[$key] = true;
            }
        }


        $attributesCollection = SpyProductAttributeKeyQuery::create()
            ->useSpyProductManagementAttributeQuery()
              ->filterByIsSuper(true)
            ->endUse()
            ->filterByKey(array_keys($uniqueAttributes), Criteria::IN)
            ->find();


        $sAttributes = [];
        foreach ($attributesCollection as $attribute) {
            $sAttributes[$attribute->getKey()] = true;
        }

        $productSuperAttributes = [];
        $superAttributes = [];
        foreach ($productAttributes as $productId => $attributes) {
            foreach ($attributes as $key => $value) {
                if (isset($sAttributes[$key])) {
                    $productSuperAttributes[$productId][$key] = $value;
                    if (!isset($superAttributes[$key]) || !in_array($value, $superAttributes[$key])) {
                        $superAttributes[$key][] = $value;
                    }
                }
            }
        }

        $attributePermutations = [];
        foreach ($productSuperAttributes as $productId => $attributes) {
            $attributePermutations = array_merge_recursive(
                $attributePermutations,
                $this->buildProductPermutations($attributes, $productId)
            );
        }

        return [
            'attribute_variants' => $attributePermutations,
            'super_attributes' => $superAttributes,
        ];
    }

    /**
     * @param array $attributes
     * @param int $idProductConcrete
     * @param array $permutations
     *
     * @return array
     */
    public function buildProductPermutations(array $attributes, $idProductConcrete, array $permutations = []) {
        if (empty($attributes)) {
            $result = ['idProductConcrete' => $idProductConcrete]; //set last node to idProduct
        }  else {
            $result = [];

            $index = 0;
            foreach ($attributes as $key => $permutation) {
                $newitems = $attributes;
                $newperms = $permutations;

                $newperms[] = array_splice($newitems, $index++, 1);

                $recurseResult = $this->buildProductPermutations($newitems, $idProductConcrete, $newperms);
                if (is_array($recurseResult)) {
                    $recurseResult = array_merge($result, $recurseResult);
                }

                $result[$key . ':' . $permutation] = $recurseResult;
            }
        }
        return $result;
    }


    /**
     * @return string
     */
    protected function collectResourceType()
    {
        return ProductConstants::RESOURCE_TYPE_ATTRIBUTE_MAP;
    }

}
