<?php

namespace Pyz\Yves\Customer\Form;

use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Shared\Gui\Form\AbstractForm;
use Spryker\Shared\Transfer\TransferInterface;
use Symfony\Component\Form\FormBuilderInterface;

class ProfileForm extends AbstractForm
{
    const FIELD_EMAIL = 'email';
    const FIELD_LAST_NAME = 'last_name';
    const FIELD_FIRST_NAME = 'first_name';
    const FIELD_SALUTATION = 'salutation';

    /**
     * @return string
     */
    public function getName()
    {
        return 'profileForm';
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(self::FIELD_SALUTATION, 'choice', [
                'choices' => [
                    'Mr' => 'customer.salutation.mr',
                    'Mrs' => 'customer.salutation.mrs',
                    'Dr' => 'customer.salutation.dr',
                ],
                'label' => 'profile.form.salutation',
                'required' => false,
            ])
            ->add(self::FIELD_FIRST_NAME, 'text', [
                'label' => 'customer.profile.first_name',
                'required' => true,
            ])
            ->add(self::FIELD_LAST_NAME, 'text', [
                'label' => 'customer.profile.last_name',
                'required' => true,
            ])
            ->add(self::FIELD_EMAIL, self::FIELD_EMAIL, [
                'label' => 'customer.profile.email',
                'required' => true,
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
