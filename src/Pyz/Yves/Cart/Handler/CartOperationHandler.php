<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Cart\Handler;

use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\ProductOptionTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Application\Business\Model\FlashMessengerInterface;
use Spryker\Client\Cart\CartClientInterface;

class CartOperationHandler extends BaseHandler
{

    /**
     * @var \Spryker\Client\Cart\CartClientInterface|\Spryker\Client\Kernel\AbstractClient
     */
    protected $cartClient;

    /**
     * @var string
     */
    protected $locale;

    /**
     * @param \Spryker\Client\Cart\CartClientInterface $cartClient
     * @param string $locale
     * @param \Pyz\Yves\Application\Business\Model\FlashMessengerInterface $flashMessenger
     */
    public function __construct(CartClientInterface $cartClient, $locale, FlashMessengerInterface $flashMessenger)
    {
        parent::__construct($flashMessenger);
        $this->cartClient = $cartClient;
        $this->locale = $locale;
    }

    /**
     * @param string $sku
     * @param string $quantity
     * @param array $optionValueUsageIds
     *
     * @return void
     */
    public function add($sku, $quantity, $optionValueUsageIds = [])
    {
        $itemTransfer = new ItemTransfer();
        $itemTransfer->setSku($sku);
        $itemTransfer->setQuantity($quantity);

        $this->addProductOptions($optionValueUsageIds, $itemTransfer);

        $quoteTransfer = $this->cartClient->addItem($itemTransfer);
        $this->updateNumberOfItemsInCart($quoteTransfer);
        $this->cartClient->storeQuote($quoteTransfer);
    }

    /**
     * @param string $sku
     * @param string|null $groupKey
     *
     * @return void
     */
    public function remove($sku, $groupKey = null)
    {
        $bundledItemsToRemove = $this->getBundledItems($sku);
        if (count($bundledItemsToRemove) > 0) {
            $quoteTransfer = $this->cartClient->removeItems($bundledItemsToRemove);
        } else {
            $quoteTransfer = $this->cartClient->removeItem($sku, $groupKey);
        }

        $this->updateNumberOfItemsInCart($quoteTransfer);
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
        $quoteTransfer = $this->cartClient->increaseItemQuantity($sku, $groupKey);
        $this->updateNumberOfItemsInCart($quoteTransfer);
        $this->cartClient->storeQuote($quoteTransfer);
    }

    /**
     * @param string $sku
     * @param string|null $groupKey
     *
     * @return void
     */
    public function decrease($sku, $groupKey = null)
    {
        $quoteTransfer = $this->cartClient->decreaseItemQuantity($sku, $groupKey);
        $this->updateNumberOfItemsInCart($quoteTransfer);
        $this->cartClient->storeQuote($quoteTransfer);
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
        $bundledItemsToChange = $this->getBundledItems($sku, $quantity);

        if (count($bundledItemsToChange) > 0) {

            $bundledProductTotalQuantity = $this->getBundledProductTotalQuantity($sku);

            if ($bundledProductTotalQuantity > $quantity) {
                $quoteTransfer = $this->cartClient->removeItems($bundledItemsToChange);
            } else {

                $delta = abs($bundledProductTotalQuantity - $quantity);

                $itemTransfer = new ItemTransfer();
                $itemTransfer->setSku($sku);
                $itemTransfer->setGroupKey($groupKey);
                $itemTransfer->setQuantity($delta);

                $quoteTransfer = $this->cartClient->addItem($itemTransfer);
            }

        } else {
            $quoteTransfer = $this->cartClient->changeItemQuantity($sku, $groupKey, $quantity);
        }

        $this->updateNumberOfItemsInCart($quoteTransfer);
        $this->cartClient->storeQuote($quoteTransfer);
    }

    /**
     * @param array $optionValueUsageIds
     * @param \Generated\Shared\Transfer\ItemTransfer $itemTransfer
     *
     * @return void
     */
    protected function addProductOptions(array $optionValueUsageIds, ItemTransfer $itemTransfer)
    {
        foreach ($optionValueUsageIds as $idOptionValueUsage) {
            if (!$idOptionValueUsage) {
                continue;
            }

            $productOptionTransfer = new ProductOptionTransfer();
            $productOptionTransfer->setIdProductOptionValue($idOptionValueUsage);

            $itemTransfer->addProductOption($productOptionTransfer);
        }
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     */
    public function updateNumberOfItemsInCart(QuoteTransfer $quoteTransfer)
    {
        $numberOfItems = $this->getNumberOfItemsInCart($quoteTransfer);;
        $this->cartClient->setItemCount($numberOfItems);
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return int
     */
    protected function getNumberOfItemsInCart(QuoteTransfer $quoteTransfer)
    {
        $numberOfItems = $quoteTransfer->getBundleProducts()->count();
        foreach ($quoteTransfer->getItems() as $itemTransfer) {
            if ($itemTransfer->getRelatedBundleItemIdentifier()) {
                continue;
            }
            $numberOfItems++;
        }

        return $numberOfItems;

    }

    /**
     * @param string $sku
     * @param int $numberOfBundlesToRemove
     *
     * @return \ArrayObject
     */
    protected function getBundledItems($sku, $numberOfBundlesToRemove = 0)
    {
        if (!$numberOfBundlesToRemove) {
            $numberOfBundlesToRemove = $this->getBundledProductTotalQuantity($sku);
        }

        $quoteTransfer = $this->cartClient->getQuote();
        $bundledItems = new \ArrayObject();
        foreach ($quoteTransfer->getBundleProducts() as $bundleItemTransfer) {
            if ($numberOfBundlesToRemove == 0) {
                return $bundledItems;
            }

            if ($bundleItemTransfer->getSku() != $sku) {
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
     * @param string $sku
     *
     * @return int
     */
    protected function getBundledProductTotalQuantity($sku)
    {
        $quoteTransfer = $this->cartClient->getQuote();

        $bundleItemQuantity = 0;
        foreach ($quoteTransfer->getBundleProducts() as $bundleItemTransfer) {
            if ($bundleItemTransfer->getSku() != $sku) {
                continue;
            }
            $bundleItemQuantity += $bundleItemTransfer->getQuantity();
        }

        return $bundleItemQuantity;
    }

}
