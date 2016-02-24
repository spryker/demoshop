<?php

namespace Pyz\Yves\Checkout\Form;

use Generated\Shared\Transfer\PayolutionCalculationResponseTransfer;
use Spryker\Shared\Library\Currency\CurrencyManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PayolutionType extends AbstractType
{

    const FIELD_DATE_OF_BIRTH = 'date_of_birth';
    const FIELD_PHONE = 'address_phone';
    const FIELD_INSTALLMENT_PAYMENT_DETAIL_INDEX = 'installment_payment_detail_index';
    const FIELD_BANK_ACCOUNT_HOLDER = 'bank_account_holder';
    const FIELD_BANK_ACCOUNT_IBAN = 'bank_account_iban';
    const FIELD_BANK_ACCOUNT_BIC = 'bank_account_bic';

    /**
     * @var \Symfony\Component\HttpFoundation\Request
     */
    private $request;

    /**
     * @var int
     */
    private $tabIndexOffset = 0;

    /**
     * @var \Generated\Shared\Transfer\PayolutionCalculationResponseTransfer
     */
    private $payolutionCalculationResponseTransfer;

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Generated\Shared\Transfer\PayolutionCalculationResponseTransfer $payolutionCalculationResponseTransfer
     * @param int $tabIndexOffset
     */
    public function __construct(
        Request $request,
        PayolutionCalculationResponseTransfer $payolutionCalculationResponseTransfer,
        $tabIndexOffset = 0
    ) {

        $this->request = $request;
        $this->tabIndexOffset = $tabIndexOffset;
        $this->payolutionCalculationResponseTransfer = $payolutionCalculationResponseTransfer;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'checkoutPayolutionForm';
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(self::FIELD_INSTALLMENT_PAYMENT_DETAIL_INDEX, 'choice', [
                'choices' => $this->getInstallmentPayments(),
                'label' => false,
                'required' => false,
                'expanded' => true,
                'multiple' => false,
                'empty_value' => false,
                'attr' => [
                    'tabindex' => 100 + $this->tabIndexOffset,
                    'class' => 'js-payolution-installment input_field field_full_size',
                ],
            ])
            ->add(self::FIELD_DATE_OF_BIRTH, 'birthday', [
                'label' => false,
                'required' => true,
                'widget' => 'single_text',
                'format' => 'dd.MM.yyyy',
                'input' => 'string',
                'attr' => [
                    'placeholder' => 'customer.birth_date',
                    'class' => 'padded js-checkout-payolution-payment-date-of-birth input_field field_left',
                    'tabindex' => 101 + $this->tabIndexOffset,
                ],
            ])
            ->add(self::FIELD_PHONE, 'text', [
                'label' => false,
                'required' => false,
                'property_path' => 'address.phone',
                'attr' => [
                    'placeholder' => 'customer.phone',
                    'class' => 'padded js-checkout-payolution-payment-phone input_field field_right',
                    'tabindex' => 102 + $this->tabIndexOffset,
                ],
            ])
            ->add(self::FIELD_BANK_ACCOUNT_HOLDER, 'text', [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Bank account holder',
                    'class' => 'padded js-payolution-installment input_field field_left',
                    'tabindex' => 103 + $this->tabIndexOffset,
                ],
            ])
            ->add(self::FIELD_BANK_ACCOUNT_IBAN, 'text', [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Bank account IBAN',
                    'class' => 'padded js-payolution-installment input_field field_right',
                    'tabindex' => 104 + $this->tabIndexOffset,
                ],
            ])
            ->add(self::FIELD_BANK_ACCOUNT_BIC, 'text', [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Bank account BIC',
                    'class' => 'padded js-payolution-installment input_field field_left',
                    'tabindex' => 105 + $this->tabIndexOffset,
                ],
            ]);
    }

    /**
     * @param \Symfony\Component\OptionsResolver\OptionsResolver $resolver
     *
     * @return void
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Generated\Shared\Transfer\PayolutionPaymentTransfer',
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
