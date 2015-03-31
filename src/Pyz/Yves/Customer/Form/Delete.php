<?php

namespace Pyz\Yves\Customer\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class Delete extends AbstractType
{
    /**
     * @return string
     */
    public function getName()
    {
        return "deleteForm";
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("submit", "submit", [
                "label" => "customer.delete.submit"
            ])
        ;
    }
}
