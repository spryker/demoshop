<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Checkout\Form\Multipage;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class AddressType extends AbstractType
{

    /**
     * @return string
     */
    public function getName()
    {
        return 'checkoutAddressForm';
    }


    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('t', 'text', [
                'required' => false,
                'attr' => [
                    'tabindex' => 100,
                    'class' => 'padded js-checkout-email input_field field_left',
                    'placeholder' => 'customer.email',
                ],
            ])
            ->add('shipment', 'submit',[

            ]);
    }
}
