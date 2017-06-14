<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Cart\Handler;

use Generated\Shared\Transfer\StorageProductTransfer;

interface CartItemHandlerInterface
{

    /**
     * @param string $sku
     * @param array $selectedAttributes
     *
     * @return \Generated\Shared\Transfer\StorageProductTransfer
     */
    public function getProductStorageTransfer($sku, array $selectedAttributes);

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
    );

    /**
     * Removes empty nodes from array
     *
     * @param array $haystack
     *
     * @return array
     */
    public function arrayRemoveEmpty(array $haystack);

    /**
     * @param array $itemAttributesBySku
     * @param array $itemAttributes
     *
     * @return array
     */
    public function narrowDownOptions(array $itemAttributesBySku, array $itemAttributes = null);

}
