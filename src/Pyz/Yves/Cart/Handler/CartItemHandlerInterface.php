<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Cart\Handler;

use ArrayObject;
use Generated\Shared\Transfer\StorageProductTransfer;

interface CartItemHandlerInterface
{

    /**
     * @param string $sku
     * @param array $selectedAttributes
     * @param ArrayObject| \Generated\Shared\Transfer\StorageProductTransfer[] $items

     * @return StorageProductTransfer
     */
    public function getProductStorageTransfer($sku, array $selectedAttributes, ArrayObject $items);

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
     * @param ArrayObject| \Generated\Shared\Transfer\StorageProductTransfer[] $items
     * @param array $itemAttributesBySku
     * @param array $itemAttributes
     *
     * @return array
     */
    public function narrowDownOptions(ArrayObject $items, array $itemAttributesBySku, array $itemAttributes = null);

}
