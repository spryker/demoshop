<?php


namespace Pyz\Yves\Cart\Handler;


use Generated\Shared\Transfer\StorageProductTransfer;

interface CartItemHandlerInterface
{

    /**
     * @param $sku
     * @param $selectedAttributes
     * @return StorageProductTransfer
     */
    public function getProductStorageTransfer($sku, $selectedAttributes);

    /**
     * @param string $currentItemSku
     * @param \Generated\Shared\Transfer\StorageProductTransfer $storageProductTransfer
     * @param int $quantity
     * @param string $groupKey
     */
    public function replaceCartItem(
        $currentItemSku,
        StorageProductTransfer $storageProductTransfer,
        $quantity,
        $groupKey
    );

    /**
     * @param $selectedAttributes
     * @param StorageProductTransfer $storageProductTransfer
     *
     * @return array
     */
    public function mergeProductAttributesWithSelectedAttributes(
        $selectedAttributes,
        StorageProductTransfer $storageProductTransfer
    );

    /**
     * @param string $message
     */
    public function addInfoFlashMessage($message);

    /**
     * @param string $message
     */
    public function addSuccessFlashMessage($message);

}