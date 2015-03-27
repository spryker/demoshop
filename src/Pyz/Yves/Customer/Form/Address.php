<?php

namespace Pyz\Yves\Customer\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class Address extends AbstractType
{
    protected $email;

    protected $salutation;
    protected $firstName;
    protected $middleName;
    protected $lastName;

    protected $address1;
    protected $address2;
    protected $address3;
    protected $company;
    protected $city;
    protected $zipCode;
    protected $poBox;
    protected $phone;
    protected $cellPhone;
    protected $comment;

    public function getName()
    {
        return "profileForm";
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getSalutation()
    {
        return $this->salutation;
    }

    public function setSalutation($salutation)
    {
        $this->salutation = $salutation;
        return $this;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getMiddleName()
    {
        return $this->middleName;
    }

    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;
        return $this;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getCompany()
    {
        return $this->company;
    }

    public function setCompany($company)
    {
        $this->company = $company;
        return $this;
    }

    public function getAddress1()
    {
         return $this->address1;
    }

    public function setAddress1($address1)
    {
        $this->address1 = $address1;
        return $this;
    }

    public function getAddress2()
    {
         return $this->address2;
    }

    public function setAddress2($address2)
    {
        $this->address2 = $address2;
        return $this;
    }

    public function getAddress3()
    {
         return $this->address3;
    }

    public function setAddress3($address3)
    {
        $this->address3 = $address3;
        return $this;
    }

    public function getCity()
    {
         return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    public function getZipCode()
    {
         return $this->zipCode;
    }

    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
        return $this;
    }

    public function getPoBox()
    {
         return $this->poBox;
    }

    public function setPoBox($poBox)
    {
        $this->poBox = $poBox;
        return $this;
    }

    public function getPhone()
    {
         return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    public function getCellPhone()
    {
         return $this->cellPhone;
    }

    public function setCellPhone($cellPhone)
    {
        $this->cellPhone = $cellPhone;
        return $this;
    }

    public function getComment()
    {
         return $this->comment;
    }

    public function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
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