<?php

namespace Pyz\Yves\Customer\Form;

use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Shared\Gui\Form\AbstractForm;
use Spryker\Shared\Transfer\TransferInterface;
use Symfony\Component\Form\FormBuilderInterface;

class PasswordForm extends AbstractForm
{

    /**
     * @return string
     */
    public function getName()
    {
        return 'passwordForm';
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(CustomerTransfer::PASSWORD, 'password', [
                'label' => 'customer.password.old_password',
                'required' => true,
            ])
            ->add(CustomerTransfer::NEW_PASSWORD, 'repeated', [
                'first_name' => 'password',
                'second_name' => 'confirm',
                'type' => 'password',
                'invalid_message' => 'customer.password.invalid_password',
                'required' => true,
                'first_options' => [
                    'label' => 'customer.password.request.new_password',
                ],
                'second_options' => [
                    'label' => 'customer.password.confirm.new_password',
                ],
            ]);
    }

    /**
     * @return TransferInterface|array
     */
    public function populateFormFields()
    {
        return $this->getDataClass();
    }

    /**
     * @return TransferInterface|null
     */
    protected function getDataClass()
    {
        return new CustomerTransfer();
    }

}
