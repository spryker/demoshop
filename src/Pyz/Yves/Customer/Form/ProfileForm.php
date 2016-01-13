<?php

namespace Pyz\Yves\Customer\Form;

use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Shared\Gui\Form\AbstractForm;
use Spryker\Shared\Transfer\TransferInterface;
use Symfony\Component\Form\FormBuilderInterface;

class ProfileForm extends AbstractForm
{

    /**
     * @var CustomerTransfer
     */
    protected $customerTransfer;

    /**
     * @param CustomerTransfer $customerTransfer
     */
    public function __construct(CustomerTransfer $customerTransfer)
    {
        $this->customerTransfer = $customerTransfer;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'profileForm';
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(CustomerTransfer::SALUTATION, 'choice', [
                'choices' => [
                    'Mr' => 'customer.salutation.mr',
                    'Mrs' => 'customer.salutation.mrs',
                    'Dr' => 'customer.salutation.dr',
                ],
                'label' => 'profile.form.salutation',
            ])
            ->add(CustomerTransfer::FIRST_NAME, 'text', [
                'label' => 'customer.profile.first_name',
                'required' => true,
            ])
            ->add(CustomerTransfer::LAST_NAME, 'text', [
                'label' => 'customer.profile.last_name',
                'required' => true,
            ])
            ->add(CustomerTransfer::EMAIL, 'email', [
                'label' => 'customer.profile.email',
                'required' => true,
            ])
            ->add(CustomerTransfer::PHONE, 'text', [
                'label' => 'customer.profile.phone',
                'required' => false,
            ]);
    }

    /**
     * @return TransferInterface|array
     */
    public function populateFormFields()
    {
        $customerTransfer = $this->getDataClass();
        $customerTransfer->fromArray($this->customerTransfer->toArray());

        return $customerTransfer;
    }

    /**
     * @return TransferInterface|null
     */
    protected function getDataClass()
    {
        return new CustomerTransfer();
    }

}
