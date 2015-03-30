<?php

namespace Pyz\Yves\Customer\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class Forgot extends AbstractType
{
    public function getName()
    {
        return "forgotForm";
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("email", "email", [
                "label" => "customer.forgot.email"
            ])
            ->add("submit", "submit", [
                "label" => "customer.forgot.submit"
            ])
        ;
    }
}
