<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Customer\Form;

use Spryker\Yves\Kernel\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;

class ForgottenPasswordForm extends AbstractType
{
    const FIELD_EMAIL = 'email';

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'forgottenPassword';
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->addEmailField($builder);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
     */
    protected function addEmailField(FormBuilderInterface $builder)
    {
        $builder->add(self::FIELD_EMAIL, EmailType::class, [
            'label' => 'customer.forgotten_password.email',
        ]);

        return $this;
    }
}
