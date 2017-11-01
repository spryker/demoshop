<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Product\Mapper;

use Generated\Shared\Transfer\StorageProductTransfer;
use Spryker\Client\PriceProduct\PriceProductClientInterface;

class StorageProductMapper implements StorageProductMapperInterface
{
    /**
     * @var \Pyz\Yves\Product\Mapper\AttributeVariantMapperInterface
     */
    protected $attributeVariantMapper;

    /**
     * @var \Spryker\Client\PriceProduct\PriceProductClientInterface
     */
    protected $priceProductClient;

    /**
     * @param \Pyz\Yves\Product\Mapper\AttributeVariantMapperInterface $attributeVariantMapper
     * @param \Spryker\Client\PriceProduct\PriceProductClientInterface $priceProductClient
     */
    public function __construct(
        AttributeVariantMapperInterface $attributeVariantMapper,
        PriceProductClientInterface $priceProductClient
    ) {
        $this->attributeVariantMapper = $attributeVariantMapper;
        $this->priceProductClient = $priceProductClient;
    }

    /**
     * @param array $productData
     * @param array $selectedAttributes
     *
     * @return \Generated\Shared\Transfer\StorageProductTransfer
     */
    public function mapStorageProduct(array $productData, array $selectedAttributes = [])
    {
        $storageProductTransfer = $this->mapAbstractStorageProduct($productData);
        $storageProductTransfer->setSelectedAttributes($selectedAttributes);

        $storageProductTransfer = $this->attributeVariantMapper->setSuperAttributes($storageProductTransfer);
        if (count($selectedAttributes) > 0) {
            $storageProductTransfer = $this->attributeVariantMapper->setSelectedVariants(
                $selectedAttributes,
                $storageProductTransfer
            );
        }

        $currentProductPriceTransfer = $this->priceProductClient->resolveProductPrice(
            $storageProductTransfer->getPrices()
        );

        $storageProductTransfer->setPrices($currentProductPriceTransfer->getPrices());
        $storageProductTransfer->setPrice($currentProductPriceTransfer->getPrice());

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
}
