<?php

/**
 * @author Martynas Narbutas <martynas.narbutas @ project-a.com>, Daniel Tschinder <daniel.tschinder@project-a.com>
 */
abstract class Sao_Zed_Legacy_Component_Model_Inbound_Cart_Abstract implements
     ProjectA_Zed_Library_Dependency_Factory_Interface
{
    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    const LEGACY_ITEM_FIELD_SKU = 'sku';



    /**
     * @var array cart item fields used in zed
     */
    protected $cartItemFilter = [
        'sku',
        'option',
        'unique_identifier',
        'quantity',
        'is_deleted'
    ];

    /**
     * @param array $carts
     * @return mixed
     */
    abstract protected function saveCarts(array $carts);

    /**
     * @param ProjectA_Zed_Cart_Persistence_PacCart $cart
     * @param array $cartItemsLegacy
     * @return int
     */
    protected function mergeCartItems(ProjectA_Zed_Cart_Persistence_PacCart $cart, array $cartItemsLegacy)
    {
        $newItems = [];
        $cartItems = $cart->getCartItems();
        $affected = 0;
        foreach ($cartItemsLegacy as $legacyCartItem) {
            $skipped = false;
            $modified = false;
            /** @var $cartItem ProjectA_Zed_Cart_Persistence_PacCartItem */
            foreach ($cartItems as $cartItem) {
                $matches = $this->matchCartItem($cartItem, $legacyCartItem);
                $isSame = $this->isSameCartItem($cartItem, $legacyCartItem);
                // skip all identical items
                if (true === $matches && true === $isSame) {
                    $skipped = true;
                }
                // merge changed items
                if (true === $matches && false === $isSame) {
                    $this->modifyCartItem($cartItem, $legacyCartItem);
                    $affected++;
                    $modified = true;
                }
            }
            // if not skipped and not merged then item is new
            if (false === $skipped && false === $modified) {
                $newItems[] = $legacyCartItem;
            }
        }
        foreach ($newItems as $item) {
            $this->addCardItem($cart, $item);
            $affected++;
        }
        return $affected;
    }

    /**
     * @param ProjectA_Zed_Cart_Persistence_PacCart $cart
     * @param array $cartItem
     */
    protected function addCardItem(ProjectA_Zed_Cart_Persistence_PacCart $cart, array $cartItem)
    {
        $newCartItem = Generated_Zed_EntityLoader::getPacCartItem();
        $newCartItem->fromArray($cartItem);
        $newCartItem->setCart($cart);
        if (!empty($cartItem['option'])) {
            $newCartOption = Generated_Zed_EntityLoader::getPacCartItemOption();
            $newCartOption->setIdentifier($cartItem['option']);
            $newCartItem->addOption($newCartOption);
        }
        $newCartItem->save();
    }

    /**
     * @param ProjectA_Zed_Cart_Persistence_PacCartItem $entity
     * @param array $cartItem
     */
    protected function modifyCartItem(ProjectA_Zed_Cart_Persistence_PacCartItem $entity, array $cartItem)
    {
        $entity->fromArray($cartItem);
        $entity->save();
        $entity->reload();
    }

    /**
     * @param ProjectA_Zed_Cart_Persistence_PacCartItem $cartItem
     * @param array $legacyCartItem
     * @return bool
     */
    protected function isSameCartItem(ProjectA_Zed_Cart_Persistence_PacCartItem $cartItem, array $legacyCartItem)
    {
        if (false === $this->matchCartItem($cartItem, $legacyCartItem)) {
            return false;
        }

        $hasSameQuantity = ($cartItem->getQuantity() == $legacyCartItem['quantity']);
        $hasSameDeletionStatus = ($cartItem->getIsDeleted() == $legacyCartItem['is_deleted']);
        return $hasSameQuantity && $hasSameDeletionStatus;
    }

    /**
     * @param ProjectA_Zed_Cart_Persistence_PacCartItem $cartItem
     * @param array $legacyCartItem
     * @return bool
     */
    protected function matchCartItem(ProjectA_Zed_Cart_Persistence_PacCartItem $cartItem, array $legacyCartItem)
    {
        $optionIdentifier = '';
        if ($cartItem->getOptions()->count() > 0) {
            $optionIdentifier = $cartItem->getOptions()->getFirst()->getIdentifier();
        }

        $hasSameOption = ($optionIdentifier == $legacyCartItem['option']);
        $hasSameSku = $cartItem->getSku() == $legacyCartItem['sku'];
        return $hasSameSku && $hasSameOption;
    }

}
