<?php

namespace Pyz\Yves\Customer\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ForgottenPasswordForm extends AbstractType
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
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->addEmailField($builder);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return self
     */
    protected function addEmailField(FormBuilderInterface $builder)
    {
        $builder->add(self::FIELD_EMAIL, self::FIELD_EMAIL, [
            'label' => 'customer.forgotten_password.email',
        ]);

        return $this;
    }

}
