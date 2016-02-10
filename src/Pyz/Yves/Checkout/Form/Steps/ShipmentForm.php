<?php

namespace Pyz\Yves\Checkout\Form\Steps;

use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\ShipmentTransfer;
use Pyz\Yves\Checkout\Dependency\Plugin\CheckoutSubFormPluginInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ShipmentForm extends AbstractType
{

    const SHIPMENT_PROPERTY_PATH = 'shipment';
    const SHIPMENT_SELECTION = 'shipmentSelection';
    const SHIPMENT_SELECTION_PROPERTY_PATH = self::SHIPMENT_PROPERTY_PATH . '.' . self::SHIPMENT_SELECTION;

    /**
     * @var \Generated\Shared\Transfer\QuoteTransfer
     */
    protected $quoteTransfer;

    /**
     * @var \Pyz\Yves\Checkout\Dependency\Plugin\CheckoutSubFormPluginInterface[]
     */
    protected $shipmentMethodsSubFormPlugins;

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @param \Pyz\Yves\Checkout\Dependency\Plugin\CheckoutSubFormPluginInterface[] $shipmentMethodsSubFormPlugins
     */
    public function __construct(QuoteTransfer $quoteTransfer, array $shipmentMethodsSubFormPlugins = [])
    {
        $this->quoteTransfer = $quoteTransfer;
        $this->shipmentMethodsSubFormPlugins = $shipmentMethodsSubFormPlugins;

        $this->setShipmentForDataClass();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'shipmentForm';
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this
            ->addShipmentMethods($builder)
            ->addSubmit($builder);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return self
     */
    protected function addShipmentMethods(FormBuilderInterface $builder)
    {
        $shipmentMethodSubForms = $this->getShipmentMethodSubForms();
        $shipmentMethodChoices = $this->getShipmentMethodsChoices($shipmentMethodSubForms);

        $this->addShipmentMethodChoices($builder, $shipmentMethodChoices)
            ->addShipmentMethodSubForms($builder, $shipmentMethodSubForms);

        return $this;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $shipmentMethodChoices
     *
     * @return self
     */
    protected function addShipmentMethodChoices(FormBuilderInterface $builder, array $shipmentMethodChoices)
    {
        $builder->add(
            self::SHIPMENT_SELECTION,
            'choice',
            [
                'choices' => $shipmentMethodChoices,
                'label' => false,
                'required' => true,
                'expanded' => true,
                'multiple' => false,
                'empty_value' => false,
                'property_path' => self::SHIPMENT_SELECTION_PROPERTY_PATH,
            ]
        );

        return $this;
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param \Pyz\Yves\Checkout\Dependency\SubFormInterface[] $shipmentMethodSubForms
     *
     * @return self
     */
    protected function addShipmentMethodSubForms(FormBuilderInterface $builder, array $shipmentMethodSubForms)
    {
        foreach ($shipmentMethodSubForms as $shipmentMethodSubForm) {
            $builder->add(
                $shipmentMethodSubForm->getName(),
                $shipmentMethodSubForm,
                [
                    'property_path' => self::SHIPMENT_PROPERTY_PATH .  '.' . $shipmentMethodSubForm->getPropertyPath(),
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
        $builder->add('checkout.step.payment', 'submit');

        return $this;
    }

    /**
     * @return \Pyz\Yves\Checkout\Dependency\SubFormInterface[]
     */
    protected function getShipmentMethodSubForms()
    {
        $shipmentMethodSubForms = [];

        foreach ($this->shipmentMethodsSubFormPlugins as $shipmentMethodSubForm) {
            $shipmentMethodSubForms[] = $this->createSubForm($shipmentMethodSubForm);
        }

        return $shipmentMethodSubForms;
    }

    /**
     * @param \Pyz\Yves\Checkout\Dependency\SubFormInterface[] $shipmentMethodSubForms
     *
     * @return array
     */
    protected function getShipmentMethodsChoices(array $shipmentMethodSubForms)
    {
        $choices = [];

        foreach ($shipmentMethodSubForms as $shipmentMethodSubForm) {
            $subFormName = $shipmentMethodSubForm->getName();
            $choices[$subFormName] = str_replace('_', ' ', $subFormName);
        }

        return $choices;
    }

    /**
     * @param \Pyz\Yves\Checkout\Dependency\Plugin\CheckoutSubFormPluginInterface $shipmentMethodSubForm
     *
     * @return \Pyz\Yves\Checkout\Dependency\SubFormInterface
     */
    protected function createSubForm(CheckoutSubFormPluginInterface $shipmentMethodSubForm)
    {
        return $shipmentMethodSubForm->createSubFrom($this->quoteTransfer);
    }

    /**
     * @return void
     */
    protected function setShipmentForDataClass()
    {
        if ($this->quoteTransfer->getShipment() === null) {
            $this->quoteTransfer->setShipment(new ShipmentTransfer());
        }
    }

}
