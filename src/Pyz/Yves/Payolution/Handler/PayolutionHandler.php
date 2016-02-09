<?php

namespace Pyz\Yves\Payolution\Handler;

use Generated\Shared\Transfer\AddressTransfer;
use Generated\Shared\Transfer\PayolutionPaymentTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Client\Payolution\PayolutionClientInterface;
use Spryker\Shared\Library\Currency\CurrencyManager;
use Spryker\Shared\Payolution\PayolutionConstants;
use Symfony\Component\HttpFoundation\Request;

class PayolutionHandler
{

    const PAYMENT_PROVIDER = 'payolution';

    /**
     * @var array
     */
    protected static $paymentMethods = [
        'payolution_invoice' => 'invoice',
        'payolution_installment' => 'installment',
    ];

    /**
     * @var array
     */
    protected static $payolutionPaymentMethodMapper = [
        'payolution_invoice' => PayolutionConstants::BRAND_INVOICE,
        'payolution_installment' => PayolutionConstants::BRAND_INSTALLMENT,
    ];

    /**
     * @var array
     */
    protected static $payolutionGenderMapper = [
        'Mr' => 'Male',
        'Mrs' => 'Female',
    ];

    /**
     * @var \Spryker\Client\Payolution\PayolutionClientInterface
     */
    protected $payolutionClient;

    /**
     * @param \Spryker\Client\Payolution\PayolutionClientInterface $payolutionClient
     */
    public function __construct(PayolutionClientInterface $payolutionClient)
    {
        $this->payolutionClient = $payolutionClient;
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
        $this->setPayolutionPayment($request, $quoteTransfer, $paymentSelection);

        return $quoteTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @param $paymentSelection
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
    protected function setPayolutionPayment(Request $request, QuoteTransfer $quoteTransfer, $paymentSelection)
    {
        $payolutionPaymentTransfer = $quoteTransfer->getPayment()->getPayolution();
        $billingAddress = $quoteTransfer->getBillingAddress();

        $payolutionPaymentTransfer
            ->setAccountBrand(self::$payolutionPaymentMethodMapper[$paymentSelection])
            ->setAddress($billingAddress)
            ->setGender(self::$payolutionGenderMapper[$billingAddress->getSalutation()])
            ->setEmail($quoteTransfer->getCustomer()->getEmail())
            ->setCurrencyIso3Code($this->getCurrency())
            ->setLanguageIso2Code($billingAddress->getIso2Code())
            ->setClientIp($request->getClientIp());

        if ($payolutionPaymentTransfer->getAccountBrand() === PayolutionConstants::BRAND_INSTALLMENT) {
            $this->setPayolutionInstallmentPayment($payolutionPaymentTransfer);
        }
    }

    /**
     * @param \Generated\Shared\Transfer\PayolutionPaymentTransfer $payolutionPaymentTransfer
     *
     * @return void
     */
    protected function setPayolutionInstallmentPayment(PayolutionPaymentTransfer $payolutionPaymentTransfer)
    {
        if ($this->payolutionClient->hasInstallmentPaymentsInSession() === true) {
            $payolutionCalculationResponseTransfer = $this->payolutionClient->getInstallmentPaymentsFromSession();

            $installmentPaymentDetail = $payolutionCalculationResponseTransfer
                ->getPaymentDetails()[$payolutionPaymentTransfer->getInstallmentPaymentDetailIndex()];

            $payolutionPaymentTransfer
                ->setInstallmentCalculationId($payolutionCalculationResponseTransfer->getIdentificationUniqueid())
                ->setInstallmentAmount($installmentPaymentDetail->getInstallments()[0]->getAmount())
                ->setInstallmentDuration($installmentPaymentDetail->getDuration());
        }
    }

    /**
     * @return string
     */
    protected function getCurrency()
    {
        return CurrencyManager::getInstance()->getDefaultCurrency()->getIsoCode();
    }

}
