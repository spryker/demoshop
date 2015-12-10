<?php

namespace Pyz\Yves\Customer\Form;

use SprykerEngine\Shared\Gui\Form\AbstractForm;
use SprykerEngine\Shared\Transfer\TransferInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegisterCustomer extends AbstractForm
{

    /**
     * @return string
     */
    public function getName()
    {
        return 'registerForm';
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'text', [
                'label' => 'customer.register.email',
                'constraints' => new NotBlank(),
            ])
            ->add('password', 'password', [
                'label' => 'customer.register.password',
                'constraints' => new NotBlank(),
            ])
            ->add('submit', 'submit', [
                'label' => 'customer.register.submit',
            ]);
    }

    /**
     * @return TransferInterface|array
     */
    public function populateFormFields()
    {
        return [];
    }

    /**
     * @return TransferInterface|null
     */
    protected function getDataClass()
    {
        return null;
    }

}
