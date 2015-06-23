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
use Generated\Shared\Transfer\CartTransfer;

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
        //$cart = $this->getCart()->getCart();
        $cart = $this->getMockCart();

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

    public function testAction($sku)
    {
        $this->getCart()->addToCart($sku, 1);

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART_OVERLAY);
    }

    /**
     * @param \ArrayObject $cartItems
     * @return array
     */
    public function getProductsForCartItems(\ArrayObject $cartItems)
    {
        if (count($cartItems) === 0) {
            return [];
        }

        $products = [];
        /** @var CartItemTransfer $item */
        foreach ($cartItems as $item) {
            $product = [
                'name' => '',
                'price' => 0,
                'quantity' => $item->getQuantity(),
            ];

            $abstract = $this->getLocator()->catalog()->sdk()->createCatalogModel()->getProductDataById($item->getId());
            if (isset($abstract['abstract_Attributes']) && isset($abstract['abstract_attributes']['thumbnail_url'])) {
                $product['thumbnail'] = $abstract['abstract_attributes']['thumbnail_url'];
            }

            if (isset($abstract['concrete_products'])) {
                foreach ($abstract['concrete_products'] as $concrete) {
                    if (isset($concrete['sku']) && $concrete['sku'] == $item->getSku()) {
                        if (isset($concrete['name'])) {
                            //@todo fall back to abstract name?
                            $product['name'] = $concrete['name'];
                        }
                    }
                }
            }

            //@todo price from item?
            if (isset($abstract['valid_price'])) {
                $product['price'] =  $abstract['valid_price'];
            }

            $products[] = $product;
        }

        return $products;
    }

    private function getMockCart()
    {
        $cart = new CartTransfer();

        $items = new \ArrayObject();

        $item1 = new CartItemTransfer();
        $item1->setId(13);
        $item1->setQuantity(1);
        $item1->setSku('146624');
        $items[] = $item1;

        $item2 = new CartItemTransfer();
        $item2->setId(26);
        $item2->setQuantity(2);
        $item2->setSku('147096');
        $items[] = $item2;

        $item3 = new CartItemTransfer();
        $item3->setId(33);
        $item3->setQuantity(3);
        $item3->setSku('147355');
        $items[] = $item3;

        $cart->setItems($items);

        return $cart;
    }

}
