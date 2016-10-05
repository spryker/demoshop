<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Yves\Product\Builder;

use Pyz\Yves\Product\Model\ProductAbstract;
use Spryker\Client\Product\ProductClientInterface;

class AttributeVariantBuilder implements AttributeVariantBuilderInterface
{
    const ID_PRODUCT_CONCRETE = 'idProductConcrete';

    /**
     * @var \Spryker\Client\Product\ProductClientInterface
     */
    protected $productClient;

    /**
     * @param \Spryker\Client\Product\ProductClientInterface $productClient
     */
    public function __construct(ProductClientInterface $productClient)
    {
        $this->productClient = $productClient;
    }

    /**
     * @param array $selectedAttributes
     * @param \Pyz\Yves\Product\Model\ProductAbstract $productAbstract
     *
     * @return ProductAbstract
     */
    public function buildAttributeVariants(array $selectedAttributes, ProductAbstract $productAbstract)
    {
        $attributeMap = $this->productClient
            ->getAttributeMapByIdProductAbstractForCurrectLocale($productAbstract->getId());

        $productAbstract->setSuperAttributes($attributeMap['super_attributes']);

        if (count($selectedAttributes) === 0) {
            return;
        }

        $selectedVariantNode = $this->buildAttributeMapFromSelected(
            $selectedAttributes,
            $attributeMap['attribute_variants']
        );

        if ($this->isProductConcreteNode($selectedVariantNode)) {
            $idProductConcrete = $this->extractIdOfProductConcrete($selectedVariantNode);
            $productConcrete = $this->getProductConcreteData($idProductConcrete);
            $productAbstract->setName($productConcrete['name']);
            $productAbstract->setPrice($productConcrete['price']);
            return;
        }

        $productAbstract->setAvailableAttributes(
            $this->findAvailableAttributes($selectedVariantNode)
        );

        return $productAbstract;
    }

    /**
     * @param int $idProductConcrete
     *
     * @return array
     */
    protected function getProductConcreteData($idProductConcrete)
    {
        return $this->productClient->getProductConcreteByIdForCurrentLocale($idProductConcrete);
    }

    /**
     * @param array $selectedAttributes
     * @param array $attributeVariants
     *
     * @return array
     */
    protected function buildAttributeMapFromSelected(array $selectedAttributes, array $attributeVariants)
    {
        ksort($selectedAttributes);

        $attributePath = $this->buildAttributePath($selectedAttributes);

        return $this->findSelectedNode($attributeVariants, $attributePath);
    }

    /**
     * @param array $selectedNode
     *
     * @return array
     */
    protected function findAvailableAttributes(array $selectedNode)
    {
        static $filteredAttributes = [];

        foreach ($selectedNode as $attributePath => $attributeValue) {
            list($key, $value) = explode(':', $attributePath);
            $filteredAttributes[$key][] = $value;
            if (is_array($value)) {
                return $this->findAvailableAttributes($value);
            }
        }

        return $filteredAttributes;
    }

    /**
     * @param array $attributeMap
     * @param array $selectedAttributes
     *
     * @return array
     */
    protected function findSelectedNode(array $attributeMap, array $selectedAttributes)
    {
        static $selectedNode = [];

        $selectedKey = array_shift($selectedAttributes);
        foreach ($attributeMap as $variantKey => $variant) {
            if ($variantKey != $selectedKey) {
                continue;
            }

            $selectedNode = $variant;
            return $this->findSelectedNode($variant, $selectedAttributes);
        }

        if (count($selectedAttributes) > 0) {
            $this->findSelectedNode($attributeMap, $selectedAttributes);
        }

        return $selectedNode;
    }

    /**
     * @param array $selectedVariantNode
     *
     * @return bool
     */
    protected function isProductConcreteNode(array $selectedVariantNode)
    {
        return isset($selectedVariantNode[self::ID_PRODUCT_CONCRETE]);
    }

    /**
     * @param array $selectedVariantNode
     *
     * @return int
     */
    protected function extractIdOfProductConcrete(array $selectedVariantNode)
    {
        if (is_array($selectedVariantNode[self::ID_PRODUCT_CONCRETE])) {
            return array_shift($selectedVariantNode[self::ID_PRODUCT_CONCRETE]);
        }

        return $selectedVariantNode[self::ID_PRODUCT_CONCRETE];
    }

    /**
     * @param array $selectedAttributes
     *
     * @return array
     */
    protected function buildAttributePath(array $selectedAttributes)
    {
        $attributePath = [];
        foreach ($selectedAttributes as $attributeName => $attributeValue) {
            if (!$attributeValue) {
                continue;
            }

            $attributePath[] = $attributeName . ':' . $attributeValue;
        }
        return $attributePath;
    }

}
