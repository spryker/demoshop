<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Cart\Communication\Plugin;

use Silex\Application;
use SprykerEngine\Yves\Application\Communication\Plugin\YvesControllerProvider;
use Symfony\Component\HttpFoundation\Request;

class CartControllerProvider extends YvesControllerProvider
{

    const ROUTE_CART = 'cart';
    const ROUTE_CART_ADD = 'cart/add';
    const ROUTE_CART_REMOVE = 'cart/remove';
    const ROUTE_CART_CHANGE = 'cart/change';
    const ROUTE_CART_CHANGE_QUANTITY = 'cart/change/quantity';

    const ROUTE_CART_OVERLAY = 'cart/overlay';
    const ROUTE_CART_ADD_AJAX = 'POST_cart/add';
    const ROUTE_CART_REMOVE_AJAX = 'POST_cart/remove';
    const ROUTE_CART_INCREASE_AJAX = 'POST_cart/increase';
    const ROUTE_CART_DECREASE_AJAX = 'POST_cart/decrease';

    const ROUTE_CART_COUPON_ADD = 'cart/coupon/add';
    const ROUTE_CART_COUPON_REMOVE = 'cart/coupon/remove';
    const ROUTE_CART_COUPON_CLEAR = 'cart/coupon/clear';

    /**
     * @param Application $app
     */
    protected function defineControllers(Application $app)
    {
        $this->createGetController('/cart', self::ROUTE_CART, 'Cart', 'Cart');

        $this->createGetController('/cart/add/{sku}', self::ROUTE_CART_ADD, 'Cart', 'Cart', 'add')
            ->assert('sku', '[a-zA-Z0-9-_]+')
            ->convert('quantity', [$this, 'getQuantityFromRequest'])
        ;

        $this->createGetController('/cart/remove/{sku}/{groupKey}', self::ROUTE_CART_REMOVE, 'Cart', 'Cart', 'remove')
            ->assert('sku', '[a-zA-Z0-9-_]+')
            ->value('groupKey', '')
        ;

        $this->createGetController('/cart/quantity/{sku}/{absolute}', self::ROUTE_CART_CHANGE_QUANTITY, 'Cart', 'Cart', 'change')
            ->assert('sku', '[a-zA-Z0-9-_]+')
            ->value('groupKey', '')
            ->assert('absolute', '[0-1-_]+')
        ;

        $this->createGetController('/cart/overlay', self::ROUTE_CART_OVERLAY, 'Cart', 'Ajax', 'index');

        $this->createPostController('/cart/add/{sku}', self::ROUTE_CART_ADD_AJAX, 'Cart', 'Ajax', 'add', true)
            ->assert('sku', '[a-zA-Z0-9-_]+')
            ->convert('quantity', [$this, 'getQuantityFromRequest'])
        ;

        $this->createPostController('/cart/remove/{sku}/{groupKey}', self::ROUTE_CART_REMOVE_AJAX, 'Cart', 'Ajax', 'remove', true)
            ->assert('sku', '[a-zA-Z0-9-_]+')
            ->value('groupKey', '')
        ;

        $this->createPostController('/cart/increase/{sku}/{groupKey}', self::ROUTE_CART_INCREASE_AJAX, 'Cart', 'Ajax', 'increase')
            ->assert('sku', '[a-zA-Z0-9-_]+')
            ->value('groupKey', '')
        ;

        $this->createPostController('/cart/decrease/{sku}/{groupKey}', self::ROUTE_CART_DECREASE_AJAX, 'Cart', 'Ajax', 'decrease')
            ->assert('sku', '[a-zA-Z0-9-_]+')
            ->value('groupKey', '')
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
    }

    /**
     * @param mixed $unusedParameter
     * @param Request $request
     *
     * @return int
     */
    public function getQuantityFromRequest($unusedParameter, Request $request)
    {
        if ($request->isMethod('POST')) {
            return (int) $request->request->get('quantity', 1);
        }

        return (int) $request->query->get('quantity', 1);
    }

}
