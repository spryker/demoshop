<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Checkout\Plugin\Provider;

use Pyz\Yves\Application\Plugin\Provider\AbstractYvesControllerProvider;
use Silex\Application;

class CheckoutControllerProvider extends AbstractYvesControllerProvider
{
    const CHECKOUT_CUSTOMER = 'checkout-customer';
    const CHECKOUT_ADDRESS = 'checkout-address';
    const CHECKOUT_SHIPMENT = 'checkout-shipment';
    const CHECKOUT_PAYMENT = 'checkout-payment';
    const CHECKOUT_SUMMARY = 'checkout-summary';
    const CHECKOUT_PLACE_ORDER = 'checkout-place-order';
    const CHECKOUT_ERROR = 'checkout-error';
    const CHECKOUT_SUCCESS = 'checkout-success';
    const CHECKOUT_INDEX = 'checkout-index';
    const CHECKOUT_VOUCHER_ADD = 'checkout-voucher-add';

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function defineControllers(Application $app)
    {
        $allowedLocalesPattern = $this->getAllowedLocalesPattern();

        $this->createController('/{checkout}', self::CHECKOUT_INDEX, 'Checkout', 'Checkout', 'index')
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout')
            ->method('GET|POST');

        $this->createController('/{checkout}/customer', self::CHECKOUT_CUSTOMER, 'Checkout', 'Checkout', 'customer')
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout')
            ->method('GET|POST');

        $this->createController('/{checkout}/address', self::CHECKOUT_ADDRESS, 'Checkout', 'Checkout', 'address')
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout')
            ->method('GET|POST');

        $this->createController('/{checkout}/shipment', self::CHECKOUT_SHIPMENT, 'Checkout', 'Checkout', 'shipment')
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout')
            ->method('GET|POST');

        $this->createController('/{checkout}/payment', self::CHECKOUT_PAYMENT, 'Checkout', 'Checkout', 'payment')
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout')
            ->method('GET|POST');

        $this->createController('/{checkout}/summary', self::CHECKOUT_SUMMARY, 'Checkout', 'Checkout', 'summary')
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout')
            ->method('GET|POST');

        $this->createController('/{checkout}/place-order', self::CHECKOUT_PLACE_ORDER, 'Checkout', 'Checkout', 'placeOrder')
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout')
            ->method('GET|POST');

        $this->createController('/{checkout}/error', self::CHECKOUT_ERROR, 'Checkout', 'Checkout', 'error')
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout')
            ->method('GET|POST');

        $this->createController('/{checkout}/success', self::CHECKOUT_SUCCESS, 'Checkout', 'Checkout', 'success')
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout')
            ->method('GET|POST');

        $this->createController('/{checkout}/add-voucher', self::CHECKOUT_VOUCHER_ADD, 'Checkout', 'Checkout', 'addVoucher')
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout')
            ->method('GET|POST');
    }
}
