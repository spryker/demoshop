<?php

namespace Pyz\Yves\Checkout\Form\Steps;

use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\ShipmentTransfer;
use Pyz\Yves\Checkout\Dependency\Plugin\CheckoutSubFormInterface;
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
     * @var CheckoutSubFormInterface[]
     */
    protected $shipmentMethodsSubForms;

    /**
     * @param QuoteTransfer $quoteTransfer
     * @param CheckoutSubFormInterface[] $shipmentMethodsSubForms
     */
    public function __construct(QuoteTransfer $quoteTransfer, $shipmentMethodsSubForms)
    {
        $this->quoteTransfer = $quoteTransfer;
        $this->shipmentMethodsSubForms = $shipmentMethodsSubForms;

        if ($this->quoteTransfer->getShipment() === null) {
            $this->quoteTransfer->setShipment(new ShipmentTransfer());
        }
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
        $shipmentMethods = $this->getShipmentMethods();
        $shipmentMethodChoices = $this->getShipmentMethodsChoices($shipmentMethods);

        $this->addShipmentMethodChoices($builder, $shipmentMethodChoices)
            ->addShipmentMethodSubForms($builder, $shipmentMethods);

        return $this;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $shipmentMethodChoices
     *
     * @return $this
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
     * @param array $shipmentMethods
     *
     * @return $this
     */
    protected function addShipmentMethodSubForms(FormBuilderInterface $builder, $shipmentMethods)
    {
        foreach ($shipmentMethods as $shipmentMethodName => $shipmentMethodsSubForm) {
            $builder->add(
                $shipmentMethodName,
                $shipmentMethodsSubForm,
                [
                    'property_path' => 'shipment.method',
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
     * @return array
     */
    protected function getShipmentMethods()
    {
        $shipmentMethods = [];

        foreach ($this->shipmentMethodsSubForms as $shipmentMethodSubForm) {
            $subForm = $this->createSubForm($shipmentMethodSubForm);
            $shipmentMethods[$subForm->getName()] = $subForm;
        }

        return $shipmentMethods;
    }

    /**
     * @param array $shipmentMethods
     *
     * @return array
     */
    protected function getShipmentMethodsChoices($shipmentMethods)
    {
        $choices = [];

        foreach ($shipmentMethods as $shipmentMethodName => $shipmentMethodSubForm) {
            $choices[$shipmentMethodName] = str_replace('_', ' ', $shipmentMethodName);
        }

        return $choices;
    }

    /**
     * @param CheckoutSubFormInterface $shipmentMethodSubForm
     *
     * @return AbstractForm
     */
    protected function createSubForm(CheckoutSubFormInterface $shipmentMethodSubForm)
    {
        return $shipmentMethodSubForm->createSubFrom($this->quoteTransfer);
    }

    /**
     * @return TransferInterface|array
     */
    public function populateFormFields()
    {
        return [];
    }

}
