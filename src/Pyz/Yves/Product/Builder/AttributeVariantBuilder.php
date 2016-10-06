<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Yves\Product\Builder;

use Generated\Shared\Transfer\StorageAttributeMapTransfer;
use Generated\Shared\Transfer\StorageProductTransfer;
use Spryker\Client\Product\ProductClientInterface;
use Spryker\Shared\Product\ProductConstants;

class AttributeVariantBuilder implements AttributeVariantBuilderInterface
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
     * @param StorageProductTransfer $storageProductTransfer
     *
     * @return StorageProductTransfer
     */
    public function setSuperAttributes(StorageProductTransfer $storageProductTransfer)
    {
        $attributeMap = $this->getAttributeMapFromStorage($storageProductTransfer->getId());
        if (count($attributeMap) === 0) {
            return $storageProductTransfer;
        }

        $storageAttributeMapTransfer = $this->mapStorageAttributeMap($attributeMap);
        if (count($storageAttributeMapTransfer->getProductConcreteIds()) === 1) {
            $productConcreteIds = $storageAttributeMapTransfer->getProductConcreteIds();
            $idProductConcrete = array_shift($productConcreteIds);
            $productConcrete = $this->getProductConcreteFromStorage($idProductConcrete);
            return $this->mapConcreteStorageProductTransfer($storageProductTransfer, $productConcrete);
        }

        $storageProductTransfer->setSuperAttributes(
            $storageAttributeMapTransfer->getSuperAttributes()
        );

        return $storageProductTransfer;
    }

    /**
     * @param array $selectedAttributes
     * @param int $idProductAbstract
     *
     * @return array
     */
    public function getSelectedVariantNode(array $selectedAttributes, $idProductAbstract)
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
    public function mergeAbstractAndConcreteProducts(
        $idProductConcrete,
        StorageProductTransfer $storageProductTransfer
    ) {

        $productConcrete = $this->getProductConcreteFromStorage($idProductConcrete);

        if (count($productConcrete) === 0) {
            return $storageProductTransfer;
        }

        return $this->mapConcreteStorageProductTransfer($storageProductTransfer, $productConcrete);
    }

    /**
     * @param array $selectedVariantNode
     *
     * @return bool
     */
    public function isProductConcreteNodeReached(array $selectedVariantNode)
    {
        return isset($selectedVariantNode[StorageProductTransfer::ID]);
    }

    /**
     * @param array $selectedVariantNode
     * @param StorageProductTransfer $storageProductTransfer
     *
     * @return StorageProductTransfer
     */
    public function setAvailableAttributes(array $selectedVariantNode, StorageProductTransfer $storageProductTransfer)
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
     *
     * @return array
     */
    protected function findAvailableAttributes(array $selectedNode)
    {
        static $filteredAttributes = [];

        foreach ($selectedNode as $attributePath => $attributeValue) {
            list($key, $value) = explode(ProductConstants::ATTRIBUTE_MAP_PATH_DELIMITER, $attributePath);
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
     * @return int
     */
    public function extractIdOfProductConcrete(array $selectedVariantNode)
    {
        if (is_array($selectedVariantNode[StorageProductTransfer::ID])) {
            return array_shift($selectedVariantNode[StorageProductTransfer::ID]);
        }

        return $selectedVariantNode[StorageProductTransfer::ID];
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

            $attributePath[] = $attributeName . ProductConstants::ATTRIBUTE_MAP_PATH_DELIMITER . $attributeValue;
        }
        return $attributePath;
    }

    /**
     *
     * @param int $idProductConcrete
     *
     * @return array
     */
    protected function getAttributeMapFromStorage($idProductConcrete)
    {
        if (!isset($this->attributeMap[$idProductConcrete])) {
            $this->attributeMap[$idProductConcrete] = $this->productClient->getAttributeMapByIdProductAbstractForCurrectLocale($idProductConcrete);
        }

        return $this->attributeMap[$idProductConcrete];
    }

    /**
     * @param \Generated\Shared\Transfer\StorageProductTransfer $storageProductTransfer
     * @param array $productConcrete
     *
     * @return StorageProductTransfer;
     */
    protected function mapConcreteStorageProductTransfer(StorageProductTransfer $storageProductTransfer, array $productConcrete)
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

}
