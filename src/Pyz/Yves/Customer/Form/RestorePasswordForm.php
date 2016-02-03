<?php

namespace Pyz\Yves\Customer\Form;

use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Shared\Gui\Form\AbstractForm;
use Spryker\Shared\Transfer\TransferInterface;
use Symfony\Component\Form\FormBuilderInterface;

class RestorePasswordForm extends AbstractForm
{
    const FIELD_RESTORE_PASSWORD_KEY = 'restore_password_key';
    const FIELD_PASSWORD = 'password';

    /**
     * @return string
     */
    public function getName()
    {
        return 'restoreForm';
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(self::FIELD_RESTORE_PASSWORD_KEY, 'hidden')
            ->add(self::FIELD_PASSWORD, 'repeated', [
                'first_name' => 'pass',
                'second_name' => 'confirm',
                'type' => 'password',
                'invalid_message' => 'validator.constraints.password.do_not_match',
                'required' => true,
                'first_options' => [
                    'label' => 'forms.password',
                ],
                'second_options' => [
                    'label' => 'forms.confirm-password',
                ],
            ]);
    }

    /**
     * @return \Spryker\Shared\Transfer\TransferInterface|array
     */
    public function populateFormFields()
    {
        return null;
    }

    /**
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    protected function getDataClass()
    {
        return null;
    }

}
