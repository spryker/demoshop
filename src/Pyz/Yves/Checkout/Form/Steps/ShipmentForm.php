<?php

namespace Pyz\Yves\Checkout\Form\Steps;

use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\ShipmentTransfer;
use Pyz\Yves\Checkout\Dependency\Plugin\CheckoutSubFormPluginInterface;
use Pyz\Yves\Checkout\Form\AbstractCheckoutSubForm;
use Spryker\Shared\Gui\Form\AbstractForm;
use Spryker\Shared\Transfer\TransferInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class ShipmentForm extends AbstractForm
{

    const SHIPMENT_PROPERTY_PATH = 'shipment';
    const SHIPMENT_SELECTION = 'shipmentSelection';
    const SHIPMENT_SELECTION_PROPERTY_PATH = self::SHIPMENT_PROPERTY_PATH . '.' . self::SHIPMENT_SELECTION;

    /**
     * @var QuoteTransfer
     */
    protected $quoteTransfer;

    /**
     * @var CheckoutSubFormPluginInterface[]
     */
    protected $shipmentMethodsSubFormPlugins;

    /**
     * @param QuoteTransfer $quoteTransfer
     * @param CheckoutSubFormPluginInterface[] $shipmentMethodsSubFormPlugins
     */
    public function __construct(QuoteTransfer $quoteTransfer, $shipmentMethodsSubFormPlugins)
    {
        $this->quoteTransfer = $quoteTransfer;
        $this->shipmentMethodsSubFormPlugins = $shipmentMethodsSubFormPlugins;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'shipmentForm';
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
        $this->addShipmentMethods($builder)
            ->addSubmit($builder);
    }

    /**
     * @param FormBuilderInterface $builder
     *
     * @return self
     */
    protected function addShipmentMethods(FormBuilderInterface $builder)
    {
        $this->setShipmentForDataClass();

        $shipmentMethodSubForms = $this->getShipmentMethodSubForms();
        $shipmentMethodChoices = $this->getShipmentMethodsChoices($shipmentMethodSubForms);

        $this->addShipmentMethodChoices($builder, $shipmentMethodChoices)
            ->addShipmentMethodSubForms($builder, $shipmentMethodSubForms);

        return $this;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $shipmentMethodChoices
     *
     * @return self
     */
    protected function addShipmentMethodChoices(FormBuilderInterface $builder, $shipmentMethodChoices)
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
     * @param FormBuilderInterface $builder
     * @param AbstractCheckoutSubForm[] $shipmentMethodSubForms
     *
     * @return self
     */
    protected function addShipmentMethodSubForms(FormBuilderInterface $builder, $shipmentMethodSubForms)
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
     * @param FormBuilderInterface $builder
     *
     * @return self
     */
    protected function addSubmit(FormBuilderInterface $builder)
    {
        $builder->add('checkout.step.payment', 'submit');

        return $this;
    }

    /**
     * @return AbstractCheckoutSubForm[]
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
     * @param AbstractCheckoutSubForm[] $shipmentMethodSubForms
     *
     * @return array
     */
    protected function getShipmentMethodsChoices($shipmentMethodSubForms)
    {
        $choices = [];

        foreach ($shipmentMethodSubForms as $shipmentMethodSubForm) {
            $subFormName = $shipmentMethodSubForm->getName();
            $choices[$subFormName] = str_replace('_', ' ', $subFormName);
        }

        return $choices;
    }

    /**
     * @param CheckoutSubFormPluginInterface $shipmentMethodSubForm
     *
     * @return AbstractCheckoutSubForm
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

    /**
     * @return TransferInterface|array
     */
    public function populateFormFields()
    {
        return [];
    }

}
