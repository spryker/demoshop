<?php

namespace Pyz\Yves\Customer\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class Register extends AbstractType
{
    protected $email;
    protected $password;

    public function getName()
    {
        return "registerForm";
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

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'text', [
                'label' => 'E-Mail',
                'constraints' => [new NotBlank()]
            ])
            ->add('password', 'password', [
                'label' => 'Password',
                'constraints' => [new NotBlank()]
            ])
            ->add('submit', 'submit', [
                'label' => 'Register'
            ])
        ;
    }
}