<?php

namespace Pyz\Yves\Customer\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class Restore extends AbstractType
{
    /**
     * @return string
     */
    public function getName()
    {
        return "restoreForm";
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("restore_key", "hidden")
            ->add("password", "password", [
                "label" => "customer.restore.password"
            ])
            ->add("submit", "submit", [
                "label" => "customer.restore.submit"
            ])
        ;
    }
}