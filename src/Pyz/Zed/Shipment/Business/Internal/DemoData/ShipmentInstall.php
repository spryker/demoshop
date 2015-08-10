<?php

namespace Pyz\Zed\Shipment\Business\Internal\DemoData;

use Generated\Shared\Transfer\ShipmentCarrierTransfer;
use Generated\Shared\Transfer\ShipmentMethodTransfer;
use SprykerFeature\Zed\Installer\Business\Model\AbstractInstaller;
use SprykerFeature\Zed\Shipment\Business\Model\Carrier;
use SprykerFeature\Zed\Shipment\Business\Model\Method;
use SprykerFeature\Zed\Shipment\Persistence\ShipmentQueryContainerInterface;

class ShipmentInstall extends AbstractInstaller
{

    const NAME_CARRIER = 'Default Carrier';
    const NAME_GLOSSARY_KEY_CARRIER = 'shipment.defaultCarrier';
    const NAME_SHIPMENT_METHOD = 'Default Shipment Method';
    const NAME_GLOSSARY_KEY_SHIPMENT_METHOD  = 'shipment.defaultCarrier.defaultMethod.name';
    const DESCRIPTION_GLOSSARY_KEY_SHIPMENT_METHOD = 'shipment.defaultCarrier.defaultMethod.description';
    const PRICE_SHIPMENT_METHOD = 10;

    /**
     * @var ShipmentQueryContainerInterface
     */
    protected $queryContainer;

    /**
     * @var Method
     */
    protected $method;

    /**
     * @var Carrier
     */
    protected $carrier;

    /**
     * @param ShipmentQueryContainerInterface $queryContainer
     * @param Carrier $carrier
     * @param Method $method
     */
    public function __construct(
        ShipmentQueryContainerInterface $queryContainer,
        Carrier $carrier,
        Method $method
    ) {
        $this->queryContainer = $queryContainer;
        $this->carrier = $carrier;
        $this->method = $method;
    }

    public function install()
    {
        $this->info('This will install a Carrier Company and Shipment Method in the demo shop');

        if ($this->queryContainer->queryMethods()->count() > 0) {
            $this->warning('Dummy Shipment data is already installed. Skipping.');
            return;
        }

        $idCarrier = $this->createCarrier();
        $this->addShipmentMethodToCarrie($idCarrier);
    }

    /**
     * @return int
     */
    protected function createCarrier()
    {
        $shipmentCarrierTransfer = new ShipmentCarrierTransfer();
        $shipmentCarrierTransfer->setName(self::NAME_CARRIER);
        $shipmentCarrierTransfer->setGlossaryKeyName(self::NAME_GLOSSARY_KEY_CARRIER);
        $shipmentCarrierTransfer->setIsActive(true);

        return $this->carrier->create($shipmentCarrierTransfer);
    }

    /**
     * @param $idCarrier
     */
    protected function addShipmentMethodToCarrie($idCarrier)
    {
        $shipmentMethodTransfer = new ShipmentMethodTransfer();
        $shipmentMethodTransfer->setFkShipmentCarrier($idCarrier);
        $shipmentMethodTransfer->setName(self::NAME_SHIPMENT_METHOD);
        $shipmentMethodTransfer->setGlossaryKeyName(self::NAME_GLOSSARY_KEY_SHIPMENT_METHOD);
        $shipmentMethodTransfer->setGlossaryKeyDescription(self::DESCRIPTION_GLOSSARY_KEY_SHIPMENT_METHOD);
        $shipmentMethodTransfer->setPrice(self::PRICE_SHIPMENT_METHOD);
        $shipmentMethodTransfer->setIsActive(true);

        $this->method->create($shipmentMethodTransfer);
    }
}
