<?php

namespace Pyz\Yves\Customer\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class Profile extends AbstractType
{
    protected $email;

    protected $salutation;
    protected $firstName;
    protected $middleName;
    protected $lastName;

    protected $company;

    protected $dateOfBirth;

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

    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;
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
            ->add("company", "text", [
                "label" => "Company",
                "required" => false,
            ])
            ->add("dateOfBirth", "birthday", [
                "label" => "Date of Birth",
                "required" => false,
            ])
            ->add("submit", "submit", [
                "label" => "Update"
            ])
        ;
    }
}
