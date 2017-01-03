<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Customer\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class LoginForm extends AbstractType
{

    const FORM_NAME = 'loginForm';

    const FIELD_EMAIL = 'email';
    const FIELD_PASSWORD = 'password';

    /**
     * @return string
     */
    public function getName()
    {
        return self::FORM_NAME;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->setAction('/login_check');

        $this
            ->addEmailField($builder)
            ->addPasswordField($builder);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
     */
    protected function addEmailField(FormBuilderInterface $builder)
    {
        $builder->add(self::FIELD_EMAIL, 'text', [
            'label' => 'customer.login.email',
            'constraints' => [
                new NotBlank(),
                new Email(),
            ],
            'mapped' => false,
        ]);

        return $this;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
     */
    protected function addPasswordField(FormBuilderInterface $builder)
    {
        $builder->add(self::FIELD_PASSWORD, self::FIELD_PASSWORD, [
            'label' => 'customer.login.password',
            'constraints' => new NotBlank(),
            'mapped' => false,
            'attr' => ['autocomplete' => 'off'],
        ]);

        return $this;
    }

}
