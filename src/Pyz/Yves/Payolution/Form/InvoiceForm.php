<?php

namespace Pyz\Yves\Payolution\Form;

use Generated\Shared\Transfer\PayolutionPaymentTransfer;
use Spryker\Shared\Gui\Form\AbstractForm;
use Spryker\Shared\Transfer\TransferInterface;
use Symfony\Component\Form\FormBuilderInterface;

class InvoiceForm extends AbstractForm
{

    const FIELD_DATE_OF_BIRTH = 'date_of_birth';

    /**
     * @return string
     */
    public function getName()
    {
        return 'payolutionInvoiceForm';
    }

    /**
     * @return TransferInterface|null
     */
    protected function getDataClass()
    {
        return new PayolutionPaymentTransfer();
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->addDateOfBirth($builder, $options);
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     *
     * @return self
     */
    protected function addDateOfBirth(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            self::FIELD_DATE_OF_BIRTH,
            'birthday',
            [
                'label' => false,
                'required' => true,
                'widget' => 'single_text',
                'format' => 'dd.MM.yyyy',
                'attr' => [
                    'placeholder' => 'customer.birth_date',
                ],
            ]
        );

        return $this;
    }

    /**
     * @return TransferInterface|array
     */
    public function populateFormFields()
    {
        return [];
    }

}
