<?php

namespace Pyz\Yves\Cart\Communication\Plugin;

use SprykerEngine\Yves\Application\Communication\Plugin\YvesControllerProvider;
use Silex\Application;
use SprykerEngine\Yves\Kernel\Locator;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class CartControllerProvider
 * @package Pyz\Yves\Cart\Communication\Plugin
 */
class CartControllerProvider extends \SprykerEngine\Yves\Application\Communication\Plugin\YvesControllerProvider
{
    const ROUTE_CART = 'cart';
    const ROUTE_CART_ADD = 'cart/add';
    const ROUTE_CART_ADD_POST = 'POST_cart/add';
    const ROUTE_CART_REMOVE = 'cart/remove';
    const ROUTE_CART_CHANGE = 'cart/change';
    const ROUTE_CART_CHANGE_QUANTITY = 'cart/change/quantity';
    const ROUTE_CART_COUPON_ADD = 'cart/coupon/add';
    const ROUTE_CART_COUPON_REMOVE = 'cart/coupon/remove';
    const ROUTE_CART_COUPON_CLEAR = 'cart/coupon/clear';

    protected function defineControllers(Application $app)
    {
        $this->createGetController('/cart', self::ROUTE_CART, 'Cart', 'Cart');

        $this->createGetController('/cart/add/{sku}', self::ROUTE_CART_ADD, 'Cart', 'Cart', 'add')
            ->assert('sku', '[a-zA-Z0-9-_]+') // sku
            ->convert('cartItem', [$this, 'convertCartItem']);

        $this->createPostController('/cart/add/{sku}', self::ROUTE_CART_ADD_POST, 'Cart', 'Ajax', 'add', true)
            ->assert('sku', '[a-zA-Z0-9-_]+') // sku
            ->convert('cartItem', [$this, 'convertCartItem']);

        $this->createGetController('/cart/remove/{sku}/{uid}', self::ROUTE_CART_REMOVE, 'Cart', 'Cart', 'remove')
            ->assert('uid', '[a-zA-Z0-9-_]+') // uid
            ->assert('sku', '[a-zA-Z0-9-_]+') // sku
            ->convert('cartItem', [$this, 'convertCartItem']);

        $this->createGetController(
            '/cart/quantity/{sku}/{uid}/{absolute}',
            self::ROUTE_CART_CHANGE_QUANTITY,
            'Cart',
            'Cart',
            'change'
        )->assert('uid', '[a-zA-Z0-9-_]+') // uid
         ->assert('sku', '[a-zA-Z0-9-_]+') // sku
         ->assert('absolute', '[0-1-_]+') // absolute
         ->convert('cartItem', [$this, 'convertCartItem']);

        $this->createGetController('/cart/coupon/add', self::ROUTE_CART_COUPON_ADD, 'Cart', 'Coupon', 'add')
            ->convert(
                'couponCode',
                function ($unused, Request $request) {
                    return $request->query->get('code');
                }
            );

        $this->createGetController(
            '/cart/coupon/remove/{couponCode}',
            self::ROUTE_CART_COUPON_REMOVE,
            'Cart',
            'Coupon',
            'remove'
        );

        $this->createGetController('/cart/coupon/clear', self::ROUTE_CART_COUPON_CLEAR, 'Cart', 'Coupon', 'clear');
    }

    /**
     * @param mixed   $unused
     * @param Request $request
     * @return \SprykerFeature\Shared\Cart\Transfer\CartItem
     */
    public function convertCartItem($unused, Request $request)
    {
        $quantity = $request->query->get('quantity', $request->request->get('quantity', 1));
        $sku = $request->attributes->get('sku');
        $locator = Locator::getInstance();
        if (false == $request->attributes->get('absolute')) {
            $cart = $locator->cart()->pluginCartSession()->createCartSession($this->getTransferSession());
            $quantityInCart = $cart->getQuantityBySku($sku);
            $quantity += $quantityInCart;
        }

        return $locator->cart()->sdk()->createCartItem(
            $sku,
            $quantity,
            $request->attributes->get('uid'),
            $request->query->get('options', $request->request->get('options', []))
        );
    }
}
