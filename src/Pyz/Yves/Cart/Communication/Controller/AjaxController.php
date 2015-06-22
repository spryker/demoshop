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

    /**
     * @param \ArrayObject $cartItems
     * @return array
     */
    public function getProductsForCartItems(\ArrayObject $cartItems)
    {
        if (count($cartItems === 0)) {
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

            $abstractProduct = $this->getLocator()->catalog()->sdk()->createCatalogModel()->getProductDataById($item->getId());
            if (isset($abstractProduct['abstract_Attributes']) && isset($abstractProduct['abstract_attributes']['thumbnail_url'])) {
                $product['thumbnail'] = $abstractProduct['abstract_attributes']['thumbnail_url'];
            }

            if (isset($abstractProduct['concrete_products'])) {
                foreach ($abstractProduct['concrete_products'] as $concreteProduct) {
                    if (isset($concreteProduct['sku']) && $concreteProduct['sku'] == $item->getSku()) {
                        if (isset($concreteProduct['name'])) {
                            //@todo fall back to abstract name?
                            $product['name'] = $concreteProduct['name'];
                        }
                    }
                }
            }

            //@todo price from item?
            if (isset($abstractProduct['valid_price'])) {
                $product['price'] =  $abstractProduct['valid_price'];
            }

            $products[] = $product;
        }

        return $products;
    }

}
