<?php

namespace Pyz\Yves\Customer\Form;

use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Shared\Gui\Form\AbstractForm;
use Spryker\Shared\Transfer\TransferInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegisterForm extends AbstractForm
{

    /**
     * @return string
     */
    public function getName()
    {
        return 'registerForm';
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(CustomerTransfer::FIRST_NAME, 'text', [
            'label' => 'forms.first-name',
            'constraints' => new NotBlank(),
        ])
        ->add(CustomerTransfer::LAST_NAME, 'text', [
            'label' => 'forms.last-name',
            'constraints' => new NotBlank(),
        ])
        ->add(CustomerTransfer::EMAIL, 'email', [
            'label' => 'forms.email',
            'constraints' => [
                new NotBlank(),
                new Email(),
            ],
        ])
        ->add(CustomerTransfer::PASSWORD, 'repeated', [
            'first_name' => 'pass',
            'second_name' => 'confirm',
            'type' => 'password',
            'invalid_message' => 'validator.constraints.password.do_not_match',
            'required' => true,
            'first_options' => [
                'label' => 'forms.password',
            ],
            'second_options' => [
                'label' => 'forms.confirm-password',
            ],
        ])
        ->add('accept_terms', 'checkbox', [
            'label' => 'forms.accept_terms',
            'mapped' => false,
            'constraints' => [
                new NotBlank(),
            ],
        ]);
    }

    /**
     * @return TransferInterface|array
     */
    public function populateFormFields()
    {
        return $this->getDataClass();
    }

    /**
     * @return TransferInterface|null
     */
    protected function getDataClass()
    {
        return new CustomerTransfer();
    }

}
