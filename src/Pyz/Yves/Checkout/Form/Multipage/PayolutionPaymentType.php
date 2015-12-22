<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Checkout\Form\Multipage;

use Spryker\Client\Payolution\PayolutionClientInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class PayolutionPaymentType extends AbstractType
{

    const FIELD_DATE_OF_BIRTH = 'date_of_birth';
    const FIELD_INSTALLMENT_PAYMENT_DETAIL_INDEX = 'installment_payment_detail_index';
    const FIELD_BANK_ACCOUNT_HOLDER = 'bank_account_holder';
    const FIELD_BANK_ACCOUNT_IBAN = 'bank_account_iban';
    const FIELD_BANK_ACCOUNT_BIC = 'bank_account_bic';

    /**
     * @var PayolutionClientInterface
     */
    protected $payolutionClient;

    /**
     * @param PayolutionClientInterface $payolutionClient
     */
    public function __construct(PayolutionClientInterface $payolutionClient)
    {
        $this->payolutionClient = $payolutionClient;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->addInstallmentPaymentDetails($builder, $options)
             ->addDateOfBirth($builder, $options)
             ->addBankAccountHolder($builder, $options)
             ->addBankAccountIban($builder, $options)
             ->addBankAccountBic($builder, $options);
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     *
     * @return self
     */
    public function addInstallmentPaymentDetails(FormBuilderInterface $builder, array $options)
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
     * @param array $options
     *
     * @return self
     */
    protected function addDateOfBirth(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            self::FIELD_DATE_OF_BIRTH,
            'birthday',
            [
                'label' => false,
                'required' => true,
                'widget' => 'single_text',
                'format' => 'dd.MM.yyyy',
                'attr' => [
                    'placeholder' => 'customer.birth_date',
                ],
            ]
        );

        return $this;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     *
     * @return self
     */
    protected function addBankAccountHolder(FormBuilderInterface $builder, array $options)
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
     * @param array $options
     *
     * @return self
     */
    protected function addBankAccountIban(FormBuilderInterface $builder, array $options)
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
     * @param array $options
     *
     * @return self
     */
    protected function addBankAccountBic(FormBuilderInterface $builder, array $options)
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
    public function getInstallmentPayments()
    {
//        $paymentDetails = $this->payolutionCalculationResponseTransfer->getPaymentDetails();
//        $choices = [];
//
//        // @ todo: optimize and get rid of magic strings and <a> tag by building a proper form #875
//        foreach ($paymentDetails as $paymentDetail) {
//            $choices[] =
//                CurrencyManager::getInstance()->convertCentToDecimal($paymentDetail->getInstallments()[0]->getAmount())
//                . ' € for ' .
//                $paymentDetail->getDuration()
//                . ' months '
//                . '<a href="installment/id/' . $this->payolutionCalculationResponseTransfer->getIdentificationUniqueid() . '/duration/' . $paymentDetail->getDuration() . '"">Show Details</a>';
//        }
//
//        return $choices;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'payolutionPaymentType';
    }

}
