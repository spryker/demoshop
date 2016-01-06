<?php

namespace Pyz\Yves\Customer\Form;

use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Shared\Gui\Form\AbstractForm;
use Spryker\Shared\Transfer\TransferInterface;
use Symfony\Component\Form\FormBuilderInterface;

class RestorePassword extends AbstractForm
{

    /**
     * @var string
     */
    protected $restoreKey;

    /**
     * @param string $restoreKey
     */
    public function __construct($restoreKey)
    {
        $this->restoreKey = $restoreKey;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'restoreForm';
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(CustomerTransfer::RESTORE_PASSWORD_KEY, 'hidden')
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
            ]);
    }

    /**
     * @return TransferInterface|array
     */
    public function populateFormFields()
    {
        $customerTransfer = $this->getDataClass();

        $customerTransfer->setRestorePasswordKey($this->restoreKey);

        return $customerTransfer;
    }

    /**
     * @return CustomerTransfer
     */
    protected function getDataClass()
    {
        return new CustomerTransfer();
    }

}
