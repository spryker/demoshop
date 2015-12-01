<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Checkout\Communication\Form;

use Generated\Shared\Transfer\PayolutionCalculationResponseTransfer;
use SprykerFeature\Shared\Payolution\PayolutionApiConstants;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\HttpFoundation\Request;

class PayolutionType extends AbstractType
{

    const FIELD_ADDRESS = 'address';
    const FIELD_GENDER = 'gender';
    const FIELD_DATE_OF_BIRTH = 'date_of_birth';
    const FIELD_EMAIL = 'email';
    const FIELD_PHONE = 'address_phone';
    const FIELD_LANGUAGE_CODE = 'language_iso2_code';
    const FIELD_CURRENCY_CODE = 'currency_iso3_code';
    const FIELD_ACCOUNT_BRAND = 'account_brand';
    const FIELD_CLIENT_IP = 'client_ip';
    const FIELD_INSTALLMENT_PAYMENT_DETAIL_INDEX = 'installment_payment_detail_index';
    const FIELD_BANK_ACCOUNT_HOLDER = 'bank_account_holder';
    const FIELD_BANK_ACCOUNT_IBAN = 'bank_account_iban';
    const FIELD_BANK_ACCOUNT_BIC = 'bank_account_bic';

    /**
     * @var Request
     */
    private $request;

    /**
     * @var int
     */
    private $tabIndexOffset = 0;

    /**
     * @var PayolutionCalculationResponseTransfer
     */
    private $payolutionCalculationResponseTransfer;

    public $choices = [
        '0' => 'hi',
        '1' => 'hello',
    ];

    /**
     * @param Request $request
     * @param PayolutionCalculationResponseTransfer $payolutionCalculationResponseTransfer
     * @param int $tabIndexOffset
     */
    public function __construct(
        Request $request,
        PayolutionCalculationResponseTransfer $payolutionCalculationResponseTransfer,
        $tabIndexOffset = 0)
    {
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
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(self::FIELD_ADDRESS, new AddressType($this->tabIndexOffset + 100), [
                'data_class' => 'Generated\Shared\Transfer\AddressTransfer',
                'error_bubbling' => true,
            ])
            ->add(self::FIELD_GENDER, 'choice', [
                'choices' => [
                    'Mr' => 'customer.salutation.mr',
                    'Mrs' => 'customer.salutation.mrs',
                ],
                'property_path' => 'address.salutation',
                'label' => false,
                'required' => true,
                'expanded' => true,
                'multiple' => false,
                'empty_value' => false,
                'attr' => [
                    'style' => 'display: block;',
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
                    'class' => 'padded js-checkout-payolution-payment-date-of-birth',
                    'style' => 'width: 49%;',
                    'tabindex' => 160 + $this->tabIndexOffset,
                ],
            ])
            ->add(self::FIELD_EMAIL, 'text', [
                'label' => false,
                'required' => true,
                'property_path' => 'address.email',
                'attr' => [
                    'placeholder' => 'customer.email',
                    'class' => 'padded js-checkout-payolution-payment-email',
                    'style' => 'width: 49%;',
                    'tabindex' => 170 + $this->tabIndexOffset,
                ],
            ])
            ->add(self::FIELD_PHONE, 'text', [
                'label' => false,
                'required' => false,
                'property_path' => 'address.phone',
                'attr' => [
                    'placeholder' => 'customer.phone',
                    'class' => 'padded js-checkout-payolution-payment-phone',
                    'style' => 'width: 49%;',
                    'tabindex' => 180 + $this->tabIndexOffset,
                ],
            ])
            ->add(self::FIELD_INSTALLMENT_PAYMENT_DETAIL_INDEX, 'choice', [
                'choices' => $this->getInstallmentPayments(),
                'label' => false,
                'required' => true,
                'expanded' => true,
                'multiple' => false,
                'empty_value' => false,
                'attr' => [
                    'style' => 'display: block;',
                ],
            ])
            ->add(self::FIELD_BANK_ACCOUNT_HOLDER, 'text', [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Bank account holder',
                    'class' => 'padded',
                    'style' => 'width: 49%;',
                    'tabindex' => 190 + $this->tabIndexOffset,
                ],
            ])
            ->add(self::FIELD_BANK_ACCOUNT_IBAN, 'text', [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Bank account IBAN',
                    'class' => 'padded',
                    'style' => 'width: 49%;',
                    'tabindex' => 200 + $this->tabIndexOffset,
                ],
            ])
            ->add(self::FIELD_BANK_ACCOUNT_BIC, 'text', [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Bank account BIC',
                    'class' => 'padded',
                    'style' => 'width: 49%;',
                    'tabindex' => 210 + $this->tabIndexOffset,
                ],
            ]);
    }

    /**
     * @param OptionsResolver $resolver
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

        foreach ($paymentDetails as $paymentDetail) {
            $choices[] = $paymentDetail->getInstallments()[0]->getAmount() / 100
                .' Euros for '.
                $paymentDetail->getDuration()
                .' months ';
            ;
        }

        return $choices;
    }

}
