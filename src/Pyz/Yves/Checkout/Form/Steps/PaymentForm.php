<?php

namespace Pyz\Yves\Checkout\Form\Steps;

use Generated\Shared\Transfer\PaymentTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Checkout\Dependency\Plugin\PaymentSubFormInterface;
use Spryker\Shared\Gui\Form\AbstractForm;
use Spryker\Shared\Transfer\TransferInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class PaymentForm extends AbstractForm
{

    const PAYMENT_PROPERTY_PATH = 'payment';
    const PAYMENT_SELECTION = 'paymentSelection';
    const PAYMENT_SELECTION_PROPERTY_PATH = self::PAYMENT_PROPERTY_PATH . '.' . self::PAYMENT_SELECTION;

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

        if ($this->quoteTransfer->getPayment() === null) {
            $this->quoteTransfer->setPayment(new PaymentTransfer());
        }

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
        $paymentMethodChoices = $this->getPaymentMethodChoices($paymentMethods);

        $this->addPaymentMethodChoices($builder, $paymentMethodChoices)
             ->addPaymentMethodSubForms($builder, $paymentMethods);

        return $this;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param $paymentMethodChoices
     *
     * @return $this
     */
    protected function addPaymentMethodChoices(FormBuilderInterface $builder, $paymentMethodChoices)
    {
        $builder->add(
            self::PAYMENT_SELECTION,
            'choice',
            [
                'choices' => $paymentMethodChoices,
                'label' => false,
                'required' => true,
                'expanded' => true,
                'multiple' => false,
                'empty_value' => false,
                'property_path' => self::PAYMENT_SELECTION_PROPERTY_PATH,
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

    protected function getPaymentMethodChoices($paymentMethods)
    {
        $choices = [];

        foreach ($paymentMethods as $paymentMethodName => $paymentMethodSubForm) {
            $choices[$paymentMethodName] = str_replace('_', ' ', $paymentMethodName);
        }

        return $choices;
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
