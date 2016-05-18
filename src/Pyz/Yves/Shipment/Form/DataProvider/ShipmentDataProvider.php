<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Shipment\Form\DataProvider;

use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\ShipmentMethodTransfer;
use Generated\Shared\Transfer\ShipmentTransfer;
use Pyz\Yves\Shipment\Form\ShipmentSubForm;
use Spryker\Client\Cart\CartClientInterface;
use Spryker\Client\Glossary\GlossaryClientInterface;
use Spryker\Client\Shipment\ShipmentClientInterface;
use Spryker\Shared\Kernel\Store;
use Spryker\Shared\Library\Currency\CurrencyManager;
use Spryker\Yves\StepEngine\Dependency\DataProvider\DataProviderInterface;

class ShipmentDataProvider implements DataProviderInterface
{

    const FIELD_ID_SHIPMENT_METHOD = 'idShipmentMethod';

    /**
     * @var \Spryker\Client\Shipment\ShipmentClientInterface
     */
    protected $shipmentClient;

    /**
     * @var \Spryker\Client\Glossary\GlossaryClientInterface
     */
    protected $glossaryClient;

    /**
     * @var \Spryker\Client\Cart\CartClientInterface
     */
    protected $cartClient;

    /**
     * @var \Spryker\Shared\Kernel\Store
     */
    protected $store;

    /**
     * @var \Spryker\Shared\Library\Currency\CurrencyManager
     */
    protected $currencyManager;

    /**
     * @param \Spryker\Client\Shipment\ShipmentClientInterface $shipmentClient
     * @param \Spryker\Client\Glossary\GlossaryClientInterface $glossaryClient
     * @param \Spryker\Client\Cart\CartClientInterface $cartClient
     * @param \Spryker\Shared\Kernel\Store $store
     * @param \Spryker\Shared\Library\Currency\CurrencyManager $currencyManager
     */
    public function __construct(
        ShipmentClientInterface $shipmentClient,
        GlossaryClientInterface $glossaryClient,
        CartClientInterface $cartClient,
        Store $store,
        CurrencyManager $currencyManager
    ) {

        $this->shipmentClient = $shipmentClient;
        $this->glossaryClient = $glossaryClient;
        $this->cartClient = $cartClient;
        $this->store = $store;
        $this->currencyManager = $currencyManager;
    }


    /**
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function getData()
    {
        $quoteTransfer = $this->getDataClass();
        if ($quoteTransfer->getShipment() === null) {
            $shipmentTransfer = new ShipmentTransfer();
            $quoteTransfer->setShipment($shipmentTransfer);
        }

        return $quoteTransfer;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return [
            ShipmentSubForm::OPTION_SHIPMENT_METHODS => $this->createAvailableShipmentChoiceList()
        ];
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
        return $this->shipmentClient->getAvailableMethods($this->getDataClass());
    }

    /**
     * @param \Generated\Shared\Transfer\ShipmentMethodTransfer $shipmentMethodTransfer
     * 9
     * @return string
     */
    protected function getShipmentDescription(ShipmentMethodTransfer $shipmentMethodTransfer)
    {
        $deliveryTime = $this->getDeliveryTime($shipmentMethodTransfer);
        $shipmentPrice = $this->getFormattedShipmentPrice($shipmentMethodTransfer);

        $shipmentDescription = $this->translate($shipmentMethodTransfer->getName())
            . ' | ' . $this->translate('page.checkout.shipping.price') . ' ' . $shipmentPrice;

        if ($deliveryTime !== 0) {
            $shipmentDescription .= ' | ' . $this->translate('page.checkout.shipping.delivery_time') . ' ' . $deliveryTime;
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
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    protected function getDataClass()
    {
        return $this->cartClient->getQuote();
    }

}
