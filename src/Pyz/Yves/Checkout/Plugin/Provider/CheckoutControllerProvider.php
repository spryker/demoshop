<?php

namespace Pyz\Yves\Checkout\Plugin\Provider;

use Pyz\Yves\Application\Plugin\Provider\AbstractYvesControllerProvider;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class CheckoutControllerProvider extends AbstractYvesControllerProvider
{

    const ROUTE_CHECKOUT = 'checkout';
    const ROUTE_CHECKOUT_SUBMIT = 'checkout/buy';
    const ROUTE_CHECKOUT_SUCCESS = 'checkout/success';
    const ROUTE_CHECKOUT_REGULAR_REDIRECT_PAYMENT_CANCELLATION = 'checkout/regular-redirect-payment-cancellation';

    protected function defineControllers(Application $app)
    {
        $allowedLocalesPattern = $this->getAllowedLocalesPattern();

        $this->createController('/{checkout}', self::ROUTE_CHECKOUT, 'Checkout', 'Checkout')
            ->method(Request::METHOD_GET)
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout');

        $this->createController('/{checkout}/buy', self::ROUTE_CHECKOUT_SUBMIT, 'Checkout', 'Checkout', 'buy')
            ->method(Request::METHOD_POST)
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout');

        $this->createGetController(
            '/{checkout}/success',
            self::ROUTE_CHECKOUT_SUCCESS,
            'Checkout',
            'Checkout',
            'success'
        )
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout');

        $this->createController(
            '/{checkout}/regular-redirect-payment-cancellation',
            self::ROUTE_CHECKOUT_REGULAR_REDIRECT_PAYMENT_CANCELLATION,
            'Checkout',
            'Checkout',
            'regularRedirectPaymentCancellation'
        )
        ->method(Request::METHOD_GET . '|' . Request::METHOD_POST)
        ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
        ->value('checkout', 'checkout');
    }

}
