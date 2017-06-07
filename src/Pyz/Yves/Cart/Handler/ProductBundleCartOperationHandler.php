<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Cart\Handler;

use ArrayObject;
use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\StorageProductTransfer;
use Pyz\Yves\Product\Mapper\StorageProductMapper;
use Spryker\Client\Cart\CartClientInterface;
use Spryker\Client\Product\ProductClientInterface;
use Spryker\Yves\Messenger\FlashMessenger\FlashMessengerInterface;

class ProductBundleCartOperationHandler extends BaseHandler implements CartOperationInterface
{

    /**
     * @var \Pyz\Yves\Cart\Handler\CartOperationInterface
     */
    protected $cartOperationHandler;

    /**
     * @var \Spryker\Client\Cart\CartClientInterface|\Spryker\Client\Kernel\AbstractClient
     */
    protected $cartClient;

    /**
     * @var string
     */
    protected $locale;
    /**
     * @var ProductClientInterface
     */
    protected $productClient;
    /**
     * @var StorageProductMapper
     */
    protected $productMapper;

    /**
     * @param \Pyz\Yves\Cart\Handler\CartOperationInterface $cartOperationHandler
     * @param \Spryker\Client\Cart\CartClientInterface $cartClient
     * @param string $locale
     * @param \Spryker\Yves\Messenger\FlashMessenger\FlashMessengerInterface $flashMessenger
     * @param ProductClientInterface $productClient
     * @param \Pyz\Yves\Product\Mapper\StorageProductMapper $productMapper
     */
    public function __construct(
        CartOperationInterface $cartOperationHandler,
        CartClientInterface $cartClient,
        $locale,
        FlashMessengerInterface $flashMessenger,
        ProductClientInterface $productClient,
        StorageProductMapper $productMapper
    ) {
        $this->cartOperationHandler = $cartOperationHandler;

        parent::__construct($flashMessenger);
        $this->cartClient = $cartClient;
        $this->locale = $locale;
        $this->productClient = $productClient;
        $this->productMapper = $productMapper;
    }

    /**
     * @param string $sku
     * @param int $quantity
     * @param array $optionValueUsageIds
     *
     * @return void
     */
    public function add($sku, $quantity, $optionValueUsageIds = [])
    {
        $this->cartOperationHandler->add($sku, $quantity, $optionValueUsageIds);
    }

    /**
     * @param string $sku
     * @param string|null $groupKey
     *
     * @return void
     */
    public function remove($sku, $groupKey = null)
    {
        $bundledItemsToRemove = $this->getBundledItems($groupKey);
        if (count($bundledItemsToRemove) > 0) {
            $quoteTransfer = $this->cartClient->removeItems($bundledItemsToRemove);
            $this->cartClient->storeQuote($quoteTransfer);

            return;
        }

        $quoteTransfer = $this->cartClient->removeItem($sku, $groupKey);
        $this->cartClient->storeQuote($quoteTransfer);
    }

    /**
     * @param string $sku
     * @param string|null $groupKey
     *
     * @return void
     */
    public function increase($sku, $groupKey = null)
    {
        $bundledProductTotalQuantity = $this->getBundledProductTotalQuantity($sku);
        $this->cartOperationHandler->changeQuantity($sku, $bundledProductTotalQuantity + 1, $groupKey);
    }

    /**
     * @param string $sku
     * @param string|null $groupKey
     *
     * @return void
     */
    public function decrease($sku, $groupKey = null)
    {
        $bundledProductTotalQuantity = $this->getBundledProductTotalQuantity($sku);
        $this->cartOperationHandler->changeQuantity($sku, $bundledProductTotalQuantity - 1, $groupKey);
    }

    /**
     * @param string $sku
     * @param int $quantity
     * @param string|null $groupKey
     *
     * @return void
     */
    public function changeQuantity($sku, $quantity, $groupKey = null)
    {
        $bundledProductTotalQuantity = $this->getBundledProductTotalQuantity($groupKey);

        if ($bundledProductTotalQuantity > 0) {
            $this->handleBundleProductQuantity($bundledProductTotalQuantity, $sku, $quantity, $groupKey);

            return;
        }

        $quoteTransfer = $this->cartClient->changeItemQuantity($sku, $groupKey, $quantity);
        $this->cartClient->storeQuote($quoteTransfer);
    }

