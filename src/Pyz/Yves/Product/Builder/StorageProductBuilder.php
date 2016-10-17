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
     * @var \Pyz\Yves\Product\Builder\ImageSetBuilderInterface
     */
    protected $imageSetBuilder;

    /**
     * @param \Pyz\Yves\Product\Builder\AttributeVariantBuilderInterface $attributeVariantBuilder
     * @param \Pyz\Yves\Product\Builder\ImageSetBuilderInterface $imageSetBuilder
     */
    public function __construct(AttributeVariantBuilderInterface $attributeVariantBuilder, ImageSetBuilderInterface $imageSetBuilder)
    {
        $this->attributeVariantBuilder = $attributeVariantBuilder;
        $this->imageSetBuilder = $imageSetBuilder;
    }

    /**
     * @param array $productData
     * @param array $selectedAttributes
     *
     * @return \Generated\Shared\Transfer\StorageProductTransfer
     */
    public function buildProduct(array $productData, array $selectedAttributes = [])
    {
        $storageProductTransfer = $this->mapAbstractStorageProduct($productData);
        $storageProductTransfer->setSelectedAttributes($selectedAttributes);

        $storageProductTransfer = $this->attributeVariantBuilder->setSuperAttributes($storageProductTransfer);
        if (count($selectedAttributes) > 0) {
            $storageProductTransfer = $this->attributeVariantBuilder->setSelectedVariants(
                $selectedAttributes,
                $storageProductTransfer
            );
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
        $storageProductTransfer->setImages(
            $this->imageSetBuilder->getDisplayImagesFromPersistedProduct($productData)
        );

        return $storageProductTransfer;
    }

}
