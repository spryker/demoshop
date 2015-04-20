<?php
namespace Pyz\Yves\Cart\Communication\Controller;

use ProjectA\Shared\Kernel\LocatorLocatorInterface;
use SprykerCore\Yves\Application\Communication\Controller\AbstractController;
use Pyz\Yves\Cart\Communication\Helper\CartControllerTrait;
use ProjectA\Yves\Library\Tracking\PageTypeInterface;
use ProjectA\Yves\Library\Tracking\Tracking;
use Symfony\Component\HttpFoundation\Request;
use ProjectA\Shared\Cart\Transfer\CartItem;
use Pyz\Yves\Cart\Communication\Plugin\CartControllerProvider;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class CartController
 * @package Pyz\Yves\Cart\Communication\Controller
 */
class CartController extends AbstractController
{
    use CartControllerTrait;

    public function indexAction(Request $request)
    {
        $cart = $this->getCart($request);
        $productData = $this->locator->cart()->sdk()->getProductDataForCartItems($cart->getItems());

        return $this->viewResponse([
            'cartItems' => $cart->getItems(),
            'totals' => $cart->getOrder()->getTotals(),
            'couponCodes' => $cart->getOrder()->getCouponCodes(),
            'products' => $productData
        ]);
    }

    /**
     * @param Request  $request
     * @param CartItem $cartItem
     * @return RedirectResponse
     */
    public function addAction(Request $request, CartItem $cartItem)
    {
        $transferResponse = $this->getCart($request)->addItem($cartItem);
        $this->addMessagesFromZedResponse($transferResponse);

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART);
    }

    /**
     * @param Request  $request
     * @param CartItem $cartItem
     * @return RedirectResponse
     */
    public function removeAction(Request $request, CartItem $cartItem)
    {
        $transferResponse = $this->getCart($request)->removeItem($cartItem);
        $this->addMessagesFromZedResponse($transferResponse);

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART);
    }

    /**
     * @param Request  $request
     * @param CartItem $cartItem
     * @return RedirectResponse
     */
    public function changeAction(Request $request, CartItem $cartItem)
    {
        $transferResponse = $this->getCart($request)->changeQuantityOfItem($cartItem);
        $this->addMessagesFromZedResponse($transferResponse);

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
