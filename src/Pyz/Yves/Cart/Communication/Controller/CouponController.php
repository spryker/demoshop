<?php
namespace Pyz\Yves\Cart\Communication\Controller;

use ProjectA\Shared\Kernel\LocatorLocatorInterface;
use Pyz\Yves\Cart\Communication\Plugin\CartControllerProvider;
use Pyz\Yves\Cart\Communication\Helper\CartControllerTrait;
use SprykerCore\Yves\Application\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class CouponController extends \SprykerCore\Yves\Application\Communication\Controller\AbstractController
{
    use CartControllerTrait;

    /**
     * @param Request $request
     * @param $couponCode
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function addAction(Request $request, $couponCode)
    {
        $response = $this->getCart($request)->addCoupon($couponCode);
        $this->addMessagesFromZedResponse($response);

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART);
    }

    /**
     * @param Request $request
     * @param $couponCode
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function removeAction(Request $request, $couponCode)
    {
        $response = $this->getCart($request)->removeCoupon($couponCode);
        $this->addMessagesFromZedResponse($response);

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function clearAction(Request $request)
    {
        $response = $this->getCart($request)->clearCoupons();
        $this->addMessagesFromZedResponse($response);

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART);
    }

    /**
     * @return LocatorLocatorInterface
     */
    protected function getLocator()
    {
        return $this->locator;
    }
}
