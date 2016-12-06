<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Yves\Cart\Grouper;

use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\QuoteTransfer;

class CartItemGouper implements CartItemGouperInterface
{
    const BUNDLE_ITEMS = 'bundleItems';
    const BUNDLE_PRODUCT = 'bundleProduct';

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return array
     */
    public function groupCartItems(QuoteTransfer $quoteTransfer)
    {
        $groupedBundleQuantity = $this->getGroupedBundleQuantity($quoteTransfer);

        $singleItems = [];
        $bundleItems = [];
        foreach ($quoteTransfer->getItems() as $itemTransfer) {
            if (!$itemTransfer->getRelatedBundleItemIdentifier()) {
                $singleItems[] = $itemTransfer;
            }

            foreach ($quoteTransfer->getBundleItems() as $bundleItemTransfer) {
                if ($bundleItemTransfer->getBundleItemIdentifier() !== $itemTransfer->getRelatedBundleItemIdentifier()) {
                    continue;
                }

                $bundleItems = $this->getCurrentBundle($bundleItems, $bundleItemTransfer, $groupedBundleQuantity);

                $currentBundleItemTransfer = $this->getBundleProduct($bundleItems, $bundleItemTransfer->getSku());
                if ($currentBundleItemTransfer->getBundleItemIdentifier() !== $itemTransfer->getRelatedBundleItemIdentifier()) {
                    continue;
                }

                $bundleItems[$bundleItemTransfer->getSku()][static::BUNDLE_ITEMS] = $this->groupBundledItems(
                    $bundleItems,
                    $itemTransfer,
                    $bundleItemTransfer->getSku()
                );
            }

        }

        $cartItems = array_merge($singleItems, $bundleItems);

        return $cartItems;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return array
     */
    protected function getGroupedBundleQuantity(QuoteTransfer $quoteTransfer)
    {
        $groupedBundleQuantity = [];
        foreach ($quoteTransfer->getBundleItems() as $bundleProductTransfer) {
            if (!isset($groupedBundleQuantity[$bundleProductTransfer->getSku()])) {
                $groupedBundleQuantity[$bundleProductTransfer->getSku()] = $bundleProductTransfer->getQuantity();
            } else {
                $groupedBundleQuantity[$bundleProductTransfer->getSku()] += $bundleProductTransfer->getQuantity();
            }
        }
        return $groupedBundleQuantity;
    }

    /**
     * @param array $bundleItems
     * @param ItemTransfer $bundleItemTransfer
     * @param int $groupedBundleQuantity
     *
     * @return array
     */
    protected function getCurrentBundle(array $bundleItems, ItemTransfer $bundleItemTransfer, $groupedBundleQuantity)
    {
        if (!isset($bundleItems[$bundleItemTransfer->getSku()])) {
            $bundleProduct = clone $bundleItemTransfer;
            $bundleProduct->setQuantity($groupedBundleQuantity[$bundleProduct->getSku()]);

            $bundleItems[$bundleProduct->getSku()] = [
                static::BUNDLE_PRODUCT => $bundleProduct,
                static::BUNDLE_ITEMS => [],
            ];
        }
        return $bundleItems;
    }

    /**
     * @param array $bundleItems
     * @param ItemTransfer $itemTransfer
     *
     * @return array
     */
    protected function groupBundledItems(array $bundleItems, ItemTransfer $itemTransfer, $bundleSku)
    {
        $currentBundleItems = $this->getAlreadyBundledItems($bundleItems, $bundleSku);
        $currentBundleIdentifer = $itemTransfer->getSku() . $itemTransfer->getRelatedBundleItemIdentifier();

        if (!isset($currentBundleItems[$currentBundleIdentifer])) {
            $currentBundleItems[$currentBundleIdentifer] = clone $itemTransfer;
        } else {
            $currentBundleItemTransfer = $currentBundleItems[$currentBundleIdentifer];
            $currentBundleItemTransfer->setQuantity(
                $currentBundleItemTransfer->getQuantity() + $itemTransfer->getQuantity()
            );

        }

        return $currentBundleItems;;
    }

    /**
     * @param array $bundleItems
     * @param string $bundleSku
     *
     * @return ItemTransfer
     */
    protected function getBundleProduct(array $bundleItems, $bundleSku)
    {
        return $bundleItems[$bundleSku][static::BUNDLE_PRODUCT];
    }

    /**
     * @param array $bundleItems
     * @param string $bundleSku
     *
     * @return array
     */
    protected function getAlreadyBundledItems(array $bundleItems, $bundleSku)
    {
        return $bundleItems[$bundleSku][static::BUNDLE_ITEMS];
    }
}
