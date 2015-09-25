<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Checkout\Communication\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Payolution extends Address
{

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
            ->add('gender', 'choice', [
                'choices' => [
                    'Mr' => 'Herr',
                    'Mrs' => 'Frau'
                ],
                'label' => false,
                'required' => true,
                'expanded' => true,
                'multiple' => false,
                'empty_value' => false,
                'attr' => [
                    'style' => 'display: block;',
                ],
            ])
            ->add('salutation', 'text', [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Anrede',
                    'class' => 'padded js-checkout-payolution-payment-salutation',
                ],
            ]);

        parent::buildForm($builder, $options);

        $builder
            ->add('date_of_birth', 'birthday', [
                'label' => false,
                'required' => true,
                'widget' => 'single_text',
                'format' => 'dd.MM.yyyy',
                'input' => 'string',
                'attr' => [
                    'placeholder' => 'Geburtsdatum (TT.MM.YYYY)',
                    'class' => 'padded js-checkout-payolution-payment-date-of-birth',
                    'tabindex' => 60 + $this->offset,
                ],
            ])
            ->add('email', 'text', [
                'label' => false,
                'required' => true,
                'attr' => [
                    'placeholder' => 'E-Mail Adresse',
                    'class' => 'padded js-checkout-payolution-payment-email',
                    'tabindex' => 70 + $this->offset,
                ],
            ])
            ->add('phone', 'text', [
                'label' => false,
                'required' => true,
                'attr' => [
                    'placeholder' => 'Telefonnummer',
                    'class' => 'padded js-checkout-payolution-payment-phone',
                    'tabindex' => 80 + $this->offset,
                ],
            ]);
    }

}
