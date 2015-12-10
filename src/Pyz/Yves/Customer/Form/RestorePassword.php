<?php

namespace Pyz\Yves\Customer\Form;

use SprykerEngine\Shared\Gui\Form\AbstractForm;
use SprykerEngine\Shared\Transfer\TransferInterface;
use Symfony\Component\Form\FormBuilderInterface;

class RestorePassword extends AbstractForm
{

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
            ->add('restore_key', 'hidden')
            ->add('password', 'password', [
                'label' => 'customer.restore.password',
            ])
            ->add('submit', 'submit', [
                'label' => 'customer.restore.submit',
            ]);
    }

    /**
     * @return TransferInterface|array
     */
    public function populateFormFields()
    {
        return [];
    }

    /**
     * @return TransferInterface|null
     */
    protected function getDataClass()
    {
        return null;
    }

}
