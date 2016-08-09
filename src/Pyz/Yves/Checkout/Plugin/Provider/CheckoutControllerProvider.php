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

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function defineControllers(Application $app)
    {
        $this->createController('/checkout', self::CHECKOUT_INDEX, 'Checkout', 'Checkout', 'index')
            ->method('GET|POST');

        $this->createController('/checkout/customer', self::CHECKOUT_CUSTOMER, 'Checkout', 'Checkout', 'customer')
            ->method('GET|POST');

        $this->createController('/checkout/address', self::CHECKOUT_ADDRESS, 'Checkout', 'Checkout', 'address')
            ->method('GET|POST');

        $this->createController('/checkout/shipment', self::CHECKOUT_SHIPMENT, 'Checkout', 'Checkout', 'shipment')
            ->method('GET|POST');

        $this->createController('/checkout/payment', self::CHECKOUT_PAYMENT, 'Checkout', 'Checkout', 'payment')
            ->method('GET|POST');

        $this->createController('/checkout/summary', self::CHECKOUT_SUMMARY, 'Checkout', 'Checkout', 'summary')
            ->method('GET|POST');

        $this->createController('/checkout/place-order', self::CHECKOUT_PLACE_ORDER, 'Checkout', 'Checkout', 'placeOrder')
            ->method('GET|POST');

        $this->createController('/checkout/error', self::CHECKOUT_ERROR, 'Checkout', 'Checkout', 'error')
            ->method('GET|POST');

        $this->createController('/checkout/success', self::CHECKOUT_SUCCESS, 'Checkout', 'Checkout', 'success')
            ->method('GET|POST');
    }

}
