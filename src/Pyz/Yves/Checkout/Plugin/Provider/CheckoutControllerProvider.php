<?php

namespace Pyz\Yves\Checkout\Plugin\Provider;

use Pyz\Yves\Application\Plugin\Provider\AbstractYvesControllerProvider;
use Silex\Application;

class CheckoutControllerProvider extends AbstractYvesControllerProvider
{

    const CHECKOUT_ADDRESS = 'checkout-address';
    const CHECKOUT_SHIPMENT = 'checkout-shipment';
    const CHECKOUT_PAYMENT = 'checkout-payment';
    const CHECKOUT_SUMMARY = 'checkout-summary';

//    const ROUTE_CHECKOUT = 'checkout';
//    const ROUTE_CHECKOUT_SUBMIT = 'checkout/buy';
//    const ROUTE_CHECKOUT_SUCCESS = 'checkout/success';
//    const ROUTE_CHECKOUT_REGULAR_REDIRECT_PAYMENT_CANCELLATION = 'checkout/regular-redirect-payment-cancellation';
//    const ROUTE_INSTALLMENT_DETAIL = 'installment/detail/id/{id}/duration/{duration}';

    protected function defineControllers(Application $app)
    {
        $allowedLocalesPattern = $this->getAllowedLocalesPattern();

        $this->createController('/checkout/address', self::CHECKOUT_ADDRESS, 'Checkout', 'Checkout', 'address')
            ->method('GET|POST');

        $this->createController('/checkout/shipment', self::CHECKOUT_SHIPMENT,'Checkout', 'Checkout', 'shipment')
            ->method('GET|POST');

        $this->createController('/checkout/payment', self::CHECKOUT_PAYMENT, 'Checkout', 'Checkout', 'payment')
            ->method('GET|POST');

        $this->createController('/checkout/summary', self::CHECKOUT_SUMMARY, 'Checkout', 'Checkout', 'summary')
            ->method('GET|POST');

//        $this->createController('/{checkout}', self::ROUTE_CHECKOUT, 'Checkout', 'Checkout')->method('GET|POST')
//            ->method(Request::METHOD_GET)
//            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
//            ->value('checkout', 'checkout');
//
//        $this->createGetController(
//            '/installment/id/{calculationRequestId}/duration/{installmentDuration}',
//            self::ROUTE_INSTALLMENT_DETAIL,
//            'Checkout',
//            'Checkout',
//            'displayInstallmentDetails'
//        )
//            ->assert('checkout', $allowedLocalesPattern . 'checkout|checkout')
//            ->value('checkout', 'checkout');
    }

}
