<?php

namespace Pyz\Yves\Cart\Communication\Controller;

use Pyz\Yves\Cart\Communication\Plugin\CartControllerProvider;
use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AjaxController extends AbstractController
{

    /**
     * @return array
     */
    public function indexAction()
    {
        $cartClient = $this->getLocator()->cart()->client();
        $cart = $cartClient->getCart();
        foreach ($cart->getItems() as $item) {
            if (empty($item->getName())) {
                $item->setName('Product ' . mt_rand(1, 99));
            }
        }

        return $this->viewResponse([
            'cart' => $cart,
        ]);
    }

    /**
     * @param string $sku
     * @param int $quantity
     *
     * @return RedirectResponse
     */
    public function addAction($sku, $quantity)
    {
        $cartClient = $this->getLocator()->cart()->client();
        $cartClient->addItem($sku, $quantity);

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART_OVERLAY);
    }

    /**
     * @param string $sku
     *
     * @return RedirectResponse
     */
    public function removeAction($sku)
    {
        $cartClient = $this->getLocator()->cart()->client();
        $cartClient->removeItem($sku);

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART_OVERLAY);
    }

    /**
     * @param string $sku
     *
     * @return RedirectResponse
     */
    public function increaseAction($sku)
    {
        $cartClient = $this->getLocator()->cart()->client();
        $cartClient->increaseItemQuantity($sku);

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART_OVERLAY);
    }

    /**
     * @param string $sku
     *
     * @return RedirectResponse
     */
    public function decreaseAction($sku)
    {
        $cartClient = $this->getLocator()->cart()->client();
        $cartClient->decreaseItemQuantity($sku);

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART_OVERLAY);
    }

}
