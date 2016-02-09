<?php

namespace Pyz\Yves\Checkout\Form\Steps;

use Generated\Shared\Transfer\PaymentTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Checkout\Dependency\Plugin\CheckoutSubFormPluginInterface;
use Spryker\Shared\Gui\Form\AbstractForm;
use Spryker\Shared\Transfer\TransferInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Pyz\Yves\Checkout\Dependency\SubFormInterface;

class PaymentForm extends AbstractForm
{

    const PAYMENT_PROPERTY_PATH = QuoteTransfer::PAYMENT;
    const PAYMENT_SELECTION = 'paymentSelection';
    const PAYMENT_SELECTION_PROPERTY_PATH = self::PAYMENT_PROPERTY_PATH . '.' . self::PAYMENT_SELECTION;

    /**
     * @var \Generated\Shared\Transfer\QuoteTransfer
     */
    protected $quoteTransfer;

    /**
     * @var \Pyz\Yves\Checkout\Dependency\Plugin\CheckoutSubFormPluginInterface[]
     */
    protected $paymentMethodSubFormPlugins;

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @param \Pyz\Yves\Checkout\Dependency\Plugin\CheckoutSubFormPluginInterface[] $paymentMethodSubFormPlugins
     */
    public function __construct(QuoteTransfer $quoteTransfer, $paymentMethodSubFormPlugins)
    {
        $this->quoteTransfer = $quoteTransfer;
        $this->paymentMethodSubFormPlugins = $paymentMethodSubFormPlugins;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'paymentForm';
    }

    /**
     * @return \Spryker\Shared\Transfer\TransferInterface|null
     */
    protected function getDataClass()
    {
        return null;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
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
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return self
     */
    protected function addPaymentMethods(FormBuilderInterface $builder)
    {
        $this->setPaymentForDataClass();

        $paymentMethodSubForms = $this->getPaymentMethodSubForms();
        $paymentMethodChoices = $this->getPaymentMethodChoices($paymentMethodSubForms);

        $this->addPaymentMethodChoices($builder, $paymentMethodChoices)
             ->addPaymentMethodSubForms($builder, $paymentMethodSubForms);

        return $this;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $paymentMethodChoices
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
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param \Pyz\Yves\Checkout\Dependency\SubFormInterface[] $paymentMethodSubForms
     *
     * @return self
     */
    protected function addPaymentMethodSubForms(FormBuilderInterface $builder, $paymentMethodSubForms)
    {
        foreach ($paymentMethodSubForms as $paymentMethodSubForm) {
            $builder->add(
                $paymentMethodSubForm->getName(),
                $paymentMethodSubForm,
                [
                    'property_path' => self::PAYMENT_PROPERTY_PATH . '.' . $paymentMethodSubForm->getPropertyPath(),
                    'error_bubbling' => true,
                ]
            );
        }

        return $this;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return self
     */
    protected function addSubmit(FormBuilderInterface $builder)
    {
        $builder->add('checkout.step.summary', 'submit');

        return $this;
    }

    /**
     * @return \Pyz\Yves\Checkout\Dependency\SubFormInterface[]
     */
    protected function getPaymentMethodSubForms()
    {
        $paymentMethodSubForms = [];

        foreach ($this->paymentMethodSubFormPlugins as $paymentMethodSubFormPlugin) {
            $paymentMethodSubForms[] = $this->createSubForm($paymentMethodSubFormPlugin);
        }

        return $paymentMethodSubForms;
    }

    /**
     * @param \Pyz\Yves\Checkout\Dependency\SubFormInterface[] $paymentMethodSubForms
     *
     * @return array
     */
    protected function getPaymentMethodChoices($paymentMethodSubForms)
    {
        $choices = [];

        foreach ($paymentMethodSubForms as $paymentMethodSubForm) {
            $subFormName = $paymentMethodSubForm->getName();
            $choices[$subFormName] = str_replace('_', ' ', $subFormName);
        }

        return $choices;
    }

    /**
     * @param \Pyz\Yves\Checkout\Dependency\Plugin\CheckoutSubFormPluginInterface $paymentMethodSubForm
     *
     * @return \Pyz\Yves\Checkout\Dependency\SubFormInterface
     */
    protected function createSubForm(CheckoutSubFormPluginInterface $paymentMethodSubForm)
    {
        return $paymentMethodSubForm->createSubFrom($this->quoteTransfer);
    }

    /**
     * @return void
     */
    protected function setPaymentForDataClass()
    {
        if ($this->quoteTransfer->getPayment() === null) {
            $this->quoteTransfer->setPayment(new PaymentTransfer());
        }
    }

    /**
     * @return \Spryker\Shared\Transfer\TransferInterface|array
     */
    public function populateFormFields()
    {
        return [];
    }

}
