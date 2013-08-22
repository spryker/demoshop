<?php
/**
 * @author Martynas Narbutas <martynas.narbutas @ project-a.com>
 */
class Sao_Zed_Legacy_Component_Model_Inbound_Cart_Guest extends Sao_Zed_Legacy_Component_Model_Inbound_Cart_Abstract
{

    /**
     * @return array
     */
    public function synchronizeGuestCarts()
    {
        if (ProjectA_Zed_Cart_Persistence_PacCartQuery::create()->findOne()) {
            throw new Exception('migration was already executed.');
        }
        $itemsAffected = 0;
        $model = $this->factory->getModelShareCartGuest();
        $page = 99;
        $cartsPerPage = 1000;
        while ($hashes = $model->getGuestCartHashes($page, $cartsPerPage)) {
            $items = $model->getGuestCartItemsByHashes($hashes);
            $guestCarts = $this->itemsToGuestCarts($items);
            $result = $this->saveCarts($guestCarts);
            $itemsAffected += array_sum($result);
            echo "page: $page; items affected: " . array_sum($result) . PHP_EOL;
            ini_set('max_execution_time', 30);
            flush();
            //ob_flush();
            $page++;
            //if($page == 100) die('Fertig');
        }
        return $itemsAffected;
    }

    /**
     * @param array $items
     * @return array items merged to guest carts
     */
    protected function itemsToGuestCarts(array $items)
    {
        $guestCarts = [];
        foreach ($items as $item) {
            $cartHash = 'legacy_' . $item['cart_hash'];
            $skuParser = new Sao_Shared_Library_Legacy_Sku($item['sku']);
            $item['unique_identifier'] = $item['sku'] = $skuParser->getSimpleSku();
            $frameId = $skuParser->getFrameTypeId();
            $item['option'] = '';
            if (!empty($frameId)) {
                $item['option'] = 'F' . $frameId;
                $item['unique_identifier'] .= '-' . $item['option'];
            }
            $cartItem = array_intersect_key($item, array_flip($this->cartItemFilter));
            if (false === array_key_exists($cartHash, $guestCarts)) {
                $guestCarts[$cartHash] = [];
            }
            $guestCarts[$cartHash][] = $cartItem;
        }
        return $guestCarts;
    }

    /**
     * @param array $carts
     * @return array
     */
    protected function saveCarts(array $carts)
    {
        $result = [];
        foreach ($carts as $cartHash => $cart) {
            $result[$cartHash] = $this->saveGuestCart($cart, $cartHash);
        }
        return $result;
    }

    /**
     * @param array $cart
     * @param $cartHash
     * @return mixed
     */
    protected function saveGuestCart(array $cart, $cartHash)
    {
        $cartEntity = $this->getGuestCart($cartHash);
        return $this->mergeCartItems($cartEntity, $cart);
    }

    /**
     * @param $cartHash
     * @return ProjectA_Zed_Cart_Persistence_PacCart
     */
    protected function getGuestCart($cartHash)
    {
        $cartEntity = $this->getCartByHash($cartHash);
        if (!$cartEntity instanceof ProjectA_Zed_Cart_Persistence_PacCart) {
            $cartEntity = new ProjectA_Zed_Cart_Persistence_PacCart();
            $cartEntity->setCartHash($cartHash); // random hash

            $cartEntity->save();
        }
        return $cartEntity;
    }

    /**
     * @param $cartHash
     * @return ProjectA_Zed_Cart_Persistence_PacCart
     */
    protected function getCartByHash($cartHash)
    {
        return ProjectA_Zed_Cart_Persistence_PacCartQuery::create()->findOneByCartHash($cartHash);
    }
}
