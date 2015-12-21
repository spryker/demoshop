<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Checkout\Form\Multipage;

use Generated\Shared\Transfer\PayolutionCalculationResponseTransfer;
use Spryker\Shared\Library\Currency\CurrencyManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class PaymentType extends AbstractType
{

    const FIELD_DATE_OF_BIRTH = 'date_of_birth';
    const FIELD_PHONE = 'address_phone';
    const FIELD_INSTALLMENT_PAYMENT_DETAIL_INDEX = 'installment_payment_detail_index';
    const FIELD_BANK_ACCOUNT_HOLDER = 'bank_account_holder';
    const FIELD_BANK_ACCOUNT_IBAN = 'bank_account_iban';
    const FIELD_BANK_ACCOUNT_BIC = 'bank_account_bic';

    /**
     * @var PayolutionCalculationResponseTransfer
     */
    protected $payolutionCalculationResponseTransfer;


    public function __construct(PayolutionCalculationResponseTransfer $payolutionCalculationResponseTransfer)
    {
        $this->payolutionCalculationResponseTransfer = $payolutionCalculationResponseTransfer;
    }

    /**
     * @return string The name of this type
     */
    public function getName()
    {
        return 'payolutionPaymentType';
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add(self::FIELD_INSTALLMENT_PAYMENT_DETAIL_INDEX, 'choice', [
//                'choices' => $this->getInstallmentPayments(),
//                'label' => false,
//                'required' => false,
//                'expanded' => true,
//                'multiple' => false,
//                'empty_value' => false,
//                'attr' => [
//                    'class' => 'js-payolution-installment input_field field_full_size',
//                ],
//            ])
            ->add(self::FIELD_DATE_OF_BIRTH, 'birthday', [
                'label' => false,
                'required' => true,
                'widget' => 'single_text',
                'format' => 'dd.MM.yyyy',
                'attr' => [
                    'placeholder' => 'customer.birth_date',
                    'class' => 'padded js-checkout-payolution-payment-date-of-birth input_field field_left',
                ],
            ])
            ->add(self::FIELD_PHONE, 'text', [
                'label' => false,
                'required' => true,
                'attr' => [
                    'placeholder' => 'customer.phone',
                    'class' => 'padded js-checkout-payolution-payment-phone input_field field_right',
                ],
            ])
            ->add(self::FIELD_BANK_ACCOUNT_HOLDER, 'text', [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Bank account holder',
                    'class' => 'padded js-payolution-installment input_field field_left',
                ],
            ])
            ->add(self::FIELD_BANK_ACCOUNT_IBAN, 'text', [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Bank account IBAN',
                    'class' => 'padded js-payolution-installment input_field field_right',
                ],
            ])
            ->add(self::FIELD_BANK_ACCOUNT_BIC, 'text', [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Bank account BIC',
                    'class' => 'padded js-payolution-installment input_field field_left',
                ],
            ])
            ->add('summary', 'submit', [

            ]);
    }

    /**
     * @return array
     */
    public function getInstallmentPayments()
    {
        $paymentDetails = $this->payolutionCalculationResponseTransfer->getPaymentDetails();
        $choices = [];

        // @ todo: optimize and get rid of magic strings and <a> tag by building a proper form #875
        foreach ($paymentDetails as $paymentDetail) {
            $choices[] =
                CurrencyManager::getInstance()->convertCentToDecimal($paymentDetail->getInstallments()[0]->getAmount())
                . ' € for ' .
                $paymentDetail->getDuration()
                . ' months '
                . '<a href="installment/id/' . $this->payolutionCalculationResponseTransfer->getIdentificationUniqueid() . '/duration/' . $paymentDetail->getDuration() . '"">Show Details</a>';
        }

        return $choices;
    }
}
