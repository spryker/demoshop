<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Checkout\Communication\Form;

use SprykerFeature\Shared\Payolution\PayolutionApiConstants;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Payolution extends AbstractType
{

    /**
     * @var int
     */
    private $tabIndexOffset = 0;

    /**
     * @param int $tabIndexOffset
     */
    public function __construct($tabIndexOffset = 0)
    {
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
            ->add('address', new Address($this->tabIndexOffset + 100), [
                'data_class' => 'Generated\Shared\Transfer\AddressTransfer',
                'error_bubbling' => true,
            ])
            ->add('gender', 'choice', [
                'choices' => [
                    'Mr' => 'Herr',
                    'Mrs' => 'Frau',
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
            ->add('date_of_birth', 'birthday', [
                'label' => false,
                'required' => true,
                'widget' => 'single_text',
                'format' => 'dd.MM.yyyy',
                'input' => 'string',
                'attr' => [
                    'placeholder' => 'Geburtsdatum (TT.MM.YYYY)',
                    'class' => 'padded js-checkout-payolution-payment-date-of-birth',
                    'tabindex' => 160 + $this->tabIndexOffset,
                ],
            ])
            ->add('email', 'text', [
                'label' => false,
                'required' => true,
                'property_path' => 'address.email',
                'attr' => [
                    'placeholder' => 'E-Mail Adresse',
                    'class' => 'padded js-checkout-payolution-payment-email',
                    'tabindex' => 170 + $this->tabIndexOffset,
                ],
            ])
            ->add('address_phone', 'text', [
                'label' => false,
                'required' => true,
                'property_path' => 'address.phone',
                'attr' => [
                    'placeholder' => 'Telefonnummer',
                    'class' => 'padded js-checkout-payolution-payment-phone',
                    'tabindex' => 180 + $this->tabIndexOffset,
                ],
            ])
            ->add('language_iso2_code', 'hidden', [
                'data' => 'DE',
            ])
            ->add('currency_iso3_code', 'hidden', [
                'data' => 'EUR',
            ])
            ->add('account_brand', 'hidden', [
                'data' => PayolutionApiConstants::BRAND_INVOICE
            ])
            ->add('client_ip', 'hidden', [
                'data' => '127.0.0.1'
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
