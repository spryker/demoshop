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
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('bank_account_number', 'text', [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Bank account number',
                ],
            ])
            ->add('bank_location_id', 'text', [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Bank location',
                ],
            ])
            ->add('ownerName', 'text', [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Name',
                ],
            ])
        ;
    }
}
