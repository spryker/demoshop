<?php

namespace Pyz\Yves\Payolution\Form;

use Generated\Shared\Transfer\PayolutionPaymentTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Shared\Gui\Form\AbstractForm;
use Spryker\Shared\Transfer\TransferInterface;
use Symfony\Component\Form\FormBuilderInterface;

class InvoiceForm extends AbstractForm
{

    const FIELD_DATE_OF_BIRTH = 'date_of_birth';

    /**
     * @var QuoteTransfer
     */
    protected $quoteTransfer;

    /**
     * @param QuoteTransfer $quoteTransfer
     */
    public function __construct(QuoteTransfer $quoteTransfer)
    {
        $this->quoteTransfer = $quoteTransfer;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'payolutionInvoice';
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
        $this->addDateOfBirth($builder);
    }

    /**
     * @param FormBuilderInterface $builder
     *
     * @return self
     */
    protected function addDateOfBirth(FormBuilderInterface $builder)
    {
        $builder->add(
            self::FIELD_DATE_OF_BIRTH,
            'birthday',
            [
                'label' => false,
                'required' => false,
                'widget' => 'single_text',
                'format' => 'dd.MM.yyyy',
                'input' => 'string',
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
