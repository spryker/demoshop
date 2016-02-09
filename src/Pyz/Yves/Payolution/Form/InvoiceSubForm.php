<?php

namespace Pyz\Yves\Payolution\Form;

use Generated\Shared\Transfer\PayolutionPaymentTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Shared\Gui\Form\AbstractForm;
use Spryker\Shared\Payolution\PayolutionConstants;
use Spryker\Shared\Transfer\TransferInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Pyz\Yves\Checkout\Dependency\SubFormInterface;

class InvoiceSubForm extends AbstractForm implements SubFormInterface
{

    const PAYMENT_PROVIDER = PayolutionConstants::PAYOLUTION;
    const PAYMENT_METHOD = 'invoice';
    const FIELD_DATE_OF_BIRTH = 'date_of_birth';

    /**
     * @var \Generated\Shared\Transfer\QuoteTransfer
     */
    protected $quoteTransfer;

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
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
        return self::PAYMENT_PROVIDER . '_' . self::PAYMENT_METHOD;
    }

    /**
     * @return string
     */
    public function getPropertyPath()
    {
        return self::PAYMENT_PROVIDER;
    }

    /**
     * @return \Spryker\Shared\Transfer\TransferInterface|null
     */
    protected function getDataClass()
    {
        return new PayolutionPaymentTransfer();
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->addDateOfBirth($builder);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return \Pyz\Yves\Payolution\Form\InvoiceSubForm
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
     * @return \Spryker\Shared\Transfer\TransferInterface|array
     */
    public function populateFormFields()
    {
        return [];
    }

}
