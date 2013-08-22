<?php
/**
 * @author Martynas Narbutas <martynas.narbutas@project-a.com>, Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class Sao_Zed_Legacy_Component_Model_Inbound_Cart_User extends Sao_Zed_Legacy_Component_Model_Inbound_Cart_Abstract
{
    /**
     * @return array
     */
    public function synchronizeUserCarts()
    {
        if (ProjectA_Zed_Cart_Persistence_PacCartUserQuery::create()->findOne()) {
            throw new Exception('migration was already executed.');
        }
        $items = $this->factory->getModelShareCartUser()->getUserCartItems();
        $userCarts = $this->itemsToUserCarts($items);
        return $this->saveCarts($userCarts);
    }

    /**
     * @param array $items
     * @return array items merged to user carts
     */
    protected function itemsToUserCarts(array $items)
    {
        $userCarts = [];
        foreach ($items as $item) {
            $legacyUserId = $item['user_id'];
            $skuParser = new Sao_Shared_Library_Legacy_Sku($item['sku']);
            $item['unique_identifier'] = $item['sku'] = $skuParser->getSimpleSku();
            $frameId = $skuParser->getFrameTypeId();
            $item['option'] = '';
            if (!empty($frameId)) {
                $item['option'] = 'F' . $frameId;
                $item['unique_identifier'] .= '-' . $item['option'];
            }
            $cartItem = array_intersect_key($item, array_flip($this->cartItemFilter));
            if (false === array_key_exists($legacyUserId, $userCarts)) {
                $userCarts[$legacyUserId] = ['items' => null];
            }
            $userCarts[$legacyUserId]['items'][] = $cartItem;
        }
        return $userCarts;
    }

    /**
     * @param array $carts
     * @return array
     */
    protected function saveCarts(array $carts)
    {
        $result = [];
        foreach ($carts as $legacyUserId => $cart) {
            $result[$legacyUserId] = $this->saveUserCart($cart, $legacyUserId);
        }
        return array_sum($result);
    }

    /**
     * @param array $cart
     * @param $userId
     * @return int
     */
    protected function saveUserCart(array $cart, $userId)
    {
        $cartEntity = $this->getUserCart($userId);
        return $this->mergeCartItems($cartEntity, $cart['items']);
    }

    /**
     * @param $userId
     * @return ProjectA_Zed_Cart_Persistence_PacCart
     */
    protected function getUserCart($userId)
    {
        $cartEntity = $this->getCartByUserId($userId);
        if (!$cartEntity instanceof ProjectA_Zed_Cart_Persistence_PacCart) {
            $cartEntity = new ProjectA_Zed_Cart_Persistence_PacCart();
            $cartEntity->setCartHash(sha1(microtime(true))); // random hash
            $cartEntity->save();
            $this->addCartUser($userId, $cartEntity);
        }
        return $cartEntity;
    }

    /**
     * @param $userId
     * @param $cart
     * @return ProjectA_Zed_Cart_Persistence_PacCartUser
     */
    protected function addCartUser($userId, $cart)
    {
        $saoEntity = new Sao_Zed_Cart_Persistence_SaoCartUser();
        $saoEntity->setUserId($userId);

        $userCart = new ProjectA_Zed_Cart_Persistence_PacCartUser();
        $userCart->setCart($cart);
        $userCart->setSaoCartUser($saoEntity);
        $userCart->save();
        return $userCart;
    }

    /**
     * @param $userId
     * @return ProjectA_Zed_Cart_Persistence_PacCart
     */
    protected function getCartByUserId($userId)
    {
        return ProjectA_Zed_Cart_Persistence_PacCartQuery::create()
            ->useCartUserQuery()
                ->useSaoCartUserQuery()
                    ->filterByUserId($userId)
                ->endUse()
            ->endUse()
            ->findOne();
    }


}
