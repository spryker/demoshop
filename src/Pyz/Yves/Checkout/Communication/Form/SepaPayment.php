<?php

namespace Pyz\Yves\Checkout\Communication\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SepaPayment extends AbstractType
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
            ->add('iban', 'text', [
                'mapped' => false,
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'IBAN',
                ],
            ])
            ->add('bic', 'text', [
                'mapped' => false,
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'BIC',
                ],
            ])
            ->add('ownerName', 'text', [
                'mapped' => false,
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Name',
                ],
            ])
        ;
    }
}
