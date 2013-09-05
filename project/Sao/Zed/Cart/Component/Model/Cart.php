<?php
use Generated\Shared\Library\TransferLoader;
use ProjectA\Shared\Cart\Transfer\CartItem;

/**
 * Class Sao_Zed_Cart_Component_Model_Cart
 *
 * @author Stefan Sorge
 */
class Sao_Zed_Cart_Component_Model_Cart extends ProjectA_Zed_Cart_Component_Model_Cart
{

    const PRODUCT_ORIGINAL = 'original';
    const PRODUCT_CATEGORY_KEY = 'product_category';

    /**
     * @param ProjectA_Shared_Cart_Transfer_Change $cart
     * @param string $cartStorageAction
     * @return ProjectA_Shared_Sales_Transfer_Order
     */
    public function addItems(ProjectA_Shared_Cart_Transfer_Change $cart, $cartStorageAction = ProjectA_Zed_Cart_Component_Model_CartStorage::CART_STORAGE_SYNCHRONIZE)
    {
        $cart->getOrder()->setQuotes(TransferLoader::getFulfillmentQuoteCollection());
        return parent::addItems($cart, $cartStorageAction);
    }

    /**
     * @see ProjectA_Zed_Cart_Component_Model_Cart::cartItemToSalesItem
     */
    protected function cartItemToSalesItem(CartItem $cartItem)
    {
        $item = parent::cartItemToSalesItem($cartItem);
        $item->setIsMerged($cartItem->getIsMerged());
        return $item;
    }

    /**
     * @param ProjectA_Shared_Sales_Transfer_Order_Item_Collection $orderItems
     * @param CartItem $cartItem
     * @return ProjectA_Shared_Sales_Transfer_Order_Item_Collection
     */
    protected function mergeCartItemIntoOrderItems(ProjectA_Shared_Sales_Transfer_Order_Item_Collection $orderItems, CartItem $cartItem)
    {
        if ($this->isOriginalProduct($cartItem->getSku()) && $this->isItemAlreadyInCart($orderItems, $cartItem)) {
            return $orderItems;
        }

        parent::mergeCartItemIntoOrderItems($orderItems, $cartItem);
    }

    /**
     * @param ProjectA_Shared_Sales_Transfer_Order_Item_Collection $orderItems
     * @param CartItem $cartItem
     */
    public function changeCartItemInOrderItems(ProjectA_Shared_Sales_Transfer_Order_Item_Collection $orderItems, CartItem $cartItem)
    {
        if ($this->isOriginalProduct($cartItem->getSku()) && $this->isItemAlreadyInCart($orderItems, $cartItem)) {
            return;
        }

        parent::changeCartItemInOrderItems($orderItems, $cartItem);
    }

    /**
     * @param string $sku
     * @return bool
     */
    public function isOriginalProduct($sku)
    {
        $product = $this->facadeCatalog->getProductBySku($sku);
        $attributes = $this->facadeCatalog->getProductAttributes($product);

        if (array_key_exists(self::PRODUCT_CATEGORY_KEY, $attributes)) {
            if ($attributes[self::PRODUCT_CATEGORY_KEY] == self::PRODUCT_ORIGINAL) {
                return true;
            }
        }

        return false;
    }

    /**
     * This method is used to check if an original product has already been added to the cart. This only works for
     * originals as the can be exactly identified by their SKU.
     *
     * @param ProjectA_Shared_Sales_Transfer_Order_Item_Collection $orderItems
     * @param CartItem $cartItem
     * @return bool
     */
    protected function isItemAlreadyInCart(ProjectA_Shared_Sales_Transfer_Order_Item_Collection $orderItems, CartItem $cartItem)
    {
        /* @var Sao_Shared_Sales_Transfer_Order_Item $orderItem */
        foreach ($orderItems as $orderItem) {
            if ($orderItem->getSku() == $cartItem->getSku()) {
                return true;
            }
        }

        return false;
    }
}
