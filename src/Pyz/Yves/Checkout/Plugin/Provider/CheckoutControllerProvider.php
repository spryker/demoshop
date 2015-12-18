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
    const ROUTE_INSTALLMENT_DETAIL = 'installment/detail/id/{id}/duration/{duration}';

    const CHECKOUT_ADDRESS = 'checkout-address';

    const CHECKOUT_SHIPMENT = 'checkout-shipment';

    const CHECKOUT_PAYMENT = 'checkout-payment';

    const CHECKOUT_SUMMARY = 'checkout-summary';

    const CHECKOUT_REGISTER = 'checkout-register';

    protected function defineControllers(Application $app)
    {
        $allowedLocalesPattern = $this->getAllowedLocalesPattern();



        $this->createController('/checkout/address', self::CHECKOUT_ADDRESS, 'Checkout', 'MultipageCheckout', 'address')
            ->method('GET|POST');

        $this->createController('/checkout/shipment', self::CHECKOUT_SHIPMENT,'Checkout', 'MultipageCheckout', 'shipment')
            ->method('GET|POST');

        $this->createController('/checkout/payment', self::CHECKOUT_PAYMENT, 'Checkout', 'MultipageCheckout', 'payment')
            ->method('GET|POST');

        $this->createController('/checkout/summary', self::CHECKOUT_SUMMARY, 'Checkout', 'MultipageCheckout', 'summary')
            ->method('GET|POST');


        $this->createController('/checkout/register', self::CHECKOUT_REGISTER, 'Checkout', 'MultipageCheckout', 'register')
            ->method('GET|POST');

        $this->createController('/checkout/clear', 'checkout-c', 'Checkout', 'MultipageCheckout', 'clear')
            ->method('GET|POST');



        $this->createController('/{checkout}', self::ROUTE_CHECKOUT, 'Checkout', 'Checkout')->method('GET|POST')
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

        $this->createGetController(
            '/installment/id/{calculationRequestId}/duration/{installmentDuration}',
            self::ROUTE_INSTALLMENT_DETAIL,
            'Checkout',
            'Checkout',
            'displayInstallmentDetails'
        )
            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
            ->value('checkout', 'checkout');
    }

}
