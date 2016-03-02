<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Customer\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class PasswordForm extends AbstractType
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
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this
            ->addPasswordField($builder)
            ->addNewPasswordField($builder);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
     */
    protected function addNewPasswordField(FormBuilderInterface $builder)
    {
        $builder->add(self::FIELD_NEW_PASSWORD, 'repeated', [
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
            'label' => 'customer.password.old_password',
            'required' => true,
        ]);

        return $this;
    }

}
