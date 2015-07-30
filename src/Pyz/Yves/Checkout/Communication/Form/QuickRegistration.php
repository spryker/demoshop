<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Checkout\Communication\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class QuickRegistration extends AbstractType
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'quickRegistration';
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('password', 'password', [
                'label' => 'customer.restore.password',
                'constraints' => new NotBlank(),
            ])
            ->add('password_verification', 'password', [
                'label' => 'customer.restore.password.verify',
                'constraints' => new NotBlank(),
            ])
            ->add('submit', 'submit', [
                'label' => 'customer.register.submit',
            ])
        ;
    }
}
