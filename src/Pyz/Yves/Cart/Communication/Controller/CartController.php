<?php
namespace Pyz\Yves\Cart\Communication\Controller;

use SprykerEngine\Shared\Kernel\LocatorLocatorInterface;
use SprykerEngine\Yves\Application\Business\Application;
use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use SprykerEngine\Yves\Kernel\Factory;
use SprykerFeature\Sdk\Cart\Model\CartInterface;
use Generated\Shared\Transfer\CartItemCollectionInterfaceTransfer;
use SprykerFeature\Yves\Cart\Exception\MissingCartException;
use Symfony\Component\HttpFoundation\Request;
use Pyz\Yves\Cart\Communication\Plugin\CartControllerProvider;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class CartController
 * @package Pyz\Yves\Cart\Communication\Controller
 */
class CartController extends AbstractController
{
    /**
     * @var CartInterface
     */
    private $cart;

    /**
     * @param Application $app
     * @param Factory $factory
     * @param LocatorLocatorInterface $locator
     */
    public function __construct(Application $app, Factory $factory, LocatorLocatorInterface $locator)
    {
        parent::__construct($app, $factory, $locator);
        $this->initCart($app);
    }

    /**
     * @param Application $app
     */
    private function initCart(Application $app)
    {
        //@todo move this in an basic cart controller and extend from them
        $this->cart = $this
            ->getLocator()
            ->cart()
            ->pluginCartService()
            ->createCartServiceProvider($app['session']);
    }

    /**
     * @return CartInterface
     */
    protected function getCartModel()
    {
        return $this->cart;
    }

    public function indexAction()
    {
        $cart = $this->getCartModel();
        $cartItems = $cart->getCart()->getItems();

        return $this->viewResponse([
            'products' => $this->getProductsForCartItems($cartItems),
            'cartItems' => $cartItems,
            'totals' => $cart->getCart()->getTotals()
        ]);
    }

    public function addAction(Request $request, $sku, $quantity)
    {
        $this->getCartModel()->addToCart($sku, $quantity);

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART);
    }

    /**
     * @param ItemCollectionInterface $cartItems
     */
    protected function getProductsForCartItems(ItemCollectionInterface $cartItems)
    {
        $ids = [];
        foreach ($cartItems as $cartItem) {
            $ids[] = $cartItem->getId();
        }

        return $ids;
    }
}
