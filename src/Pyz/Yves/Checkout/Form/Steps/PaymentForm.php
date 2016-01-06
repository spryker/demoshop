<?php

namespace Pyz\Yves\Checkout\Form\Steps;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Checkout\Dependency\Plugin\PaymentSubFormInterface;
use Spryker\Shared\Gui\Form\AbstractForm;
use Spryker\Shared\Transfer\TransferInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class PaymentForm extends AbstractForm
{

    const PAYMENT_ID = 'paymentId';
    const PAYMENT_PROPERTY_PATH = 'payment';
    const PAYMENT_ID_PROPERTY_PATH = self::PAYMENT_PROPERTY_PATH . '.' . self::PAYMENT_ID;

    /**
     * @var QuoteTransfer
     */
    protected $quoteTransfer;

    /**
     * @var PaymentSubFormInterface[]
     */
    protected $paymentMethodsSubForms;

    /**
     * @param QuoteTransfer $quoteTransfer
     * @param PaymentSubFormInterface[] $paymentMethodsSubForms
     */
    public function __construct(QuoteTransfer $quoteTransfer, $paymentMethodsSubForms)
    {
        $this->quoteTransfer = $quoteTransfer;
        $this->paymentMethodsSubForms = $paymentMethodsSubForms;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'paymentForm';
    }

    /**
     * @return TransferInterface|null
     */
    protected function getDataClass()
    {
        return null;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->addPaymentMethods($builder)
             ->addSubmit($builder);
    }

    /**
     * @param FormBuilderInterface $builder
     *
     * @return self
     */
    protected function addPaymentMethods(FormBuilderInterface $builder)
    {
        $paymentMethods = $this->getPaymentMethods();

        $this->addPaymentMethodChoices($builder, $paymentMethods)
             ->addPaymentMethodSubForms($builder, $paymentMethods);

        return $this;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $paymentMethods
     *
     * @return self
     */
    protected function addPaymentMethodChoices(FormBuilderInterface $builder, $paymentMethods)
    {
        $builder->add(
            self::PAYMENT_ID,
            'choice',
            [
                'choices' => array_keys($paymentMethods),
                'label' => false,
                'required' => true,
                'expanded' => true,
                'multiple' => false,
                'empty_value' => false,
                'property_path' => self::PAYMENT_ID_PROPERTY_PATH,
            ]
        );

        return $this;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param $paymentMethods
     *
     * @return self
     */
    protected function addPaymentMethodSubForms(FormBuilderInterface $builder, $paymentMethods)
    {
        foreach ($paymentMethods as $paymentMethodName => $paymentMethodSubForm) {
            $builder->add(
                $paymentMethodName,
                $paymentMethodSubForm,
                [
                    'property_path' => 'payment.payolution',
                    'error_bubbling' => true,
                ]
            );
        }

        return $this;
    }

    /**
     * @param FormBuilderInterface $builder
     *
     * @return self
     */
    protected function addSubmit(FormBuilderInterface $builder)
    {
        $builder->add('checkout.step.summary', 'submit');

        return $this;
    }

    /**
     * @return array
     */
    protected function getPaymentMethods()
    {
        $paymentMethods = [];

        foreach ($this->paymentMethodsSubForms as $paymentMethodSubForm) {
            $subForm = $this->createSubForm($paymentMethodSubForm);
            $paymentMethods[$subForm->getName()] = $subForm;
        }

        return $paymentMethods;
    }

    /**
     * @param PaymentSubFormInterface $paymentMethodSubForm
     *
     * @return abstractForm
     */
    protected function createSubForm(PaymentSubFormInterface $paymentMethodSubForm)
    {
        return $paymentMethodSubForm->createSubFrom($this->quoteTransfer);
    }

    /**
     * @return TransferInterface|array
     */
    public function populateFormFields()
    {
        return [];
    }

}
