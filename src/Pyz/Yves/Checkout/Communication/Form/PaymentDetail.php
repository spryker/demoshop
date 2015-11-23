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
        return 'sepaPaymentForm';
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
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Bank account number',
                    'autocomplete' => 'off'
                ],
            ])
            ->add('bank_location_id', 'text', [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Bank location',
                    'autocomplete' => 'off'
                ],
            ])
            ->add('ownerName', 'text', [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Name',
                    'autocomplete' => 'off'
                ],
            ])

            //CC fields
            ->add('encrypted_card_data', 'hidden', [
                'label' => false,
                'required' => false,
                'attr' => [
                    'id' => 'adyen-encrypted-form-expiry-generationtime',
                    'data-encrypted-name' => 'generationtime',
                    'value' => date('c'),
                    'autocomplete' => 'off'
                ],
            ])
            ->add('adyen_encrypted_form_number', 'text', [
                'label' => false,
                'required' => false,
                'attr' => [
                    'id' => 'adyen-encrypted-form-number',
                    'data-encrypted-name' => 'number',
                    'placeholder' => 'Card Number',
                    'autocomplete' => 'off'
                ],
            ])
            ->add('adyen_encrypted_form_cvc', 'text', [
                'label' => false,
                'required' => false,
                'attr' => [
                    'id' => 'adyen-encrypted-form-cvc',
                    'data-encrypted-name' => 'cvc',
                    'placeholder' => 'CVC',
                    'autocomplete' => 'off'
                ],
            ])
            ->add('adyen_encrypted_form_holder_name', 'text', [
                'label' => false,
                'required' => false,
                'attr' => [
                    'id' => 'adyen-encrypted-form-holder-name',
                    'data-encrypted-name' => 'holderName',
                    'placeholder' => 'Holder name',
                    'autocomplete' => 'off'
                ],
            ])
            ->add('adyen_encrypted_form_expiry_month', 'choice', array(
                'choices' => $this->getCcMonth(),
                'label' => false,
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
