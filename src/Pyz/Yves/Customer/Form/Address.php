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
            ->add("zip_code", "text", [
                "label" => "Zip Code",
                "required" => false,
            ])
            ->add("po_box", "text", [
                "label" => "PO Box",
                "required" => false,
            ])
            ->add("phone", "text", [
                "label" => "Phone",
                "required" => false,
            ])
            ->add("cell_phone", "text", [
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