<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Cart\Handler;

use ArrayObject;
use Generated\Shared\Transfer\StorageProductTransfer;
use Pyz\Yves\Product\Mapper\StorageProductMapperInterface;
use Spryker\Client\Cart\CartClientInterface;
use Spryker\Client\Product\ProductClientInterface;
use Spryker\Shared\CartVariant\CartVariantConstants;
use Spryker\Yves\Messenger\FlashMessenger\FlashMessengerInterface;

class CartItemHandler extends BaseHandler implements CartItemHandlerInterface
{

    /**
     * @var \Pyz\Yves\Cart\Handler\CartOperationInterface
     */
    protected $cartOperationHandler;

    /**
     * @var \Spryker\Client\Cart\CartClientInterface
     */
    protected $cartClient;

    /**
     * @var \Spryker\Client\Product\ProductClientInterface
     */
    protected $productClient;

    /**
     * @var \Pyz\Yves\Product\Mapper\StorageProductMapperInterface
     */
    protected $productMapper;

    /**
     * @param \Pyz\Yves\Cart\Handler\CartOperationInterface $cartOperationHandler
     * @param \Spryker\Client\Cart\CartClientInterface $cartClient
     * @param \Spryker\Client\Product\ProductClientInterface $productClient
     * @param \Pyz\Yves\Product\Mapper\StorageProductMapperInterface $productMapper
     * @param \Spryker\Yves\Messenger\FlashMessenger\FlashMessengerInterface $flashMessenger
     */
    public function __construct(
        CartOperationInterface $cartOperationHandler,
        CartClientInterface $cartClient,
        ProductClientInterface $productClient,
        StorageProductMapperInterface $productMapper,
        FlashMessengerInterface $flashMessenger
    ) {

        parent::__construct($flashMessenger);

        $this->cartOperationHandler = $cartOperationHandler;
        $this->cartClient = $cartClient;
        $this->productClient = $productClient;
        $this->productMapper = $productMapper;
    }

    /**
     * @param string $sku
     * @param array $selectedAttributes
     * @param \ArrayObject|\Generated\Shared\Transfer\StorageProductTransfer[] $items

     * @return \Generated\Shared\Transfer\StorageProductTransfer
     */
    public function getProductStorageTransfer($sku, array $selectedAttributes, ArrayObject $items)
    {
        return $this->mapSelectedAttributesToStorageProduct($sku, $selectedAttributes, $items);
    }

    /**
     * @param string $currentItemSku
     * @param \Generated\Shared\Transfer\StorageProductTransfer $storageProductTransfer
     * @param int $quantity
     * @param string $groupKey
     * @param array $optionValueIds
     *
     * @return void
     */
    public function replaceCartItem(
        $currentItemSku,
        StorageProductTransfer $storageProductTransfer,
        $quantity,
        $groupKey,
        array $optionValueIds
    ) {
        $newItemSku = $storageProductTransfer->getSku();
        $this->cartOperationHandler->add($newItemSku, $quantity, $optionValueIds);
        $this->setFlashMessagesFromLastZedRequest($this->cartClient);

        if (count($this->cartClient->getZedStub()->getErrorMessages()) === 0) {
            $this->cartOperationHandler->remove($currentItemSku, $groupKey);
        }
    }

    /**
     * @param string $sku
     * @param array $selectedAttributes
     * @param \ArrayObject|\Generated\Shared\Transfer\StorageProductTransfer[] $items
     *
     * @return \Generated\Shared\Transfer\StorageProductTransfer
     */
    public function mapSelectedAttributesToStorageProduct($sku, array $selectedAttributes, ArrayObject $items)
    {
        foreach ($items as $item) {
            if ($item->getSku() === $sku) {
                return $this->getStorageProductForSelectedAttributes($selectedAttributes, $item);
            }
        }

        return new StorageProductTransfer();
    }

    /**
     * @param array $selectedAttributes
     * @param \Generated\Shared\Transfer\ItemTransfer $item
     *
     * @return \Generated\Shared\Transfer\StorageProductTransfer
     */
    protected function getStorageProductForSelectedAttributes(array $selectedAttributes, $item)
    {
        $productData = $this->productClient->getProductAbstractFromStorageByIdForCurrentLocale(
            $item->getIdProductAbstract()
        );
        return $this->productMapper->mapStorageProduct($productData, $selectedAttributes);
    }

    /**
     * @param string $sku
     * @param \ArrayObject|\Generated\Shared\Transfer\ItemTransfer[] $items
     *
     * @return \Generated\Shared\Transfer\ItemTransfer
     */
    protected function findItemInCartBySku($sku, ArrayObject $items)
    {
        foreach ($items as $item) {
            if ($item->getSku() === $sku) {
                return $item;
            }
        }
    }

    /**
     * @param \ArrayObject|\Generated\Shared\Transfer\StorageProductTransfer[] $items
     * @param array $itemAttributesBySku
     * @param array|null $selectedAttributes
     *
     * @return array
     */
    public function narrowDownOptions(
        ArrayObject $items,
        array $itemAttributesBySku,
        array $selectedAttributes = null
    ) {

        if (count($selectedAttributes) === 0) {
            return $itemAttributesBySku;
        }

        foreach ($selectedAttributes as $sku => $attributes) {

            $itemAttributesBySku = $this->setSelectedAttributesAsSelected($itemAttributesBySku, $attributes, $sku);

            $availableAttributes = $this->getAvailableAttributesForItem($items, $selectedAttributes, $sku);

            $itemAttributesBySku = $this->removeAttributesThatAreNotAvailableForItem($itemAttributesBySku, $sku, $availableAttributes);
        }

        return $itemAttributesBySku;
    }

    /**
     * @param array $itemAttributesBySku
     * @param array $attributes
     * @param string $sku
     *
     * @return array
     */
    protected function setSelectedAttributesAsSelected(array $itemAttributesBySku, array $attributes, $sku)
    {
        foreach ($attributes as $key => $attribute) {
            unset($itemAttributesBySku[$sku][$key]);
            $itemAttributesBySku[$sku][$key][$attribute][CartVariantConstants::SELECTED] = true;
            $itemAttributesBySku[$sku][$key][$attribute][CartVariantConstants::AVAILABLE] = true;
        }
        return $itemAttributesBySku;
    }

    /**
     * @param \ArrayObject $items
     * @param array $itemAttributes
     * @param string $sku
     *
     * @return array
     */
    protected function getAvailableAttributesForItem(ArrayObject $items, array $itemAttributes, $sku)
    {
        $storageProductTransfer = $this->getProductStorageTransfer($sku, $itemAttributes[$sku], $items);
        $availableAttributes = $storageProductTransfer->getAvailableAttributes();
        return $availableAttributes;
    }

    /**
     * @SuppressWarnings(PHPMD.UnusedLocalVariable)
     *
     * @param array $itemAttributesBySku
     * @param string $sku
     * @param array $availableAttributes
     *
     * @return array
     */
    protected function removeAttributesThatAreNotAvailableForItem(array $itemAttributesBySku, $sku, array $availableAttributes)
    {
        foreach ($itemAttributesBySku[$sku] as $key => $attributes) {
            foreach ($attributes as $attributeName => $options) {
                if (array_key_exists($key, $availableAttributes)) {
                    if (in_array($attributeName, $availableAttributes[$key]) === false) {
                        unset($itemAttributesBySku[$sku][$key][$attributeName]);
                    }
                }
            }
        }

        return $itemAttributesBySku;
    }

}
