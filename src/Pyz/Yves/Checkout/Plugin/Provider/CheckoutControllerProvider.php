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

    const CHECKOUT_OFFER_INDEX = 'checkout-offer-index';
    const CHECKOUT_OFFER_ADDRESS = 'checkout-offer-address';
    const CHECKOUT_OFFER_SHIPMENT = 'checkout-offer-shipment';
    const CHECKOUT_OFFER_PAYMENT = 'checkout-offer-payment';
    const CHECKOUT_OFFER_SUMMARY = 'checkout-offer-summary';
    const CHECKOUT_PLACE_OFFER = 'checkout-place-offer';
    const CHECKOUT_OFFER_SUCCESS = 'checkout-offer-success';
    const CHECKOUT_OFFER_CUSTOMER = 'checkout-offer-customer';

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

        //TODO: clarify why we need to replace checkout variable with checkout word instead of just using the word itself.
        $this->createController('/{checkout}/offer', self::CHECKOUT_OFFER_INDEX, 'Checkout', 'OfferCheckout', 'index')
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout')
            ->method('GET|POST');

        $this->createController('/{checkout}/offer/customer', self::CHECKOUT_OFFER_CUSTOMER, 'Checkout', 'OfferCheckout', 'customer')
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout')
            ->method('GET|POST');

        //TODO: probably rename placeOrder action to placeOffer
        $this->createController('/{checkout}/offer/place-offer', self::CHECKOUT_PLACE_OFFER, 'Checkout', 'OfferCheckout', 'placeOrder')
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout')
            ->method('GET|POST');

        $this->createController('/{checkout}/offer/success', self::CHECKOUT_OFFER_SUCCESS, 'Checkout', 'OfferCheckout', 'success')
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout')
            ->method('GET|POST');

        $this->createController('/{checkout}/offer/address', self::CHECKOUT_OFFER_ADDRESS, 'Checkout', 'OfferCheckout', 'address')
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout')
            ->method('GET|POST');

        $this->createController('/{checkout}/offer/shipment', self::CHECKOUT_OFFER_SHIPMENT, 'Checkout', 'OfferCheckout', 'shipment')
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout')
            ->method('GET|POST');

        $this->createController('/{checkout}/offer/payment', self::CHECKOUT_OFFER_PAYMENT, 'Checkout', 'OfferCheckout', 'payment')
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout')
            ->method('GET|POST');

        $this->createController('/{checkout}/offer/summary', self::CHECKOUT_OFFER_SUMMARY, 'Checkout', 'OfferCheckout', 'summary')
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout')
            ->method('GET|POST');
    }
}
