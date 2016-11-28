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

    const ROUTE_CART_VOUCHER_ADD = 'cart/voucher/add';
    const ROUTE_CART_VOUCHER_REMOVE = 'cart/voucher/remove';
    const ROUTE_CART_VOUCHER_CLEAR = 'cart/voucher/clear';

    const SKU_PATTERN = '[a-zA-Z0-9-_]+';

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function defineControllers(Application $app)
    {
        $allowedLocalesPattern = $this->getAllowedLocalesPattern();
        $controller = $this->createController('/{cart}', self::ROUTE_CART, 'Cart', 'Cart');
        $controller->assert('cart', $allowedLocalesPattern . 'cart|cart');
        $controller->value('cart', 'cart');

        $this->createController('/{cart}/add/{sku}', self::ROUTE_CART_ADD, 'Cart', 'Cart', 'add')
            ->assert('cart', $allowedLocalesPattern . 'cart|cart')
            ->value('cart', 'cart')
            ->assert('sku', self::SKU_PATTERN)
            ->convert('quantity', [$this, 'getQuantityFromRequest'])
            ->convert('optionValueIds', [$this, 'getProductOptionsFromRequest']);

        $this->createController('/{cart}/remove/{sku}/{groupKey}', self::ROUTE_CART_REMOVE, 'Cart', 'Cart', 'remove')
            ->assert('cart', $allowedLocalesPattern . 'cart|cart')
            ->value('cart', 'cart')
            ->assert('sku', self::SKU_PATTERN)
            ->value('groupKey', '');

        $this->createController('/{cart}/change/{sku}', self::ROUTE_CART_CHANGE_QUANTITY, 'Cart', 'Cart', 'change')
            ->assert('cart', $allowedLocalesPattern . 'cart|cart')
            ->value('cart', 'cart')
            ->assert('sku', self::SKU_PATTERN)
            ->convert('quantity', [$this, 'getQuantityFromRequest'])
            ->convert('groupKey', [$this, 'getGroupKeyFromRequest'])
            ->method('POST');

        $this->createController('/{cart}/voucher/add', self::ROUTE_CART_VOUCHER_ADD, 'Cart', 'Voucher', 'add')
            ->assert('cart', $allowedLocalesPattern . 'cart|cart')
            ->value('cart', 'cart');

        $this->createController('/{cart}/voucher/remove', self::ROUTE_CART_VOUCHER_REMOVE, 'Cart', 'Voucher', 'remove')
            ->assert('cart', $allowedLocalesPattern . 'cart|cart')
            ->value('cart', 'cart');

        $this->createController('/{cart}/voucher/clear', self::ROUTE_CART_VOUCHER_CLEAR, 'Cart', 'Voucher', 'clear')
            ->assert('cart', $allowedLocalesPattern . 'cart|cart')
            ->value('cart', 'cart');
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

    /**
     * @param mixed $unusedParameter
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return int
     */
    public function getProductOptionsFromRequest($unusedParameter, Request $request)
    {
        if ($request->isMethod('POST')) {
            return $request->request->get('product-option', []);
        }

        return $request->query->get('product-option', []);
    }

    /**
     * @param mixed $unusedParameter
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return int
     */
    public function getGroupKeyFromRequest($unusedParameter, Request $request)
    {
        if ($request->isMethod('POST')) {
            return $request->request->get('groupKey');
        }

        return $request->query->get('groupKey');
    }

}
