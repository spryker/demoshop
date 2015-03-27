<?php

namespace Pyz\Yves\Customer\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class Address extends AbstractType
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
            ->add("firstName", "text", [
                "label" => "First Name",
                "required" => false,
            ])
            ->add("middleName", "text", [
                "label" => "Middle Name",
                "required" => false,
            ])
            ->add("lastName", "text", [
                "label" => "Last Name",
                "required" => false,
            ])
            ->add("address1", "text", [
                "label" => "Address",
                "required" => false,
            ])
            ->add("address2", "text", [
                "label" => "",
                "required" => false,
            ])
            ->add("address3", "text", [
                "label" => "",
                "required" => false,
            ])
            ->add("company", "text", [
                "label" => "Company",
                "required" => false,
            ])
            ->add("city", "text", [
                "label" => "City",
                "required" => false,
            ])
            ->add("zipCode", "text", [
                "label" => "Zip Code",
                "required" => false,
            ])
            ->add("poBox", "text", [
                "label" => "PO Box",
                "required" => false,
            ])
            ->add("phone", "text", [
                "label" => "Phone",
                "required" => false,
            ])
            ->add("cellPhone", "text", [
                "label" => "Cell phone",
                "required" => false,
            ])
            ->add("comment", "text", [
                "label" => "Comment",
                "required" => false,
            ])
            ->add("submit", "submit", [
                "label" => "Update"
            ])
        ;
    }
}