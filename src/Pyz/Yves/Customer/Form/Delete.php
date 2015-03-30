<?php

namespace Pyz\Yves\Customer\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class Delete extends AbstractType
{
    public function getName()
    {
        return "deleteForm";
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("submit", "submit", [
                "label" => "customer.delete.submit"
            ])
        ;
    }
}
