<?php

namespace Pyz\Yves\Customer\Form;

use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Shared\Gui\Form\AbstractForm;
use Spryker\Shared\Transfer\TransferInterface;
use Symfony\Component\Form\FormBuilderInterface;

class ForgottenPassword extends AbstractForm
{

    /**
     * @return string
     */
    public function getName()
    {
        return 'forgottenPassword';
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(CustomerTransfer::EMAIL, 'email', [
                'label' => 'customer.forgotten_password.email',
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
