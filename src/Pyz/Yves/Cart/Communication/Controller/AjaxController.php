<?php
namespace Pyz\Yves\Cart\Communication\Controller;

use Generated\Shared\Transfer\CartItemTransfer;
use Generated\Shared\Cart\CartInterface as GeneratedCartInterface;
use SprykerEngine\Shared\Kernel\LocatorLocatorInterface;
use SprykerEngine\Yves\Application\Business\Application;
use SprykerEngine\Yves\Kernel\Communication\Factory;
use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use SprykerFeature\Sdk\Cart\Model\CartInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AjaxController extends AbstractController
{
    /**
     * @param Application $app
     * @param Factory $factory
     * @param LocatorLocatorInterface $locator
     */
    public function __construct(Application $app, Factory $factory, LocatorLocatorInterface $locator)
    {
        parent::__construct($app, $factory, $locator);
        $this->cart = $this
            ->getLocator()
            ->cart()
            ->pluginCartService()
            ->createCartServiceProvider($app['session'])
        ;
    }

    /**
     * @return CartInterface
     */
    protected function getCart()
    {
        return $this->cart;
    }

    /**
     * @return array
     */
    public function indexAction()
    {
        /** @var GeneratedCartInterface $cart */
        $cart = $this->getCart()->getCart();

        return $this->viewResponse([
            'cart' => $cart,
            'products' => $this->getProductsForCartItems($cart->getItems()),
        ]);
    }

    /**
     * @param string $sku
     * @param int $quantity
     * @return RedirectResponse
     */
    public function addAction($sku, $quantity)
    {
        $this->getCart()->addToCart($sku, $quantity);

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART_OVERLAY);
    }

    /**
     * @param string $sku
     * @return RedirectResponse
     */
    public function removeAction($sku)
    {
        $this->getCart()->removeFromCart($sku);

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART_OVERLAY);
    }

    /**
     * @param string $sku
     * @return RedirectResponse
     */
    public function increaseAction($sku)
    {
        $this->getCart()->increaseItemQuantity($sku);

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART_OVERLAY);
    }

    /**
     * @param string $sku
     * @return RedirectResponse
     */
    public function decreaseAction($sku)
    {
        $this->getCart()->decreaseItemQuantity($sku);

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART_OVERLAY);
    }

}
