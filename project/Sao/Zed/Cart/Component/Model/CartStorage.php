<?php
/**
 * Class Sao_Zed_Cart_Component_Model_Cart
 *
 * @author Stefan Sorge
 */
class Sao_Zed_Cart_Component_Model_CartStorage extends ProjectA_Zed_Cart_Component_Model_CartStorage
{
    /**
     * @seePac_Cart_Model_Cart::getCustomerCartStorage
     *
     * @deprecated Since Saatchi is not handling customer-ids, I use customer-id as user-id
     */
    public function getCustomerCartStorage($customerId)
    {
        /** @var int $userId */
        $userId = $customerId;

        $query = new ProjectA_Zed_Cart_Persistence_PacCartQuery();
        return $query
            ->useCartUserQuery()
                ->useSaoCartUserQuery()
                    ->where(Sao_Zed_Cart_Persistence_SaoCartUserPeer::USER_ID . ' = ?', $userId)
                ->endUse()
            ->endUse()
            ->findOne();
    }

    /**
     * @param $customerId
     * @return ProjectA_Zed_Cart_Persistence_PacCartUser|null
     */
    public function getCartUser($customerId)
    {
        $query = new Sao_Zed_Cart_Persistence_SaoCartUserQuery();
        $saoCartUser = $query->filterByUserId($customerId)->findOne();
        if ($saoCartUser) {
            return $saoCartUser->getCartUser();
        }
        return null;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order_Item_Collection $saleItems
     * @param Sao_Shared_Cart_Transfer_Change $cart
     * @param ProjectA_Zed_Cart_Persistence_PacCartItem $itemToAdd
     * @return Sao_Shared_Sales_Transfer_Order_Item_Collection
     */
    protected function mergeItemWithCartCollection(Sao_Shared_Sales_Transfer_Order_Item_Collection $saleItems, Sao_Shared_Cart_Transfer_Change $cart, ProjectA_Zed_Cart_Persistence_PacCartItem $itemToAdd)
    {
        $tmpSaleItem = Generated_Shared_Library_TransferLoader::getSalesOrderItem();
        $oldQuantity = 0;
        /* @var $saleItem Sao_Shared_Sales_Transfer_Order_Item */
        foreach ($saleItems as $saleItem) {
            if ($saleItem->getUniqueIdentifier() === $itemToAdd->getUniqueIdentifier()) {
                $tmpSaleItem->fromArray($saleItem->toArray(false));
                $oldQuantity++;
            }
        }

        // We already have something in cart
        if ($oldQuantity > 0) {
            $tmpSaleItem->setQuantity($oldQuantity);
            $newQuantity = $this->getMergeStrategy()->getQuantity($tmpSaleItem, $itemToAdd);

            $cartItem = Generated_Shared_Library_TransferLoader::getCartItem();
            $cartItem->setSku($saleItem->getSku());
            $cartItem->setUniqueIdentifier($saleItem->getUniqueIdentifier());
            $cartItem->setQuantity($newQuantity);
            $this->factory->getModelCart()->changeCartItemInOrderItems($saleItems, $cartItem);
            return $saleItems;
        }

        $newTransfer = Generated_Shared_Library_TransferLoader::getCartItem();
        $newTransfer->setSku($itemToAdd->getSku());
        $newTransfer->setQuantity($itemToAdd->getQuantity());

        $newTransfer->setIsMerged(true);

        $optionArray = [];
        foreach ($itemToAdd->getOptions() as $option) {
            $optionArray[] = $option->getIdentifier();
        }
        $newTransfer->setOptions($optionArray);
        $cart->addCartItem($newTransfer);
        return $saleItems;
    }

    /**
     * @seePac_Cart_Model_Cart::createCartUser
     *
     * @deprecated Since Saatchi is not handling customer-ids, I use customer-id as user-id
     */
    protected function createCartUser(ProjectA_Zed_Cart_Persistence_PacCart $cart, $customerId)
    {
        /** @var int $userId */
        $userId = $customerId;

        $saoEntity = new Sao_Zed_Cart_Persistence_SaoCartUser();
        $saoEntity->setUserId($userId);

        $entity = new ProjectA_Zed_Cart_Persistence_PacCartUser();
        $entity->setCart($cart);
        $entity->setFkCustomer(null);
        $entity->setSaoCartUser($saoEntity);
        $entity->save();
        return $entity;
    }

    /**
     * @seePac_Cart_Model_Cart::getCustomerItems
     * @deprecated Since Saatchi is not handling customer-ids, I use customer-id as user-id
     */
    protected function getCustomerItems($customerId)
    {
        /** @var int $userId */
        $userId = $customerId;

        $query = new ProjectA_Zed_Cart_Persistence_PacCartItemQuery();
        return $query->filterByIsDeleted(false)
            ->useCartQuery()
                ->useCartUserQuery()
                    ->useSaoCartUserQuery()
                        ->where(Sao_Zed_Cart_Persistence_SaoCartUserPeer::USER_ID . '=:p2', $userId)
                    ->endUse()
                ->endUse()
            ->endUse()
            ->find();
    }

    /**
     * Get customer or guest cart depending if user is logged in or not
     * @param Sao_Shared_Cart_Transfer_Change $cart
     * @return ProjectA_Zed_Cart_Persistence_PacCart
     */
    protected function getOrCreateCartStorage(Sao_Shared_Cart_Transfer_Change $cart)
    {
        if ($this->isUserLoggedIn($cart)) {
            $cartStorage = $this->getCustomerCartStorage($cart->getUserId());
            if (!$cartStorage) {
                //TODO this just fixed a strange one, if user is logged in
                //sometimes the cart_hash is not available in the cart change transfer
                //mostly due to no session or cookie cart_hash available
                //AND
                //@see Sao_Yves_Cart_Component_Model_Cart::handleCartHashRestoringAndInitializing
                //in here only for guests a new cart_hash could get created, don`t know why it only will be done for guest
                //but if the user is already logged in an no session or cookie hash available it will fail here
                //--------------------------
                //refering New relic Error
                //NoticedError: PropelException - Unable to execute INSERT statement [INSERT INTO `pac_cart` (`id_cart`, `created_at`, `updated_at`) VALUES (:p0, :p1, :p2)] [wrapped: SQLSTATE[HY000]: General error: 1364 Field 'cart_hash' doesn't have a default value] in file "/data/shop/production/releases/20130612-105820/vendor/project-a/cart-package/persistence/Cart/Propel/Entity/om/BaseEntity_PacCart.php"
                if ($cart->getCartHash()) {
                    $cartStorage = $this->createCart($cart->getCartHash());
                    $this->createCartUser($cartStorage, $cart->getUserId());
                }
            }
        } else {
            $cartStorage = $this->getGuestCartStorage($cart->getCartHash());
            if (!$cartStorage) {
                $cartStorage = $this->createCart($cart->getCartHash());
            }
        }
        return $cartStorage;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order $order
     * @param Sao_Shared_Cart_Transfer_Change $cart
     */
    protected function synchronizeCartStorage(Sao_Shared_Sales_Transfer_Order $order, Sao_Shared_Cart_Transfer_Change $cart)
    {
        //TODO see long message in getOrCreateCartStorage
        //as we stop from creating the cartStorage if the cart_hash is missing
        //we need to check if a cart storage exists bevore trying to sync
        $cartStorage = $this->getOrCreateCartStorage($cart);
        if ($cartStorage) {
            $availableCartItems = $this->getCartItemsForCartChangeTransfer($cart);
            $this->synchronizeCartStorageItems($cartStorage, $availableCartItems, $order->getItems(), $cart);
        }
    }
}
