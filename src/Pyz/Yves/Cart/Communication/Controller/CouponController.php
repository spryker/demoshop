<?php

namespace Pyz\Yves\Cart\Communication\Controller;

use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use Pyz\Yves\Cart\Communication\Plugin\Provider\CartControllerProvider;
use SprykerFeature\Client\Cart\Service\CartClientInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * @method CartClientInterface getClient()
 */
class CouponController extends AbstractController
{

    /**
     * @param string $couponCode
     *
     * @return RedirectResponse
     */
    public function addAction($couponCode)
    {
        $cartClient = $this->getClient();
        $cart = $cartClient->addCoupon($couponCode);

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART);
    }

    /**
     * @param string $couponCode
     *
     * @return RedirectResponse
     */
    public function removeAction($couponCode)
    {
        $cartClient = $this->getClient();
        $cart = $cartClient->removeCoupon($couponCode);

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART);
    }

    /**
     * @return RedirectResponse
     */
    public function clearAction()
    {
        $cartClient = $this->getClient();
        $cart = $cartClient->clearCoupons();

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART);
    }

}
