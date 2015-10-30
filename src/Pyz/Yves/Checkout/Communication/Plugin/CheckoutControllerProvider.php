<?php

namespace Pyz\Yves\Checkout\Communication\Plugin;

use SprykerEngine\Yves\Application\Communication\Plugin\YvesControllerProvider;
use Silex\Application;

class CheckoutControllerProvider extends YvesControllerProvider
{

    const ROUTE_CHECKOUT = 'checkout';
    const ROUTE_CHECKOUT_SUCCESS = 'checkout/success';
    const ROUTE_CHECKOUT_REGULAR_REDIRECT_PAYMENT_CANCELLATION = 'checkout/regular-redirect-payment-cancellation';
    const ROUTE_CHECKOUT_AJAX_CART = 'checkout-ajax-cart';

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

        $this->createController('/checkout-ajax-cart', self::ROUTE_CHECKOUT_AJAX_CART, 'Checkout', 'Ajax', 'cart')
             ->method('GET|POST');
    }

}
