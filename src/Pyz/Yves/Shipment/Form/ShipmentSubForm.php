<?php

namespace Pyz\Yves\Shipment\Form;

use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\ShipmentMethodsTransfer;
use Generated\Shared\Transfer\ShipmentMethodTransfer;
use Spryker\Client\Glossary\GlossaryClientInterface;
use Spryker\Client\Shipment\ShipmentClientInterface;
use Spryker\Shared\Gui\Form\AbstractForm;
use Spryker\Shared\Kernel\Store;
use Spryker\Shared\Library\Currency\CurrencyManager;
use Spryker\Shared\Transfer\TransferInterface;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class ShipmentSubForm extends AbstractForm
{

    const FIELD_ID_SHIPMENT_METHOD = 'idShipmentMethod';

    /**
     * @var QuoteTransfer
     */
    protected $quoteTransfer;

    /**
     * @var ShipmentClientInterface
     */
    protected $shipmentClient;

    /**
     * @var GlossaryClientInterface
     */
    protected $glossaryClient;

    /**
     * @var Store
     */
    protected $store;

    /**
     * @var CurrencyManager
     */
    protected $currencyManager;

    /**
     * @param QuoteTransfer $quoteTransfer
     * @param ShipmentClientInterface $shipmentClient
     * @param GlossaryClientInterface $glossaryClient
     * @param Store $store
     * @param CurrencyManager $currencyManager
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

    /**
     * @return TransferInterface|null
     */
    protected function getDataClass()
    {
        return new ShipmentMethodTransfer();
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->addShipmentMethods($builder);
//            ->addShipmentTransformer($builder);
    }

    /**
     * @param FormBuilderInterface $builder
     *
     * @return ShipmentSubForm
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

//    /**
//     * @param FormBuilderInterface $builder
//     *
//     * @return self
//     */
//    protected function addShipmentTransformer(FormBuilderInterface $builder)
//    {
//        $builder->get(self::FIELD_ID_SHIPMENT_METHOD)
//            ->addModelTransformer(
//                new CallbackTransformer(
//                    function (ShipmentMethodTransfer $shipmentMethodTransfer = null) {
//                        if ($shipmentMethodTransfer !== null) {
//                            return $shipmentMethodTransfer->getIdShipmentMethod();
//                        }
//                    },
//                    function ($submittedIdShipmentMethod) {
//                        return $this->getShipmentMethodById($submittedIdShipmentMethod);
//                    }
//                )
//            );
//
//        return $this;
//    }

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

//    /**
//     * @param int $idShipmentMethod
//     *
//     * @return ShipmentMethodTransfer|null
//     */
//    protected function getShipmentMethodById($idShipmentMethod)
//    {
//        $shipmentMethodsTransfer = $this->getAvailableShipmentMethods();
//
//        foreach ($shipmentMethodsTransfer->getMethods() as $shipmentMethodTransfer) {
//            if ($shipmentMethodTransfer->getIdShipmentMethod()  === $idShipmentMethod) {
//                return $shipmentMethodTransfer;
//            }
//        }
//
//        return null;
//    }

    /**
     * @return ShipmentMethodsTransfer
     */
    protected function getAvailableShipmentMethods()
    {
        return $this->shipmentClient->getAvailableMethods($this->quoteTransfer);
    }

    /**
     * @param ShipmentMethodTransfer $shipmentMethodTransfer
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
     * @param ShipmentMethodTransfer $method
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
     * @param ShipmentMethodTransfer $shipmentMethodTransfer
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
     * @return TransferInterface|array
     */
    public function populateFormFields()
    {
        return [];
    }

}
