<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Checkout\Communication\Form;

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

    /**
     * @var Request
     */
    private $request;

    /**
     * @var int
     */
    private $tabIndexOffset = 0;

    /**
     * @param Request $request
     * @param int $tabIndexOffset
     */
    public function __construct(Request $request, $tabIndexOffset = 0)
    {
        $this->request = $request;
        $this->tabIndexOffset = $tabIndexOffset;
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
                    'tabindex' => 170 + $this->tabIndexOffset,
                ],
            ])
            ->add(self::FIELD_PHONE, 'text', [
                'label' => false,
                'required' => true,
                'property_path' => 'address.phone',
                'attr' => [
                    'placeholder' => 'customer.phone',
                    'class' => 'padded js-checkout-payolution-payment-phone',
                    'tabindex' => 180 + $this->tabIndexOffset,
                ],
            ])
            ->add(self::FIELD_LANGUAGE_CODE, 'hidden', [
                'data' => 'DE',
            ])
            ->add(self::FIELD_CURRENCY_CODE, 'hidden', [
                'data' => 'EUR',
            ])
            ->add(self::FIELD_ACCOUNT_BRAND, 'hidden', [
                'data' => PayolutionApiConstants::BRAND_INVOICE
            ])
            ->add(self::FIELD_CLIENT_IP, 'hidden', [
                'data' => $this->request->getClientIp()
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

}
