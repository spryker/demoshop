<?php

namespace Pyz\Yves\Cart\Communication\Plugin;

use Generated\Shared\Transfer\CartItemTransfer;
use SprykerEngine\Yves\Application\Communication\Plugin\YvesControllerProvider;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class CartControllerProvider
 * @package Pyz\Yves\Cart\Communication\Plugin
 */
class CartControllerProvider extends YvesControllerProvider
{
    //@todo this could be reduced to the ajax routes
    const ROUTE_CART = 'cart';
    const ROUTE_CART_OVERLAY = 'cart/overlay';
    const ROUTE_CART_ADD = 'cart/add';
    const ROUTE_CART_ADD_POST = 'POST_cart/add';
    const ROUTE_CART_REMOVE_POST = 'POST_cart/remove';
    const ROUTE_CART_INCREASE_POST = 'POST_cart/increase';
    const ROUTE_CART_DECREASE_POST = 'POST_cart/decrease';
    const ROUTE_CART_REMOVE = 'cart/remove';
    const ROUTE_CART_CHANGE = 'cart/change';
    const ROUTE_CART_CHANGE_QUANTITY = 'cart/change/quantity';
    const ROUTE_CART_COUPON_ADD = 'cart/coupon/add';
    const ROUTE_CART_COUPON_REMOVE = 'cart/coupon/remove';
    const ROUTE_CART_COUPON_CLEAR = 'cart/coupon/clear';

    /**
     * @param Application $app
     */
    protected function defineControllers(Application $app)
    {
        $this->createPostController('/cart/add/{sku}', self::ROUTE_CART_ADD_POST, 'Cart', 'Cart', 'ajaxAdd')
            ->assert('sku', '[a-zA-Z0-9-_]+')
            ->convert('quantity', [$this, 'getQuantityFromRequest'])
        ;

        $this->createGetController('/cart', self::ROUTE_CART, 'Cart', 'Cart');

        $this->createGetController('/cart/add/{sku}', self::ROUTE_CART_ADD, 'Cart', 'Cart', 'add')
            ->assert('sku', '[a-zA-Z0-9-_]+')
            ->convert('quantity', [$this, 'getQuantityFromRequest'])
        ;

        $this->createGetController('/cart/remove/{sku}/{uid}', self::ROUTE_CART_REMOVE, 'Cart', 'Cart', 'remove')
            ->assert('uid', '[a-zA-Z0-9-_]+') // uid
            ->assert('sku', '[a-zA-Z0-9-_]+') // sku
            ->convert('cartItem', [$this, 'convertCartItem'])
        ;

        $this->createGetController(
            '/cart/quantity/{sku}/{uid}/{absolute}',
            self::ROUTE_CART_CHANGE_QUANTITY,
            'Cart',
            'Cart',
            'change'
        )->assert('uid', '[a-zA-Z0-9-_]+') // uid
             ->assert('sku', '[a-zA-Z0-9-_]+') // sku
             ->assert('absolute', '[0-1-_]+') // absolute
             ->convert('cartItem', [$this, 'convertCartItem'])
        ;

        $this->createGetController('/cart/coupon/add', self::ROUTE_CART_COUPON_ADD, 'Cart', 'Coupon', 'add')
            ->convert(
                'couponCode',
                function ($unused, Request $request) {
                    return $request->query->get('code');
                }
            )
        ;

        $this->createGetController('/cart/coupon/remove/{couponCode}', self::ROUTE_CART_COUPON_REMOVE, 'Cart', 'Coupon', 'remove');

        $this->createGetController('/cart/coupon/clear', self::ROUTE_CART_COUPON_CLEAR, 'Cart', 'Coupon', 'clear');


        //Ajax routes below
        $this->createGetController('/cart/overlay', self::ROUTE_CART_OVERLAY, 'Cart', 'Ajax', 'index');

        $this->createPostController('/cart/add/{sku}', self::ROUTE_CART_ADD_POST, 'Cart', 'Ajax', 'add')
            ->assert('sku', '[a-zA-Z0-9-_]+')
            ->convert('quantity', [$this, 'getQuantityFromRequest'])
        ;

        $this->createPostController('/cart/remove/{sku}', self::ROUTE_CART_REMOVE_POST, 'Cart', 'Ajax', 'remove')
            ->assert('sku', '[a-zA-Z0-9-_]+')
        ;

        $this->createPostController('/cart/increase/{sku}', self::ROUTE_CART_INCREASE_POST, 'Cart', 'Ajax', 'increase')
            ->assert('sku', '[a-zA-Z0-9-_]+')
        ;

        $this->createPostController('/cart/increase/{sku}', self::ROUTE_CART_DECREASE_POST, 'Cart', 'Ajax', 'decrease')
            ->assert('sku', '[a-zA-Z0-9-_]+')
        ;

        $this->createGetController('/cart/test/{sku}', 'cart/test', 'Cart', 'Ajax', 'test')
            ->assert('sku', '[a-zA-Z0-9-_]+')
        ;
    }

    /**
     * @param Request $request
     *
     * @return int
     */
    public function getQuantityFromRequest($unused, Request $request)
    {
        return (int) $request->query->get('quantity', 1);
    }
}
