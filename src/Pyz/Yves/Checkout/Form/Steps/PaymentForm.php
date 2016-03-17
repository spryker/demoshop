<?php

namespace Pyz\Yves\Checkout\Form\Steps;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Checkout\Dependency\Plugin\CheckoutSubFormPluginInterface;
use Pyz\Yves\Checkout\Dependency\SubFormInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PaymentForm extends AbstractType
{

    const PAYMENT_PROPERTY_PATH = QuoteTransfer::PAYMENT;
    const PAYMENT_SELECTION = 'paymentSelection';
    const PAYMENT_SELECTION_PROPERTY_PATH = self::PAYMENT_PROPERTY_PATH . '.' . self::PAYMENT_SELECTION;

    /**
     * @var \Pyz\Yves\Checkout\Dependency\Plugin\CheckoutSubFormPluginInterface[]
     */
    protected $paymentMethodSubFormPlugins;

    /**
     * @param \Pyz\Yves\Checkout\Dependency\Plugin\CheckoutSubFormPluginInterface[] $paymentMethodSubFormPlugins
     */
    public function __construct(array $paymentMethodSubFormPlugins)
    {
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
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->addPaymentMethods($builder, $options)
             ->addSubmit($builder);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
     */
    protected function addPaymentMethods(FormBuilderInterface $builder, array $options)
    {
        $paymentMethodSubForms = $this->getPaymentMethodSubForms();
        $paymentMethodChoices = $this->getPaymentMethodChoices($paymentMethodSubForms);

        $this->addPaymentMethodChoices($builder, $paymentMethodChoices)
             ->addPaymentMethodSubForms($builder, $paymentMethodSubForms, $options);

        return $this;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $paymentMethodChoices
     *
     * @return $this
     */
    protected function addPaymentMethodChoices(FormBuilderInterface $builder, array $paymentMethodChoices)
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
     * @param array $options
     *
     * @return \Pyz\Yves\Checkout\Form\Steps\PaymentForm
     */
    protected function addPaymentMethodSubForms(FormBuilderInterface $builder, $paymentMethodSubForms, array $options)
    {
        foreach ($paymentMethodSubForms as $paymentMethodSubForm) {
            $builder->add(
                $paymentMethodSubForm->getName(),
                $paymentMethodSubForm,
                [
                    'property_path' => self::PAYMENT_PROPERTY_PATH . '.' . $paymentMethodSubForm->getPropertyPath(),
                    'error_bubbling' => true,
                    'select_options' => $options['select_options']
                ]
            );
        }

        return $this;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return $this
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
    protected function getPaymentMethodChoices(array $paymentMethodSubForms)
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
        return $paymentMethodSubForm->createSubForm();
    }

    /**
     * @param \Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver
     *
     * @return void
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver->setRequired(SubFormInterface::OPTIONS_FIELD_NAME);
    }

}
