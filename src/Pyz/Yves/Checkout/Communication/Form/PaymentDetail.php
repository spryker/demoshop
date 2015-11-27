<?php

namespace Pyz\Yves\Checkout\Communication\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class PaymentDetail extends AbstractType
{

    /**
     * @return string
     */
    public function getName()
    {
        return 'paymentDetail';
    }

    /**
     * @param $start
     * @param $end
     * @return array
     */
    public function generateNumberRange($start, $end)
    {
        $numbers = [];
        for($i = $start; $i <= $end; $i++)
        {
            $numbers[(string)$i] = (string)$i;
        }

        return $numbers;
    }

    /**
     * returns 1...12
     * @return array
     */
    public function getCcMonth()
    {
        return $this->generateNumberRange(1,12);
    }

    /**
     * return current year...current year + 10
     * @return array
     */
    public function getCcYears()
    {
        return $this->generateNumberRange((int)date("Y"), (int)date("Y") + 10);
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //Sepa fields
            ->add('bank_account_number', 'text', [
                'label' => 'Kontonummer',
                'required' => false,
                'attr' => [
                    'class' => 'input--1-1'
                ]
            ])
            ->add('bank_location_id', 'text', [
                'label' => 'BLZ',
                'required' => false,
                'attr' => [
                    'class' => 'input--1-1'
                ]
            ])
            ->add('ownerName', 'text', [
                'label' => 'Kontoinhaber',
                'required' => false,
                'attr' => [
                    'class' => 'input--1-1'
                ],
            ])

            //CC fields
            ->add('adyen_encrypted_form_expiry_generationtime', 'hidden', [
                'label' => false,
                'required' => false,
                'mapped' => false,
                'attr' => [
                    'id' => 'adyen-encrypted-form-expiry-generationtime',
                    'data-encrypted-name' => 'generationtime',
                    'value' => date('c'),
                    'autocomplete' => 'off'
                ],
            ])
            ->add('adyen_encrypted_form_number', 'text', [
                'label' => 'Kreditkartennummer',
                'required' => false,
                'mapped' => false,
                'attr' => [
                    'id' => 'adyen-encrypted-form-number',
                    'data-encrypted-name' => 'number',
                    'autocomplete' => 'off',
                    'class' => 'input--3-4'
                ],
            ])
            ->add('adyen_encrypted_form_cvc', 'text', [
                'label' => 'CVC',
                'required' => false,
                'mapped' => false,
                'attr' => [
                    'id' => 'adyen-encrypted-form-cvc',
                    'data-encrypted-name' => 'cvc',
                    'autocomplete' => 'off',
                    'class' => 'input--1-4'
                ],
            ])
            ->add('adyen_encrypted_form_holder_name', 'text', [
                'label' => 'Karteninhaber',
                'required' => false,
                'mapped' => false,
                'attr' => [
                    'id' => 'adyen-encrypted-form-holder-name',
                    'data-encrypted-name' => 'holderName',
                    'autocomplete' => 'off',
                    'class' => 'input--1-1'
                ],
            ])
            ->add('adyen_encrypted_form_expiry_month', 'choice', array(
                'choices' => $this->getCcMonth(),
                'label' => false,
                'mapped' => false,
                'attr' => [
                    'id' => 'adyen-encrypted-form-expiry-month',
                    'data-encrypted-name' => 'expiryMonth',
                    'placeholder' => 'MM',
                    'autocomplete' => 'off'
                ],
            ))
            ->add('adyen_encrypted_form_expiry_year', 'choice', array(
                'choices' => $this->getCcYears(),
                'label' => false,
                'mapped' => false,
                'attr' => [
                    'id' => 'adyen-encrypted-form-expiry-year',
                    'data-encrypted-name' => 'expiryYear',
                    'placeholder' => 'YYYY',
                    'autocomplete' => 'off'
                ],
            ))
        ;
    }
}
