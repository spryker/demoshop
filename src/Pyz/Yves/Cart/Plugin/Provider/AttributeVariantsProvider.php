<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Cart\Plugin\Provider;

use ArrayObject;
use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\StorageProductTransfer;
use Pyz\Yves\Cart\Handler\CartItemHandlerInterface;
use Spryker\Yves\CartVariant\Dependency\Plugin\CartVariantAttributeMapperPluginInterface;

class AttributeVariantsProvider
{
    /**
     * @var \Spryker\Yves\CartVariant\Dependency\Plugin\CartVariantAttributeMapperPluginInterface
     */
    protected $cartVariantAttributeMapperPlugin;

    /**
     * @var \Pyz\Yves\Cart\Handler\CartItemHandlerInterface
     */
    protected $cartItemHandler;

    /**
     * CartItemsAttributeProvider constructor.
     *
     * @param \Spryker\Yves\CartVariant\Dependency\Plugin\CartVariantAttributeMapperPluginInterface $cartVariantAttributeMapperPlugin
     * @param \Pyz\Yves\Cart\Handler\CartItemHandlerInterface $cartItemHandler
     */
    public function __construct(
        CartVariantAttributeMapperPluginInterface $cartVariantAttributeMapperPlugin,
        CartItemHandlerInterface $cartItemHandler
    ) {
        $this->cartVariantAttributeMapperPlugin = $cartVariantAttributeMapperPlugin;
        $this->cartItemHandler = $cartItemHandler;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @param array|null $itemAttributes
     *
     * @return array
     */
    public function getItemsAttributes(QuoteTransfer $quoteTransfer, array $itemAttributes = null)
    {
        $itemAttributes = $this->removeEmptyAttributes($itemAttributes);

        $itemAttributesBySku = $this->cartVariantAttributeMapperPlugin
            ->buildMap($quoteTransfer->getItems());

        return $this->cartItemHandler
            ->narrowDownOptions($quoteTransfer->getItems(), $itemAttributesBySku, $itemAttributes);
    }

    /**
     * @param string $sku
     * @param int $quantity
     * @param array $selectedAttributes
     * @param \ArrayObject $items
     * @param string|null $groupKey
     * @param array $optionValueIds
     *
     * @return bool
     */
    public function tryToReplaceItem($sku, $quantity, $selectedAttributes, ArrayObject $items, $groupKey = null, $optionValueIds = [])
    {
        $storageProductTransfer = $this->cartItemHandler->getProductStorageTransfer($sku, $selectedAttributes, $items);

        if ($storageProductTransfer->getIsVariant() === true) {
            $this->cartItemHandler->replaceCartItem($sku, $storageProductTransfer, $quantity, $groupKey, $optionValueIds);
            return true;
        }
        return false;
    }

    /**
     * @param string $sku
     * @param array $selectedAttributes
     *
     * @return array
     */
    public function formatUpdateActionResponse($sku, array $selectedAttributes)
    {
        return [
            StorageProductTransfer::SELECTED_ATTRIBUTES => [$sku => $this->arrayRemoveEmpty($selectedAttributes)],
        ];
    }

    /**
     * Removes empty nodes from array
     *
     * @param array $haystack
     *
     * @return array
     */
    protected function arrayRemoveEmpty(array $haystack)
    {
        foreach ($haystack as $key => $value) {
            if (is_array($value)) {
                $haystack[$key] = $this->arrayRemoveEmpty($haystack[$key]);
            }

            if (empty($haystack[$key])) {
                unset($haystack[$key]);
            }
        }

        return $haystack;
    }

    /**
     * @param array $itemAttributes
     *
     * @return array
     */
    protected function removeEmptyAttributes(array $itemAttributes)
    {
        return array_filter($itemAttributes, function ($value) {
            return !empty($value);
        });
    }
}
