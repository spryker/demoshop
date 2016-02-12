<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Payolution\Form\DataProvider;

use Generated\Shared\Transfer\PaymentTransfer;
use Generated\Shared\Transfer\PayolutionCalculationPaymentDetailTransfer;
use Generated\Shared\Transfer\PayolutionCalculationResponseTransfer;
use Generated\Shared\Transfer\PayolutionPaymentTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Checkout\Dependency\DataProvider\DataProviderInterface;
use Spryker\Client\Payolution\PayolutionClientInterface;
use Pyz\Yves\Payolution\Form\InstallmentSubForm;
use Spryker\Shared\Library\Currency\CurrencyManager;

class InstallmentDataProvider implements DataProviderInterface
{
    /**
     * @var \Spryker\Client\Payolution\PayolutionClientInterface
     */
    protected $payolutionClient;

    /**
     * InstallmentDataProvider constructor.
     */
    public function __construct(PayolutionClientInterface $payolutionClient)
    {
        $this->payolutionClient = $payolutionClient;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function getData(QuoteTransfer $quoteTransfer)
    {
        if (empty($quoteTransfer->getPayment())) {
            $paymentTransfer = new PaymentTransfer();
            $paymentTransfer->setPayolution(new PayolutionPaymentTransfer());
            $quoteTransfer->setPayment($paymentTransfer);
        }

        return $quoteTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return array
     */
    public function getOptions(QuoteTransfer $quoteTransfer)
    {
        return [
            InstallmentSubForm::OPTION_INSTALLMENT_PAYMENT_DETAIL => $this->getInstallmentPaymentChoices(
                $quoteTransfer
            ),
        ];
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return array
     */
    protected function getInstallmentPaymentChoices(QuoteTransfer $quoteTransfer)
    {
        $calculationResponseTransfer = $this->getInstallmentPayments($quoteTransfer);
        return $this->buildChoices($calculationResponseTransfer->getPaymentDetails());
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\PayolutionCalculationResponseTransfer
     */
    protected function getInstallmentPayments(QuoteTransfer $quoteTransfer)
    {
        if ($this->payolutionClient->hasInstallmentPaymentsInSession()) {
            $calculationResponseTransfer = $this->payolutionClient->getInstallmentPaymentsFromSession();

            if ($this->isInstallmentPaymentsStillValid($quoteTransfer, $calculationResponseTransfer)) {
                return $calculationResponseTransfer;
            }
        }

        $calculationResponseTransfer = $this->payolutionClient->calculateInstallmentPayments($quoteTransfer);
        return $this->payolutionClient->storeInstallmentPaymentsInSession($calculationResponseTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @param \Generated\Shared\Transfer\PayolutionCalculationResponseTransfer $calculationResponseTransfer
     *
     * @return bool
     */
    protected function isInstallmentPaymentsStillValid(
        QuoteTransfer $quoteTransfer,
        PayolutionCalculationResponseTransfer $calculationResponseTransfer
    ) {
        if ($quoteTransfer->getTotals() === null) {
            return false;
        }

        return $quoteTransfer->getTotals()->getHash() === $calculationResponseTransfer->getTotalsAmountHash();
    }

    /**
     * @param \Generated\Shared\Transfer\PayolutionCalculationPaymentDetailTransfer[] $installmentPaymentDetails
     *
     * @return array
     */
    protected function buildChoices($installmentPaymentDetails)
    {
        $choices = [];
        foreach ($installmentPaymentDetails as $paymentDetail) {
            $choices[] = $this->buildChoice($paymentDetail);
        }

        return $choices;
    }

    /**
     * @param \Generated\Shared\Transfer\PayolutionCalculationPaymentDetailTransfer $paymentDetail
     *
     * @return string
     *
     * @todo: optimize format choices and add a Type for an installment choice
     */
    protected function buildChoice(PayolutionCalculationPaymentDetailTransfer $paymentDetail)
    {
        $choice =
            $paymentDetail->getCurrency() .
            $this->convertCentToDecimal($paymentDetail->getInstallments()[0]->getAmount()) .
            $paymentDetail->getDuration();

        return $choice;
    }

    /**
     * @param int $amount
     *
     * @return float
     */
    protected function convertCentToDecimal($amount)
    {
        return CurrencyManager::getInstance()->convertCentToDecimal($amount);
    }
}
