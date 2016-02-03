<?php

namespace Pyz\Yves\Customer\Form;

use Spryker\Shared\Gui\Form\AbstractForm;
use Spryker\Shared\Transfer\TransferInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegisterForm extends AbstractForm
{
    const FIELD_SALUTATION = 'salutation';
    const FIELD_FIRST_NAME = 'first_name';
    const FIELD_LAST_NAME = 'last_name';
    const FIELD_EMAIL = 'email';
    const FIELD_PASSWORD = 'password';
    const FIELD_ACCEPT_TERMS = 'accept_terms';

    /**
     * @return string
     */
    public function getName()
    {
        return 'registerForm';
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(self::FIELD_SALUTATION, 'choice', [
                'choices' => [
                    'Mr' => 'email.orderEmail.salutationMale',
                    'Mrs' => 'email.orderEmail.salutationFemale',
                ],
                'label' => 'address.salutation',
                'constraints' => new NotBlank(),
            ])
            ->add(self::FIELD_FIRST_NAME, 'text', [
                'label' => 'customer.first_name',
                'constraints' => new NotBlank(),
            ])
            ->add(self::FIELD_LAST_NAME, 'text', [
                'label' => 'customer.last_name',
                'constraints' => new NotBlank(),
            ])
            ->add(self::FIELD_EMAIL, self::FIELD_EMAIL, [
                'label' => 'auth.email',
                'constraints' => new NotBlank(),
            ])
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
            ])
            ->add(self::FIELD_ACCEPT_TERMS, 'checkbox', [
                'label' => 'forms.accept_terms',
                'mapped' => false,
                'constraints' => [
                    new NotBlank(),
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
     * @return \Spryker\Shared\Transfer\TransferInterface|null
     */
    protected function getDataClass()
    {
        return null;
    }

}
