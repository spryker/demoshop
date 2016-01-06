<?php

namespace Pyz\Yves\Payolution\Form;

use Generated\Shared\Transfer\PayolutionCalculationRequestTransfer;
use Generated\Shared\Transfer\PayolutionPaymentTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Client\Payolution\PayolutionClientInterface;
use Spryker\Shared\Gui\Form\AbstractForm;
use Spryker\Shared\Library\Currency\CurrencyManager;
use Spryker\Shared\Transfer\TransferInterface;
use Symfony\Component\Form\FormBuilderInterface;

class InstallmentForm extends AbstractForm
{

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
        return 'payolutionInstallment';
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
        $this->addInstallmentPaymentDetails($builder)
             ->addDateOfBirth($builder)
             ->addBankAccountHolder($builder)
             ->addBankAccountIban($builder)
             ->addBankAccountBic($builder);
    }

    /**
     * @param FormBuilderInterface $builder
     *
     * @return self
     */
    public function addInstallmentPaymentDetails(FormBuilderInterface $builder)
    {
        $builder->add(
            self::FIELD_INSTALLMENT_PAYMENT_DETAIL_INDEX,
            'choice',
            [
                'choices' => $this->getInstallmentPayments(),
                'label' => false,
                'required' => false,
                'expanded' => true,
                'multiple' => false,
                'empty_value' => false,
            ]
        );

        return $this;
    }

    /**
     * @param FormBuilderInterface $builder
     *
     * @return self
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
     * @return self
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
     * @return self
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
     * @return self
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
     * @return array
     */
    protected function getInstallmentPayments()
    {
        $calculationResponseTransfer =  $this->payolutionClient->calculateInstallmentPayments($this->quoteTransfer);
        $paymentDetails = $calculationResponseTransfer->getPaymentDetails();
        $choices = [];

        foreach ($paymentDetails as $paymentDetail) {
            $choices[] =
                CurrencyManager::getInstance()->convertCentToDecimal($paymentDetail->getInstallments()[0]->getAmount())
                . ' € for ' .
                $paymentDetail->getDuration()
                . ' months ';
//                . '<a href="installment/id/' . $calculationResponseTransfer->getIdentificationUniqueid() . '/duration/' . $paymentDetail->getDuration() . '"">Show Details</a>';
        }

        return $choices;
    }

    /**
     * @return TransferInterface|array
     */
    public function populateFormFields()
    {
        return [];
    }

}
