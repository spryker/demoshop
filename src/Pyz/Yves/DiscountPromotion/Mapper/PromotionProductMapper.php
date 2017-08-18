<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\DiscountPromotion\Mapper;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Product\Dependency\Plugin\StorageProductMapperPluginInterface;
use Spryker\Client\Product\ProductClientInterface;

class PromotionProductMapper
{

    /**
     * @var \Spryker\Client\Product\ProductClientInterface
     */
    protected $productClient;

    /**
     * @var \Pyz\Yves\Product\Dependency\Plugin\StorageProductMapperPluginInterface
     */
    protected $storageProductMapperPlugin;

    /**
     * @param \Spryker\Client\Product\ProductClientInterface $productClient
     * @param \Pyz\Yves\Product\Dependency\Plugin\StorageProductMapperPluginInterface $storageProductMapperPlugin
     */
    public function __construct(
        ProductClientInterface $productClient,
        StorageProductMapperPluginInterface $storageProductMapperPlugin
    ) {

        $this->productClient = $productClient;
        $this->storageProductMapperPlugin = $storageProductMapperPlugin;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function map(QuoteTransfer $quoteTransfer)
    {
        foreach ($quoteTransfer->getPromotionItems() as $itemTransfer) {
            $abstractSku = $itemTransfer->getAbstractSku();
            $idProductAbstract = $itemTransfer->getIdProductAbstract();

            $data = $this->productClient->getProductAbstractFromStorageByIdForCurrentLocale($idProductAbstract);
            $selectedAttributes = array_filter($this->getApplication()['request']->query->get('attributes', []));

            $selectedAttributes = isset($selectedAttributes[$abstractSku]) ? $selectedAttributes[$abstractSku] : [];

            $storageProductTransfer = $this->storageProductMapperPlugin->mapStorageProduct($data, $selectedAttributes);
            $storageProducts[$itemTransfer->getAbstractSku()] = $storageProductTransfer;

            $itemTransfer->fromArray($storageProductTransfer->toArray(), true);

            $itemTransfer->setSku(null);
            $itemAttributesBySku[$itemTransfer->getAbstractSku()] = $storageProductTransfer->getSuperAttributes();
            if ($storageProductTransfer->getIsVariant()) {
                $itemTransfer->setSku($storageProductTransfer->getSku());
                $itemAttributesBySku[$itemTransfer->getAbstractSku()] = $storageProductTransfer->getSuperAttributes();
            }

            $itemTransfer->setUnitPrice($storageProductTransfer->getPrice());
            $itemTransfer->setSumPrice($storageProductTransfer->getPrice());
            $itemTransfer->setGroupKey($storageProductTransfer->getSku());
            $itemTransfer->setSumSubtotalAggregation($storageProductTransfer->getPrice());
        }

        return $quoteTransfer;
    }

}
