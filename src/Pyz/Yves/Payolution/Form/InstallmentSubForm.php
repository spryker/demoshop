<?php

namespace Pyz\Yves\Payolution\Form;

use Generated\Shared\Transfer\PayolutionCalculationPaymentDetailTransfer;
use Generated\Shared\Transfer\PayolutionCalculationResponseTransfer;
use Generated\Shared\Transfer\PayolutionPaymentTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Client\Payolution\PayolutionClientInterface;
use Spryker\Shared\Library\Currency\CurrencyManager;
use Spryker\Shared\Transfer\TransferInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Spryker\Shared\Gui\Form\AbstractForm;
use Pyz\Yves\Checkout\Dependency\SubFormInterface;
use Spryker\Shared\Payolution\PayolutionConstants;

class InstallmentSubForm extends AbstractForm implements SubFormInterface
{

    const PAYMENT_PROVIDER = PayolutionConstants::PAYOLUTION;
    const PAYMENT_METHOD = 'installment';
    const FIELD_DATE_OF_BIRTH = 'date_of_birth';
    const FIELD_INSTALLMENT_PAYMENT_DETAIL_INDEX = 'installment_payment_detail_index';
    const FIELD_BANK_ACCOUNT_HOLDER = 'bank_account_holder';
    const FIELD_BANK_ACCOUNT_IBAN = 'bank_account_iban';
    const FIELD_BANK_ACCOUNT_BIC = 'bank_account_bic';

    /**
     * @var QuoteTransfer
     */
    protected $quoteTransfer;

    /**
     * @var PayolutionClientInterface
     */
    protected $payolutionClient;

    /**
     * @param QuoteTransfer $quoteTransfer
     * @param PayolutionClientInterface $payolutionClient
     */
    public function __construct(QuoteTransfer $quoteTransfer, PayolutionClientInterface $payolutionClient)
    {
        $this->quoteTransfer = $quoteTransfer;
        $this->payolutionClient = $payolutionClient;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return self::PAYMENT_PROVIDER . '_' . self::PAYMENT_METHOD;
    }

    /**
     * @return string
     */
    public function getPropertyPath()
    {
        return self::PAYMENT_PROVIDER;
    }

    /**
     * @return TransferInterface|null
     */
    protected function getDataClass()
    {
        return new PayolutionPaymentTransfer();
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->addInstallmentPaymentDetails($builder, $this->quoteTransfer)
             ->addDateOfBirth($builder)
             ->addBankAccountHolder($builder)
             ->addBankAccountIban($builder)
             ->addBankAccountBic($builder);
    }

    /**
     * @param FormBuilderInterface $builder
     * @param QuoteTransfer $quoteTransfer
     *
     * @return $this
     */
    public function addInstallmentPaymentDetails(FormBuilderInterface $builder, QuoteTransfer $quoteTransfer)
    {
        $builder->add(
            self::FIELD_INSTALLMENT_PAYMENT_DETAIL_INDEX,
            'choice',
            [
                'choices' => $this->getInstallmentPaymentChoices($quoteTransfer),
                'label' => false,
                'required' => false,
                'expanded' => false,
                'multiple' => false,
                'empty_value' => false,
            ]
        );

        return $this;
    }

    /**
     * @param FormBuilderInterface $builder
     *
     * @return InstallmentSubForm
     */
    protected function addDateOfBirth(FormBuilderInterface $builder)
    {
        $builder->add(
            self::FIELD_DATE_OF_BIRTH,
            'birthday',
            [
                'label' => false,
                'required' => false,
                'widget' => 'single_text',
                'format' => 'dd.MM.yyyy',
                'input' => 'string',
                'attr' => [
                    'placeholder' => 'customer.birth_date',
                ],
            ]
        );

        return $this;
    }

    /**
     * @param FormBuilderInterface $builder
     *
     * @return InstallmentSubForm
     */
    protected function addBankAccountHolder(FormBuilderInterface $builder)
    {
        $builder->add(
            self::FIELD_BANK_ACCOUNT_HOLDER,
            'text',
            [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Bank account holder',
                ],
            ]
        );

        return $this;
    }

    /**
     * @param FormBuilderInterface $builder
     *
     * @return InstallmentSubForm
     */
    protected function addBankAccountIban(FormBuilderInterface $builder)
    {
        $builder->add(
            self::FIELD_BANK_ACCOUNT_IBAN,
            'text',
            [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Bank account IBAN',
                ],
            ]
        );

        return $this;
    }

    /**
     * @param FormBuilderInterface $builder
     *
     * @return InstallmentSubForm
     */
    protected function addBankAccountBic(FormBuilderInterface $builder)
    {
        $builder->add(
            self::FIELD_BANK_ACCOUNT_BIC,
            'text',
            [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Bank account BIC',
                ],
            ]
        );

        return $this;
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return array
     */
    protected function getInstallmentPaymentChoices(QuoteTransfer $quoteTransfer)
    {
        $calculationResponseTransfer = $this->getInstallmentPayments($quoteTransfer);
        return $this->buildChoices($calculationResponseTransfer->getPaymentDetails());
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return PayolutionCalculationResponseTransfer
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
     * @param QuoteTransfer $quoteTransfer
     * @param PayolutionCalculationResponseTransfer $calculationResponseTransfer
     *
     * @return bool
     */
    protected function isInstallmentPaymentsStillValid(QuoteTransfer $quoteTransfer, PayolutionCalculationResponseTransfer $calculationResponseTransfer)
    {
        return $quoteTransfer->getTotals()->getHash() === $calculationResponseTransfer->getTotalsAmountHash();
    }

    /**
     * @param PayolutionCalculationPaymentDetailTransfer[] $installmentPaymentDetails
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
     * @param PayolutionCalculationPaymentDetailTransfer $paymentDetail
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
            // . '<a href="installment/id/' . $calculationResponseTransfer->getIdentificationUniqueid() . '/duration/' . $paymentDetail->getDuration() . '"">Show Details</a>';

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

    /**
     * @return TransferInterface|array
     */
    public function populateFormFields()
    {
        return [];
    }

}
