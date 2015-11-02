<?php

namespace Pyz\Yves\Checkout\Communication\Controller;

use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use Pyz\Yves\Checkout\Communication\Plugin\CheckoutControllerProvider;
use Symfony\Component\HttpFoundation\Request;

class AjaxController extends AbstractController
{
    /**
     * @return \Generated\Shared\Cart\CartInterface|\Generated\Shared\Transfer\CartTransfer
     */
    public function getCart()
    {
        return $this->getLocator()->cart()->client()->getCart();
    }

    /**
     * @return array
     */
    public function cartAction()
    {
        $cart = $this->getCart();

        return $this->viewResponse([
            'cart' => $cart,
        ]);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function addCouponAction(Request $request)
    {
        $couponCode = $request->get('couponCode');
        $cartClient = $this->getLocator()->cart()->client();
        $cartClient->addCoupon($couponCode);

        return $this->redirectResponseInternal(CheckoutControllerProvider::ROUTE_CHECKOUT_AJAX_CART);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function removeCouponAction(Request $request)
    {
        $couponCode = $request->get('couponCode');
        $cartClient = $this->getLocator()->cart()->client();
        $cartClient->removeCoupon($couponCode);

        return $this->redirectResponseInternal(CheckoutControllerProvider::ROUTE_CHECKOUT_AJAX_CART);
    }

}