    /**
     * @param string $sku
     * @param array $selectedAttributes
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\StorageProductTransfer
     */
    public function mapSelectedAttributesToStorageProduct($sku, array $selectedAttributes, $quoteTransfer)
    {
        $items = $quoteTransfer->getItems();

        foreach ($items as $item) {
            if ($item->getSku() === $sku)  { //we need sku to get product abstract
                return $this->getStorageProductForSelectedAttributes($selectedAttributes, $item);
            }
        }

        return new StorageProductTransfer();
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @return \Generated\Shared\Transfer\ItemTransfer
     */
    public function findItemInCartBySku($sku, $quoteTransfer)
    {
        $items = $quoteTransfer->getItems();

        foreach ($items as $item) {
            if ($item->getSku() === $sku)  { //we need sku to get product abstract
                return $item;
            }
        }
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
     * @param int $bundledProductTotalQuantity
     * @param string $sku
     * @param int $quantity
     * @param string $groupKey
     *
     * @return void
     */
    protected function handleBundleProductQuantity($bundledProductTotalQuantity, $sku, $quantity, $groupKey)
    {
        $delta = abs($bundledProductTotalQuantity - $quantity);

        if ($delta === 0) {
            return;
        }

        if ($bundledProductTotalQuantity > $quantity) {
            $bundledItemsToRemove = $this->getBundledItems($groupKey, $delta);
            $quoteTransfer = $this->cartClient->removeItems($bundledItemsToRemove);
            $this->cartClient->storeQuote($quoteTransfer);

            return;
        }

        $itemTransfer = new ItemTransfer();
        $itemTransfer->setSku($sku);
        $itemTransfer->setQuantity($delta);
        $itemTransfer->setProductOptions($this->getBundleProductOptions($groupKey));

        $quoteTransfer = $this->cartClient->addItem($itemTransfer);

        $this->cartClient->storeQuote($quoteTransfer);
    }

    /**
     * @param string $groupKey
     *
     * @return \ArrayObject|\Generated\Shared\Transfer\ProductOptionTransfer[]
     */
    protected function getBundleProductOptions($groupKey)
    {
        $quoteTransfer = $this->cartClient->getQuote();
        foreach ($quoteTransfer->getBundleItems() as $bundleItemTransfer) {
            if ($bundleItemTransfer->getGroupKey() !== $groupKey) {
                continue;
            }
            return $bundleItemTransfer->getProductOptions();
        }

        return new ArrayObject();
    }

    /**
     * @param string $groupKey
     * @param int $numberOfBundlesToRemove
     *
     * @return \ArrayObject
     */
    protected function getBundledItems($groupKey, $numberOfBundlesToRemove = 0)
    {
        if (!$numberOfBundlesToRemove) {
            $numberOfBundlesToRemove = $this->getBundledProductTotalQuantity($groupKey);
        }

        $quoteTransfer = $this->cartClient->getQuote();
        $bundledItems = new ArrayObject();
        foreach ($quoteTransfer->getBundleItems() as $bundleItemTransfer) {
            if ($numberOfBundlesToRemove == 0) {
                return $bundledItems;
            }

            if ($bundleItemTransfer->getGroupKey() !== $groupKey) {
                continue;
            }

            foreach ($quoteTransfer->getItems() as $itemTransfer) {
                if ($itemTransfer->getRelatedBundleItemIdentifier() !== $bundleItemTransfer->getBundleItemIdentifier()) {
                    continue;
                }
                $bundledItems->append($itemTransfer);
            }
            $numberOfBundlesToRemove--;
        }

        return $bundledItems;
    }

    /**
     * @param string $groupKey
     *
     * @return int
     */
    protected function getBundledProductTotalQuantity($groupKey)
    {
        $quoteTransfer = $this->cartClient->getQuote();

        $bundleItemQuantity = 0;
        foreach ($quoteTransfer->getBundleItems() as $bundleItemTransfer) {
            if ($bundleItemTransfer->getGroupKey() !== $groupKey) {
                continue;
            }
            $bundleItemQuantity += $bundleItemTransfer->getQuantity();
        }

        return $bundleItemQuantity;
    }

    /**
     * @param array $selectedAttributes
     * @param \Generated\Shared\Transfer\ItemTransfer $item
     */
    protected function getStorageProductForSelectedAttributes(array $selectedAttributes, $item)
    {
        $productData = $this->productClient->getProductAbstractFromStorageById(
            $item->getIdProductAbstract(),
            $this->locale
        );
        return $this->productMapper->mapStorageProduct($productData, $selectedAttributes);
    }

}
