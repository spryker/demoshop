<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Product\Mapper;

use Generated\Shared\Transfer\StorageAttributeMapTransfer;
use Generated\Shared\Transfer\StorageProductTransfer;
use Spryker\Client\Product\ProductClientInterface;
use Spryker\Shared\Product\ProductConfig;

class AttributeVariantMapper implements AttributeVariantMapperInterface
{
    /**
     * @var \Spryker\Client\Product\ProductClientInterface
     */
    protected $productClient;

    /**
     * @var array
     */
    protected $attributeMap = [];

    /**
     * @param \Spryker\Client\Product\ProductClientInterface $productClient
     */
    public function __construct(ProductClientInterface $productClient)
    {
        $this->productClient = $productClient;
    }

    /**
     * @param \Generated\Shared\Transfer\StorageProductTransfer $storageProductTransfer
     *
     * @return \Generated\Shared\Transfer\StorageProductTransfer
     */
    public function setSuperAttributes(StorageProductTransfer $storageProductTransfer)
    {
        $attributeMap = $this->getAttributeMapFromStorage($storageProductTransfer->getIdProductAbstract());
        if (count($attributeMap) === 0) {
            return $storageProductTransfer;
        }

        $storageAttributeMapTransfer = $this->mapStorageAttributeMap($attributeMap);
        if (count($storageAttributeMapTransfer->getProductConcreteIds()) === 1 || count($storageAttributeMapTransfer->getSuperAttributes()) === 0) {
            return $this->getFirstProductVariant($storageProductTransfer, $storageAttributeMapTransfer);
        }

        $storageProductTransfer->setSuperAttributes(
            $storageAttributeMapTransfer->getSuperAttributes()
        );

        return $storageProductTransfer;
    }

    /**
     * @param array $selectedAttributes
     * @param \Generated\Shared\Transfer\StorageProductTransfer $storageProductTransfer
     *
     * @return \Generated\Shared\Transfer\StorageProductTransfer
     */
    public function setSelectedVariants(array $selectedAttributes, StorageProductTransfer $storageProductTransfer)
    {
        $selectedVariantNode = $this->getSelectedVariantNode($selectedAttributes, $storageProductTransfer->getIdProductAbstract());

        if ($this->isProductConcreteNodeReached($selectedVariantNode)) {
            $idProductConcrete = $this->extractIdOfProductConcrete($selectedVariantNode);
            return $this->mergeAbstractAndConcreteProducts($idProductConcrete, $storageProductTransfer);
        }

        return $this->setAvailableAttributes($selectedVariantNode, $storageProductTransfer);
    }

    /**
     * @param array $selectedAttributes
     * @param int $idProductAbstract
     *
     * @return array
     */
    protected function getSelectedVariantNode(array $selectedAttributes, $idProductAbstract)
    {
        $attributeMap = $this->getAttributeMapFromStorage($idProductAbstract);

        if (count($attributeMap) === 0) {
            return [];
        }

        $storageAttributeMapTransfer = $this->mapStorageAttributeMap($attributeMap);

        return $this->buildAttributeMapFromSelected(
            $selectedAttributes,
            $storageAttributeMapTransfer->getAttributeVariants()
        );
    }

    /**
     * @param int $idProductConcrete
     * @param \Generated\Shared\Transfer\StorageProductTransfer $storageProductTransfer
     *
     * @return \Generated\Shared\Transfer\StorageProductTransfer
     */
    protected function mergeAbstractAndConcreteProducts(
        $idProductConcrete,
        StorageProductTransfer $storageProductTransfer
    ) {

        $productConcrete = $this->getProductConcreteFromStorage($idProductConcrete);

        if (count($productConcrete) === 0) {
            return $storageProductTransfer;
        }

        return $this->mapVariantStorageProductTransfer($storageProductTransfer, $productConcrete);
    }

    /**
     * @param array $selectedVariantNode
     *
     * @return bool
     */
    protected function isProductConcreteNodeReached(array $selectedVariantNode)
    {
        return isset($selectedVariantNode[ProductConfig::VARIANT_LEAF_NODE_ID]);
    }

    /**
     * @param array $selectedVariantNode
     * @param \Generated\Shared\Transfer\StorageProductTransfer $storageProductTransfer
     *
     * @return \Generated\Shared\Transfer\StorageProductTransfer
     */
    protected function setAvailableAttributes(array $selectedVariantNode, StorageProductTransfer $storageProductTransfer)
    {
        $storageProductTransfer->setAvailableAttributes($this->findAvailableAttributes($selectedVariantNode));

        return $storageProductTransfer;
    }

