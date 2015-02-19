<?php

namespace Pyz\Yves\Payone\Communication\Form;

use Symfony\Component\Form\FormBuilderInterface;


class PrePaymentType extends AbstractFormType
{

    /**
     * Returns the name of this type.
     * @return string The name of this type
     */
    public function getName()
    {
        return 'paymentPayonePrePayment';
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     */
    protected function initForm(FormBuilderInterface $builder, array $options)
    {

    }

}
