<?php

namespace Pyz\Yves\Payolution\Handler;

use Generated\Shared\Transfer\PayolutionPaymentTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Client\Payolution\PayolutionClientInterface;
use Spryker\Shared\Library\Currency\CurrencyManager;
use Spryker\Shared\Payolution\PayolutionConstants;
use Symfony\Component\HttpFoundation\Request;

class PayolutionHandler
{

    /**
     * @var PayolutionClientInterface
     */
    protected $payolutionClient;

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
     * @param PayolutionClientInterface $payolutionClient
     */
    public function __construct(PayolutionClientInterface $payolutionClient)
    {
        $this->payolutionClient = $payolutionClient;
    }

    /**
     * @param Request $request
     * @param QuoteTransfer $quoteTransfer
     *
     * @return QuoteTransfer
     */
    public function addPaymentToQuote(Request $request, QuoteTransfer $quoteTransfer)
    {
        $payolutionPaymentTransfer = $quoteTransfer->getPayment()->getPayolution();
        $billingAddress = $quoteTransfer->getBillingAddress();

        $payolutionPaymentTransfer
            ->setAccountBrand(self::$payolutionPaymentMethodMapper[$quoteTransfer->getPayment()->getPaymentSelection()])
            ->setAddress($billingAddress)
            ->setGender(self::$payolutionGenderMapper[$billingAddress->getSalutation()])
            ->setEmail($quoteTransfer->getCustomer()->getEmail())
            ->setCurrencyIso3Code($this->getCurrency())
            ->setLanguageIso2Code($billingAddress->getIso2Code())
            ->setClientIp($request->getClientIp());

        if ($payolutionPaymentTransfer->getAccountBrand() === PayolutionConstants::BRAND_INSTALLMENT) {
            $this->setPayolutionInstallmentPayment($payolutionPaymentTransfer);
        }

        return $quoteTransfer;
    }

    /**
     * @param PayolutionPaymentTransfer $payolutionPaymentTransfer
     *
     * @return PayolutionPaymentTransfer
     */
    protected function setPayolutionInstallmentPayment(PayolutionPaymentTransfer $payolutionPaymentTransfer)
    {
        if ($this->payolutionClient->hasInstallmentPaymentsInSession() === false) {
            return $payolutionPaymentTransfer;
        }

        $payolutionCalculationResponseTransfer = $this->payolutionClient->getInstallmentPaymentsFromSession();

        $installmentPaymentDetail = $payolutionCalculationResponseTransfer
            ->getPaymentDetails()[$payolutionPaymentTransfer->getInstallmentPaymentDetailIndex()];

        $payolutionPaymentTransfer
            ->setInstallmentCalculationId($payolutionCalculationResponseTransfer->getIdentificationUniqueid())
            ->setInstallmentAmount($installmentPaymentDetail->getInstallments()[0]->getAmount())
            ->setInstallmentDuration($installmentPaymentDetail->getDuration());

        return $payolutionPaymentTransfer;
    }

    /**
     * @return string
     */
    protected function getCurrency()
    {
        return CurrencyManager::getInstance()->getDefaultCurrency()->getIsoCode();
    }

}
