<?php

namespace Pyz\Yves\Customer\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegisterForm extends AbstractType
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
        $this
            ->addSalutationField($builder)
            ->addFirstNameField($builder)
            ->addLastNameField($builder)
            ->addEmailField($builder)
            ->addPasswordField($builder)
            ->addAcceptTermsField($builder);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return self
     */
    protected function addSalutationField(FormBuilderInterface $builder)
    {
        $builder->add(self::FIELD_SALUTATION, 'choice', [
            'choices' => [
                'Mr' => 'email.orderEmail.salutationMale',
                'Mrs' => 'email.orderEmail.salutationFemale',
            ],
            'label' => 'address.salutation',
            'constraints' => [
                new NotBlank(),
            ],
        ]);

        return $this;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return self
     */
    protected function addFirstNameField(FormBuilderInterface $builder)
    {
        $builder->add(self::FIELD_FIRST_NAME, 'text', [
            'label' => 'customer.first_name',
            'constraints' => [
                new NotBlank(),
            ],
        ]);

        return $this;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return self
     */
    protected function addLastNameField(FormBuilderInterface $builder)
    {
        $builder->add(self::FIELD_LAST_NAME, 'text', [
            'label' => 'customer.last_name',
            'constraints' => [
                new NotBlank(),
            ],
        ]);

        return $this;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return self
     */
    protected function addEmailField(FormBuilderInterface $builder)
    {
        $builder->add(self::FIELD_EMAIL, self::FIELD_EMAIL, [
            'label' => 'auth.email',
            'constraints' => [
                new NotBlank(),
            ],
        ]);

        return $this;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return self
     */
    protected function addPasswordField(FormBuilderInterface $builder)
    {
        $builder->add(self::FIELD_PASSWORD, 'repeated', [
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
            'constraints' => [
                new NotBlank(),
            ],
        ]);

        return $this;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return self
     */
    protected function addAcceptTermsField(FormBuilderInterface $builder)
    {
        $builder->add(self::FIELD_ACCEPT_TERMS, 'checkbox', [
            'label' => 'forms.accept_terms',
            'mapped' => false,
            'constraints' => [
                new NotBlank(),
            ],
        ]);

        return $this;
    }

}
