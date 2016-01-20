<?php

namespace Pyz\Yves\Customer\Form;

use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Shared\Gui\Form\AbstractForm;
use Spryker\Shared\Transfer\TransferInterface;
use Symfony\Component\Form\FormBuilderInterface;

class PasswordForm extends AbstractForm
{
    const FIELD_NEW_PASSWORD = 'new_password';
    const FIELD_PASSWORD = 'password';

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
            ->add(self::FIELD_PASSWORD, self::FIELD_PASSWORD, [
                'label' => 'customer.password.old_password',
                'required' => true,
            ])
            ->add(self::FIELD_NEW_PASSWORD, 'repeated', [
                'first_name' => self::FIELD_PASSWORD,
                'second_name' => 'confirm',
                'type' => self::FIELD_PASSWORD,
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
        return null;
    }

    /**
     * @return TransferInterface|null
     */
    protected function getDataClass()
    {
        return null;
    }

}
