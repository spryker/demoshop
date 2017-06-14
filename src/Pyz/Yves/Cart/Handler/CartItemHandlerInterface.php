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
    public function getProductStorageTransfer($sku, $selectedAttributes);

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
        $optionValueIds
    );

    /**
     * @param array $selectedAttributes
     * @param \Generated\Shared\Transfer\StorageProductTransfer $storageProductTransfer
     *
     * @return array
     */
    public function mergeProductAttributesWithSelectedAttributes(
        $selectedAttributes,
        StorageProductTransfer $storageProductTransfer
    );

    /**
     * @param string $message
     *
     * @return void
     */
    public function addInfoFlashMessage($message);

    /**
     * @param string $message
     *
     * @return void
     */
    public function addSuccessFlashMessage($message);

    /**
     * Removes empty nodes from array
     *
     * @param array $haystack
     *
     * @return array
     */
    public function arrayRemoveEmpty($haystack);

}