    /**
     * @param int $idProductConcrete
     *
     * @return array
     */
    protected function getProductConcreteFromStorage($idProductConcrete)
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
     * @param array $filteredAttributes
     *
     * @return array
     */
    protected function findAvailableAttributes(array $selectedNode, array $filteredAttributes = [])
    {
        foreach (array_keys($selectedNode) as $attributePath) {
            list($key, $value) = explode(ProductConfig::ATTRIBUTE_MAP_PATH_DELIMITER, $attributePath);
            $filteredAttributes[$key][] = $value;
            if (is_array($value)) {
                return $this->findAvailableAttributes($value, $filteredAttributes);
            }
        }

        return $filteredAttributes;
    }

    /**
     * @param array $attributeMap
     * @param array $selectedAttributes
     * @param array $selectedNode
     *
     * @return array
     */
    protected function findSelectedNode(array $attributeMap, array $selectedAttributes, array $selectedNode = [])
    {
        $selectedKey = array_shift($selectedAttributes);
        foreach ($attributeMap as $variantKey => $variant) {
            if ($variantKey !== $selectedKey) {
                continue;
            }

            return $this->findSelectedNode($variant, $selectedAttributes, $variant);
        }

        if (count($selectedAttributes) > 0) {
            return $this->findSelectedNode($attributeMap, $selectedAttributes, $selectedNode);
        }

        return $selectedNode;
    }

    /**
     * @param array $selectedVariantNode
     *
     * @return int
     */
    protected function extractIdOfProductConcrete(array $selectedVariantNode)
    {
        if (is_array($selectedVariantNode[ProductConfig::VARIANT_LEAF_NODE_ID])) {
            return array_shift($selectedVariantNode[ProductConfig::VARIANT_LEAF_NODE_ID]);
        }

        return $selectedVariantNode[ProductConfig::VARIANT_LEAF_NODE_ID];
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

            $attributePath[] = $attributeName . ProductConfig::ATTRIBUTE_MAP_PATH_DELIMITER . $attributeValue;
        }
        return $attributePath;
    }

    /**
     * @param int $idProductAbstract
     *
     * @return array
     */
    protected function getAttributeMapFromStorage($idProductAbstract)
    {
        if (!isset($this->attributeMap[$idProductAbstract])) {
            $this->attributeMap[$idProductAbstract] = $this->productClient->getAttributeMapByIdProductAbstractForCurrentLocale($idProductAbstract);
        }

        return $this->attributeMap[$idProductAbstract];
    }

    /**
     * @param \Generated\Shared\Transfer\StorageProductTransfer $storageProductTransfer
     * @param array $productConcrete
     *
     * @return \Generated\Shared\Transfer\StorageProductTransfer;
     */
    protected function mapVariantStorageProductTransfer(StorageProductTransfer $storageProductTransfer, array $productConcrete)
    {
        $storageProductTransfer->fromArray($productConcrete, true);
        $storageProductTransfer->setIsVariant(true);

        return $storageProductTransfer;
    }

    /**
     * @param array $attributeMap
     *
     * @return \Generated\Shared\Transfer\StorageAttributeMapTransfer
     */
    protected function mapStorageAttributeMap(array $attributeMap)
    {
        $storageAttributeMapTransfer = new StorageAttributeMapTransfer();
        $storageAttributeMapTransfer->fromArray($attributeMap, true);

        return $storageAttributeMapTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\StorageProductTransfer $storageProductTransfer
     * @param \Generated\Shared\Transfer\StorageAttributeMapTransfer $storageAttributeMapTransfer
     *
     * @return \Generated\Shared\Transfer\StorageProductTransfer
     */
    protected function getFirstProductVariant(
        StorageProductTransfer $storageProductTransfer,
        StorageAttributeMapTransfer $storageAttributeMapTransfer
    ) {
        $productConcreteIds = $storageAttributeMapTransfer->getProductConcreteIds();
        $idProductConcrete = array_shift($productConcreteIds);
        $productConcrete = $this->getProductConcreteFromStorage($idProductConcrete);

        if (count($productConcrete) === 0) {
            return $storageProductTransfer;
        }

        return $this->mapVariantStorageProductTransfer($storageProductTransfer, $productConcrete);
    }
}
