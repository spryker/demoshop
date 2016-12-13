<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Yves\Cart\Handler;

use ArrayObject;
use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Application\Business\Model\FlashMessengerInterface;
use Spryker\Client\Cart\CartClientInterface;

class ProductBundleAwareCartOperationHandler extends BaseHandler implements CartOperationInterface
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
     * @param \Pyz\Yves\Cart\Handler\CartOperationInterface $cartOperationHandler
     * @param \Spryker\Client\Cart\CartClientInterface $cartClient
     * @param string $locale
     * @param \Pyz\Yves\Application\Business\Model\FlashMessengerInterface $flashMessenger
     */
    public function __construct(
        CartOperationInterface $cartOperationHandler,
        CartClientInterface $cartClient,
        $locale,
        FlashMessengerInterface $flashMessenger
    ) {
        $this->cartOperationHandler = $cartOperationHandler;

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
        $bundledItemsToRemove = $this->getBundledItems($sku);
        if (count($bundledItemsToRemove) > 0) {
            $quoteTransfer = $this->cartClient->removeItems($bundledItemsToRemove);
            $this->updateNumberOfItemsInCart($quoteTransfer);
            $this->cartClient->storeQuote($quoteTransfer);
        } else {
            $this->remove($sku, $groupKey);
        }
    }

    /**
     * @param string $sku
     * @param string|null $groupKey
     *
     * @return void
     */
    public function increase($sku, $groupKey = null)
    {
        $this->cartOperationHandler->increase($sku, $groupKey);
    }

    /**
     * @param string $sku
     * @param string|null $groupKey
     *
     * @return void
     */
    public function decrease($sku, $groupKey = null)
    {
        $this->cartOperationHandler->decrease($sku, $groupKey);
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
        $bundledProductTotalQuantity = $this->getBundledProductTotalQuantity($sku);

        if ($bundledProductTotalQuantity > 0) {

            $delta = abs($bundledProductTotalQuantity - $quantity);

            if ($bundledProductTotalQuantity > $quantity) {
                $bundledItemsToChange = $this->getBundledItems($sku, $delta);
                $quoteTransfer = $this->cartClient->removeItems($bundledItemsToChange);
            } else {

                $itemTransfer = new ItemTransfer();
                $itemTransfer->setSku($sku);
                $itemTransfer->setGroupKey($groupKey);
                $itemTransfer->setQuantity($delta);

                $quoteTransfer = $this->cartClient->addItem($itemTransfer);
            }

            $this->updateNumberOfItemsInCart($quoteTransfer);
            $this->cartClient->storeQuote($quoteTransfer);

        } else {
            $this->changeQuantity($sku, $quantity, $groupKey);
        }

    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return void
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
        $numberOfItems = $quoteTransfer->getBundleItems()->count();
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
     * @return ArrayObject
     */
    protected function getBundledItems($sku, $numberOfBundlesToRemove = 0)
    {
        if (!$numberOfBundlesToRemove) {
            $numberOfBundlesToRemove = $this->getBundledProductTotalQuantity($sku);
        }

        $quoteTransfer = $this->cartClient->getQuote();
        $bundledItems = new \ArrayObject();
        foreach ($quoteTransfer->getBundleItems() as $bundleItemTransfer) {
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
        foreach ($quoteTransfer->getBundleItems() as $bundleItemTransfer) {
            if ($bundleItemTransfer->getSku() != $sku) {
                continue;
            }
            $bundleItemQuantity += $bundleItemTransfer->getQuantity();
        }

        return $bundleItemQuantity;
    }
}
