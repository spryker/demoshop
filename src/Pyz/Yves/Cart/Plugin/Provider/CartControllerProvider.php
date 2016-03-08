<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Cart\Plugin\Provider;

use Pyz\Yves\Application\Plugin\Provider\AbstractYvesControllerProvider;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class CartControllerProvider extends AbstractYvesControllerProvider
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

    const ROUTE_CART_VOUCHER_ADD = 'cart/voucher/add';
    const ROUTE_CART_VOUCHER_REMOVE = 'cart/voucher/remove';
    const ROUTE_CART_VOUCHER_CLEAR = 'cart/voucher/clear';

    /**
     * @param \Silex\Application $app
     */
    protected function defineControllers(Application $app)
    {
        $allowedLocalesPattern = $this->getAllowedLocalesPattern();

        $this->createGetController('/{cart}', self::ROUTE_CART, 'Cart', 'Cart')
            ->assert('cart', $allowedLocalesPattern . 'cart|cart')
            ->value('cart', 'cart');

        $this->createGetController('/{cart}/add/{sku}', self::ROUTE_CART_ADD, 'Cart', 'Cart', 'add')
            ->assert('cart', $allowedLocalesPattern . 'cart|cart')
            ->value('cart', 'cart')
            ->assert('sku', '[a-zA-Z0-9-_]+')
            ->convert('quantity', [$this, 'getQuantityFromRequest']);

        $this->createGetController('/{cart}/remove/{sku}/{groupKey}', self::ROUTE_CART_REMOVE, 'Cart', 'Cart', 'remove')
            ->assert('cart', $allowedLocalesPattern . 'cart|cart')
            ->value('cart', 'cart')
            ->assert('sku', '[a-zA-Z0-9-_]+')
            ->value('groupKey', '');

        $this->createGetController('/{cart}/change/{sku}/{quantity}', self::ROUTE_CART_CHANGE_QUANTITY, 'Cart', 'Cart', 'change')
            ->assert('cart', $allowedLocalesPattern . 'cart|cart')
            ->assert('sku', '[a-zA-Z0-9-_]+')
            ->method('POST');

        $this->createGetController('/{cart}/overlay', self::ROUTE_CART_OVERLAY, 'Cart', 'Ajax', 'index')
            ->assert('cart', $allowedLocalesPattern . 'cart|cart')
            ->value('cart', 'cart');

        $this->createPostController('/{cart}/add/{sku}', self::ROUTE_CART_ADD_AJAX, 'Cart', 'Ajax', 'add', true)
            ->assert('sku', '[a-zA-Z0-9-_]+')
            ->convert('quantity', [$this, 'getQuantityFromRequest']);

        $this->createPostController('/{cart}/remove/{sku}/{groupKey}', self::ROUTE_CART_REMOVE_AJAX, 'Cart', 'Ajax', 'remove', true)
            ->assert('cart', $allowedLocalesPattern . 'cart|cart')
            ->assert('sku', '[a-zA-Z0-9-_]+')
            ->value('groupKey', '')
            ->value('cart', 'cart');

        $this->createPostController('/{cart}/increase/{sku}/{groupKey}', self::ROUTE_CART_INCREASE_AJAX, 'Cart', 'Ajax', 'increase')
            ->assert('cart', $allowedLocalesPattern . 'cart|cart')
            ->assert('sku', '[a-zA-Z0-9-_]+')
            ->value('groupKey', '');

        $this->createPostController('/{cart}/decrease/{sku}/{groupKey}', self::ROUTE_CART_DECREASE_AJAX, 'Cart', 'Ajax', 'decrease')
            ->assert('cart', $allowedLocalesPattern . 'cart|cart')
            ->assert('sku', '[a-zA-Z0-9-_]+')
            ->value('groupKey', '');

        $this->createGetController('/{cart}/voucher/add', self::ROUTE_CART_VOUCHER_ADD, 'Cart', 'Voucher', 'add')
            ->assert('cart', $allowedLocalesPattern . 'cart|cart')
            ->convert(
                'voucherCode',
                function ($unused, Request $request) {
                    return $request->query->get('code');
                }
            );

        $this->createGetController('/{cart}/voucher/remove', self::ROUTE_CART_VOUCHER_REMOVE, 'Cart', 'Voucher', 'remove')
            ->assert('cart', $allowedLocalesPattern . 'cart|cart')
            ->convert(
                'voucherCode',
                function ($unused, Request $request) {
                    return $request->query->get('code');
                }
            );

        $this->createGetController('/{cart}/voucher/clear', self::ROUTE_CART_VOUCHER_CLEAR, 'Cart', 'Voucher', 'clear')
            ->assert('cart', $allowedLocalesPattern . 'cart|cart');
    }

    /**
     * @param mixed $unusedParameter
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return int
     */
    public function getQuantityFromRequest($unusedParameter, Request $request)
    {
        if ($request->isMethod('POST')) {
            return $request->request->getInt('quantity', 1);
        }

        return $request->query->getInt('quantity', 1);
    }

}
