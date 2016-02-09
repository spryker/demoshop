<?php

namespace Pyz\Yves\Shipment\Form;

use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\ShipmentMethodsTransfer;
use Generated\Shared\Transfer\ShipmentMethodTransfer;
use Spryker\Shared\Gui\Form\AbstractForm;
use Spryker\Client\Glossary\GlossaryClientInterface;
use Spryker\Client\Shipment\ShipmentClientInterface;
use Spryker\Shared\Kernel\Store;
use Spryker\Shared\Library\Currency\CurrencyManager;
use Spryker\Shared\Transfer\TransferInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Pyz\Yves\Checkout\Dependency\SubFormInterface;

class ShipmentSubForm extends AbstractForm implements SubFormInterface
{

    const FIELD_ID_SHIPMENT_METHOD = 'idShipmentMethod';

    /**
     * @var \Generated\Shared\Transfer\QuoteTransfer
     */
    protected $quoteTransfer;

    /**
     * @var \Spryker\Client\Shipment\ShipmentClientInterface
     */
    protected $shipmentClient;

    /**
     * @var \Spryker\Client\Glossary\GlossaryClientInterface
     */
    protected $glossaryClient;

    /**
     * @var \Spryker\Shared\Kernel\Store
     */
    protected $store;

    /**
     * @var \Spryker\Shared\Library\Currency\CurrencyManager
     */
    protected $currencyManager;

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @param \Spryker\Client\Shipment\ShipmentClientInterface $shipmentClient
     * @param \Spryker\Client\Glossary\GlossaryClientInterface $glossaryClient
     * @param \Spryker\Shared\Kernel\Store $store
     * @param \Spryker\Shared\Library\Currency\CurrencyManager $currencyManager
     */
    public function __construct(
        QuoteTransfer $quoteTransfer,
        ShipmentClientInterface $shipmentClient,
        GlossaryClientInterface $glossaryClient,
        Store $store,
        CurrencyManager $currencyManager
    ) {
        $this->quoteTransfer = $quoteTransfer;
        $this->shipmentClient = $shipmentClient;
        $this->glossaryClient = $glossaryClient;
        $this->store = $store;
        $this->currencyManager = $currencyManager;

        if ($this->quoteTransfer->getShipment()->getMethod()=== null) {
            $this->quoteTransfer->getShipment()->setMethod(new ShipmentMethodTransfer());
        }
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dummy_shipment';
    }

    public function getPropertyPath()
    {
        return 'method';
    }

    /**
     * @return \Spryker\Shared\Transfer\TransferInterface|null
     */
    protected function getDataClass()
    {
        return new ShipmentMethodTransfer();
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->addShipmentMethods($builder);
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return \Pyz\Yves\Shipment\Form\ShipmentSubForm
     */
    protected function addShipmentMethods(FormBuilderInterface $builder)
    {
        $builder->add(
            self::FIELD_ID_SHIPMENT_METHOD,
            'choice',
            [
                'choices' => $this->createAvailableShipmentChoiceList(),
                'expanded' => true,
                'multiple' => false,
                'required' => true,
                'empty_value' => false,
                'constraints' => [
                    new NotBlank(),
                ],
            ]
        );

        return $this;
    }

    /**
     * @return array
     */
    protected function createAvailableShipmentChoiceList()
    {
        $shipmentMethods = [];

        $shipmentMethodsTransfer = $this->getAvailableShipmentMethods();
        foreach ($shipmentMethodsTransfer->getMethods() as $shipmentMethodTransfer) {
            $shipmentMethods[$shipmentMethodTransfer->getIdShipmentMethod()] = $this->getShipmentDescription(
                $shipmentMethodTransfer
            );
        }

        return $shipmentMethods;
    }

    /**
     * @return \Generated\Shared\Transfer\ShipmentMethodsTransfer
     */
    protected function getAvailableShipmentMethods()
    {
        return $this->shipmentClient->getAvailableMethods($this->quoteTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\ShipmentMethodTransfer $shipmentMethodTransfer
     *9
     * @return string
     */
    protected function getShipmentDescription(ShipmentMethodTransfer $shipmentMethodTransfer)
    {
        $deliveryTime = $this->getDeliveryTime($shipmentMethodTransfer);
        $shipmentPrice = $this->getFormattedShipmentPrice($shipmentMethodTransfer);

        $shipmentDescription = $this->translate($shipmentMethodTransfer->getName())
            . ' | ' . $this->translate('page.checkout.shipping.price') . ': ' . $shipmentPrice;

        if ($deliveryTime !== 0) {
            $shipmentDescription .= ' | ' . $this->translate('page.checkout.shipping.delivery_time') . ': ' . $deliveryTime;
        }

        return $shipmentDescription;
    }

    /**
     * @param \Generated\Shared\Transfer\ShipmentMethodTransfer $method
     *
     * @return int
     */
    protected function getDeliveryTime(ShipmentMethodTransfer $method)
    {
        $deliveryTime = 0;

        if (!empty($method->getDeliveryTime())) {
            $deliveryTime = ($method->getDeliveryTime() / 3600);
        }

        return $deliveryTime;
    }

    /**
     * @param \Generated\Shared\Transfer\ShipmentMethodTransfer $shipmentMethodTransfer
     *
     * @return int
     */
    protected function getFormattedShipmentPrice(ShipmentMethodTransfer $shipmentMethodTransfer)
    {
        return $this->currencyManager->format(
            $this->currencyManager->convertCentToDecimal($shipmentMethodTransfer->getDefaultPrice())
        );
    }

    /**
     * @param string $translationKey
     *
     * @return string
     */
    protected function translate($translationKey)
    {
        return $this->glossaryClient->translate($translationKey, $this->store->getCurrentLocale());
    }

    /**
     * @return \Spryker\Shared\Transfer\TransferInterface|array
     */
    public function populateFormFields()
    {
        return [];
    }

}
