<?php

namespace Pyz\Yves\Braintree\Handler;

use Generated\Shared\Transfer\PaymentTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Client\Braintree\BraintreeClientInterface;
use Spryker\Shared\Library\Currency\CurrencyManager;
use Spryker\Shared\Braintree\BraintreeConstants;
use Symfony\Component\HttpFoundation\Request;

class BraintreeHandler
{

    const PAYMENT_PROVIDER = 'braintree';

    /**
     * @var array
     */
    protected static $paymentMethods = [
        PaymentTransfer::BRAINTREE => 'paypal',
    ];

    /**
     * @var array
     */
    protected static $braintreePaymentMethodMapper = [
        PaymentTransfer::BRAINTREE => BraintreeConstants::METHOD_PAY_PAL,
    ];

    /**
     * @var \Spryker\Client\Braintree\BraintreeClientInterface
     */
    protected $braintreeClient;

    /**
     * @param \Spryker\Client\Braintree\BraintreeClientInterface $braintreeClient
     */
    public function __construct(BraintreeClientInterface $braintreeClient)
    {
        $this->braintreeClient = $braintreeClient;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function addPaymentToQuote(Request $request, QuoteTransfer $quoteTransfer)
    {
        $paymentSelection = $quoteTransfer->getPayment()->getPaymentSelection();

        $this->setPaymentProviderAndMethod($quoteTransfer, $paymentSelection);
        $this->setBraintreePayment($request, $quoteTransfer, $paymentSelection);

        return $quoteTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @param string $paymentSelection
     *
     * @return void
     */
    protected function setPaymentProviderAndMethod(QuoteTransfer $quoteTransfer, $paymentSelection)
    {
        $quoteTransfer->getPayment()
            ->setPaymentProvider(self::PAYMENT_PROVIDER)
            ->setPaymentMethod(self::$paymentMethods[$paymentSelection]);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @param string $paymentSelection
     *
     * @return void
     */
    protected function setBraintreePayment(Request $request, QuoteTransfer $quoteTransfer, $paymentSelection)
    {
        $braintreePaymentTransfer = $quoteTransfer->getPayment()->getBraintree();

        $nonce = $request->request->get('payment_method_nonce');
        if ($nonce === null) {
            return;
        }

        $braintreePaymentTransfer
            ->setAccountBrand(self::$braintreePaymentMethodMapper[$paymentSelection])
            //->setAddress($billingAddress)
            //->setEmail($quoteTransfer->getCustomer()->getEmail())
            //->setCurrencyIso3Code($this->getCurrency())
            //->setLanguageIso2Code($billingAddress->getIso2Code())
            //->setClientIp($request->getClientIp());
            ->setNonce($nonce);
    }

    /**
     * @return string
     */
    protected function getCurrency()
    {
        return CurrencyManager::getInstance()->getDefaultCurrency()->getIsoCode();
    }

}
