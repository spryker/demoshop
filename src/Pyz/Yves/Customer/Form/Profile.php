<?php

namespace Pyz\Yves\Customer\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class Profile extends AbstractType
{
    public function getName()
    {
        return "profileForm";
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("salutation", "choice", [
                "choices" => ["Mr", "Mrs", "Dr"],
                "label" => "Salutation",
            ])
            ->add("first_name", "text", [
                "label" => "First Name",
                "required" => false,
            ])
            ->add("middle_name", "text", [
                "label" => "Middle Name",
                "required" => false,
            ])
            ->add("last_name", "text", [
                "label" => "Last Name",
                "required" => false,
            ])
            ->add("company", "text", [
                "label" => "Company",
                "required" => false,
            ])
            ->add("date_of_birth", "birthday", [
                "label" => "Date of Birth",
                "required" => false,
            ])
            ->add("submit", "submit", [
                "label" => "Update"
            ])
        ;
    }
}
