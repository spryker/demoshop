<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Product\Builder;

use Generated\Shared\Transfer\StorageProductTransfer;

class StorageProductBuilder implements StorageProductBuilderInterface
{

    /**
     * @var \Pyz\Yves\Product\Builder\AttributeVariantBuilderInterface
     */
    protected $attributeVariantBuilder;

    /**
     * @param \Pyz\Yves\Product\Builder\AttributeVariantBuilderInterface $attributeVariantBuilder
     */
    public function __construct(AttributeVariantBuilderInterface $attributeVariantBuilder)
    {
        $this->attributeVariantBuilder = $attributeVariantBuilder;
    }

    /**
     * @param array $productData
     * @param array $selectedAttributes
     *
     * @return StorageProductTransfer
     */
    public function buildProduct(array $productData, array $selectedAttributes = [])
    {
        $storageProductTransfer = $this->mapAbstractStorageProduct($productData);

        $storageProductTransfer = $this->attributeVariantBuilder->setSuperAttributes($storageProductTransfer);
        if (count($selectedAttributes) > 0) {
            $storageProductTransfer = $this->setSelectedVariants($selectedAttributes, $storageProductTransfer);
        }

        return $storageProductTransfer;
    }

    /**
     * @param array $productData
     *
     * @return \Generated\Shared\Transfer\StorageProductTransfer
     */
    protected function mapAbstractStorageProduct(array $productData)
    {
        $storageProductTransfer = new StorageProductTransfer();
        $storageProductTransfer->fromArray($productData, true);

        return $storageProductTransfer;
    }

    /**
     * @param array $selectedAttributes
     * @param StorageProductTransfer $storageProductTransfer
     *
     * @return \Generated\Shared\Transfer\StorageProductTransfer
     */
    protected function setSelectedVariants(array $selectedAttributes, StorageProductTransfer $storageProductTransfer)
    {
        $selectedVariantNode = $this->attributeVariantBuilder->getSelectedVariantNode(
            $selectedAttributes,
            $storageProductTransfer->getId()
        );

        if ($this->attributeVariantBuilder->isProductConcreteNodeReached($selectedVariantNode)) {
            $idProductConcrete = $this->attributeVariantBuilder->extractIdOfProductConcrete($selectedVariantNode);
            return $this->attributeVariantBuilder->mergeAbstractAndConcreteProducts(
                $idProductConcrete,
                $storageProductTransfer
            );
        }

        return $this->attributeVariantBuilder->setAvailableAttributes(
            $selectedVariantNode,
            $storageProductTransfer
        );

    }

}
