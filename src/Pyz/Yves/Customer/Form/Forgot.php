<?php

namespace Pyz\Yves\Customer\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class Forgot extends AbstractType
{
    protected $email;

    public function getName()
    {
        return "forgotForm";
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("email", "email", [
                "label" => "E-Mail"
            ])
            ->add("submit", "submit", [
                "label" => "Send recovery link"
            ])
        ;
    }
}
