<?php

namespace Pyz\Yves\Checkout\Form\Steps;

use Generated\Shared\Transfer\ShipmentMethodAvailabilityTransfer;
use Generated\Shared\Transfer\ShipmentMethodTransfer;
use Generated\Shared\Transfer\ShipmentTransfer;
use Spryker\Client\Cart\CartClientInterface;
use Spryker\Client\Glossary\GlossaryClientInterface;
use Spryker\Client\Shipment\ShipmentClientInterface;
use Spryker\Shared\Gui\Form\AbstractForm;
use Spryker\Shared\Kernel\Store;
use Spryker\Shared\Library\Currency\CurrencyManager;
use Spryker\Shared\Transfer\TransferInterface;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

class ShipmentForm extends AbstractForm
{

    const FIELD_SHIPMENT_METHOD = 'shipmentMethod';

    /**
     * @var GlossaryClientInterface
     */
    protected $glossaryClient;

    /**
     * @var ShipmentClientInterface
     */
    protected $shipmentClient;

    /**
     * @var CartClientInterface
     */
    protected $cartClient;

    /**
     * @var array
     */
    protected $availableShipmentMethods = [];

    /**
     * @var Store
     */
    protected $store;

    /**
     * @var CurrencyManager
     */
    protected $currencyManager;

    /**
     * @param GlossaryClientInterface $glossaryClient
     * @param ShipmentClientInterface $shipmentClient
     * @param CartClientInterface $cartClient
     * @param Store $store
     * @param CurrencyManager $currencyManager
     */
    public function __construct(
        GlossaryClientInterface $glossaryClient,
        ShipmentClientInterface $shipmentClient,
        CartClientInterface $cartClient,
        Store $store,
        CurrencyManager $currencyManager
    ) {
        $this->glossaryClient = $glossaryClient;
        $this->shipmentClient = $shipmentClient;
        $this->cartClient = $cartClient;
        $this->store = $store;
        $this->currencyManager = $currencyManager;
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
        $this->addShipmentMethods($builder, $options)
             ->addShipmentTransformer($builder)
             ->addSubmit($builder, $options);
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     *
     * @return self
     */
    protected function addShipmentMethods(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            self::FIELD_SHIPMENT_METHOD,
            'choice',
            [
                'choices' => $this->createAvailableShipmentChoiceList(),
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'empty_value' => false,
            ]
        );

        return $this;
    }

    /**
     * @param FormBuilderInterface $builder
     *
     * @return self
     */
    protected function addShipmentTransformer(FormBuilderInterface $builder)
    {
        $builder->get(self::FIELD_SHIPMENT_METHOD)
            ->addModelTransformer(
                new CallbackTransformer(
                    function (ShipmentMethodTransfer $shipmentMethodTransfer = null) {
                        if ($shipmentMethodTransfer !== null) {
                            return $shipmentMethodTransfer->getIdShipmentMethod();
                        }
                    },
                    function ($submittedIdShipmentMethod) {
                        return $this->getShipmentMethodById($submittedIdShipmentMethod);
                    }
                )
            );

        return $this;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     *
     * @return self
     */
    protected function addSubmit(FormBuilderInterface $builder, array $options)
    {
        $builder->add('checkout.step.payment', 'submit');

        return $this;
    }

    /**
     * @return array
     */
    protected function createAvailableShipmentChoiceList()
    {
        $shipmentMethods = [];

        $shipmentTransfer = $this->getAvailableShipmentMethods();
        foreach ($shipmentTransfer->getMethods() as $shipmentMethodTransfer) {
            $shipmentMethods[$shipmentMethodTransfer->getIdShipmentMethod()] = $this->getShipmentDescription(
                $shipmentMethodTransfer
            );
        }

        return $shipmentMethods;
    }

    /**
     * @param ShipmentMethodTransfer $method
     *
     * @return int
     */
    protected function getDeliveryTime(ShipmentMethodTransfer $method)
    {
        $deliveryTime = 0;
        if (!empty($method->getTime())) {
            $deliveryTime = ($method->getTime() / 3600);
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
            $this->currencyManager->convertCentToDecimal($shipmentMethodTransfer->getPrice())
        );
    }

    /**
     * @param ShipmentMethodTransfer $shipmentMethodTransfer
     *
     * @return string
     */
    protected function getShipmentDescription(ShipmentMethodTransfer $shipmentMethodTransfer)
    {
        $deliveryTime = $this->getDeliveryTime($shipmentMethodTransfer);
        $shipmentPrice = $this->getFormattedShipmentPrice($shipmentMethodTransfer);

        $shipmentDescription = $this->translate($shipmentMethodTransfer->getGlossaryKeyName())
            . ' ' . $this->translate($shipmentMethodTransfer->getGlossaryKeyDescription())
            . ' | ' . $this->translate('page.checkout.shipping.price') . ': ' . $shipmentPrice;

        if ($deliveryTime !== 0) {
            $shipmentDescription .= ' | ' . $this->translate('page.checkout.shipping.delivery_time') . ': ' . $deliveryTime;
        }

        return $shipmentDescription;
    }

    /**
     * @param int $idShipmentMethod
     *
     * @return ShipmentMethodTransfer|null
     */
    protected function getShipmentMethodById($idShipmentMethod)
    {
        $shipmentMethodTransfer = $this->getAvailableShipmentMethods();
        foreach ($shipmentMethodTransfer->getMethods() as $shipmentMethodTransfer) {
          if ($shipmentMethodTransfer->getIdShipmentMethod()  === $idShipmentMethod) {
              return $shipmentMethodTransfer;
          }
        }

        return null;
    }

    /**
     * @return ShipmentTransfer
     */
    protected function getAvailableShipmentMethods()
    {
        if (empty($this->availableShipmentMethods)) {
            $shipmentMethodAvailabilityTransfer = $this->createShipmentAvailabilityTransfer()
                ->setQuote($this->cartClient->getQuote());

            $this->availableShipmentMethods = $this->shipmentClient->getAvailableMethods(
                $shipmentMethodAvailabilityTransfer
            );
        }

        return $this->availableShipmentMethods;
    }

    /**
     * @return ShipmentMethodAvailabilityTransfer
     */
    protected function createShipmentAvailabilityTransfer()
    {
        return new ShipmentMethodAvailabilityTransfer();
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
