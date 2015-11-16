<?php

namespace Pyz\Yves\Checkout\Communication\Plugin;

use SprykerEngine\Yves\Application\Communication\Plugin\YvesControllerProvider;
use Silex\Application;

class CheckoutControllerProvider extends YvesControllerProvider
{

    const ROUTE_CHECKOUT = 'checkout';
    const ROUTE_CHECKOUT_SUCCESS = 'checkout/success';
    const ROUTE_CHECKOUT_REGULAR_REDIRECT_PAYMENT_CANCELLATION = 'checkout/regular-redirect-payment-cancellation';
    const ROUTE_CHECKOUT_AJAX_CART = 'checkout/ajax-cart';
    const ROUTE_ADD_COUPON_CODE = 'checkout/add-coupon';
    const ROUTE_REMOVE_COUPON_CODE = 'checkout/remove-coupon';
    const ROUTE_CHECKOUT_AJAX_SHIPMENT_PRICE = 'checkout/get-shipment-fee';
    const ROUTE_CHECKOUT_AJAX_EXPENSE = 'checkout/ajax-expense';

    protected function defineControllers(Application $app)
    {
        $this->createController('/checkout', self::ROUTE_CHECKOUT, 'Checkout', 'Checkout')->method('GET|POST');

        $this->createGetController(
            '/checkout/success',
            self::ROUTE_CHECKOUT_SUCCESS,
            'Checkout',
            'Checkout',
            'success'
        );
        $this->createGetController(
            '/checkout/regular-redirect-payment-cancellation',
            self::ROUTE_CHECKOUT_REGULAR_REDIRECT_PAYMENT_CANCELLATION,
            'Checkout',
            'Checkout',
            'regularRedirectPaymentCancellation'
        )->method('GET|POST');

        $this->createController('/checkout/ajax-cart', self::ROUTE_CHECKOUT_AJAX_CART, 'Checkout', 'Ajax', 'cart')
             ->method('GET');

        $this->createController('checkout/add-coupon', self::ROUTE_ADD_COUPON_CODE, 'Checkout', 'Ajax', 'addCoupon')
            ->method('POST');

        $this->createController('checkout/remove-coupon', self::ROUTE_REMOVE_COUPON_CODE, 'Checkout', 'Ajax', 'removeCoupon')
            ->method('POST');

        $this->createController('/checkout/get-shipment-fee',
            self::ROUTE_CHECKOUT_AJAX_SHIPMENT_PRICE,
            'Checkout',
            'Ajax',
            'getShipmentFee'
        )->method('GET|POST');
    }

}
