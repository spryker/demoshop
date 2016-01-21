<?php

namespace Pyz\Yves\Customer\Form;

use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Shared\Gui\Form\AbstractForm;
use Spryker\Shared\Transfer\TransferInterface;
use Symfony\Component\Form\FormBuilderInterface;

class ForgottenPasswordForm extends AbstractForm
{
    const FIELD_EMAIL = 'email';

    /**
     * @return string
     */
    public function getName()
    {
        return 'forgottenPassword';
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(self::FIELD_EMAIL, self::FIELD_EMAIL, [
                'label' => 'customer.forgotten_password.email',
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
