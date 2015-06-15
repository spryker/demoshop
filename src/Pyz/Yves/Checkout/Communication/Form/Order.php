<?php

namespace Pyz\Yves\Checkout\Communication\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class Order extends AbstractType
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'orderForm';
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'text', [
                'label' => 'checkout.address.email',
                'constraints' => new NotBlank()
            ])
            ->add('name', 'text', [
                'label' => 'checkout.address.name',
                'constraints' => new NotBlank(),
                'required' => false,
            ])
            ->add('billing_address', 'text', [
                'label' => 'checkout.address.billing',
                'constraints' => new NotBlank(),
                'required' => false,
            ])
            ->add('shipping_address', 'text', [
                'label' => 'checkout.address.shipping',
                'required' => false,
            ])
            ->add('payment', 'choice', [
                'choices' => ['checkout.payment.advance', 'checkout.payment.paypal', 'checkout.payment.creditcard'],
                'expanded' => true,
                'multiple' => false
            ])
            ->add('terms', 'checkbox', [
                'label' => 'checkout.review.terms',
                'required' => false,
            ])
            ->add('submit', 'submit', [
                'label' => 'checkout.review.submit'
            ])
        ;
    }
}