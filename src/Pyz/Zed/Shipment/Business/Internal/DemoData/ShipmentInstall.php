<?php

namespace Pyz\Zed\Shipment\Business\Internal\DemoData;

use Generated\Shared\Transfer\ShipmentCarrierTransfer;
use Generated\Shared\Transfer\ShipmentMethodTransfer;
use Spryker\Zed\Installer\Business\Model\AbstractInstaller;
use Spryker\Zed\Shipment\Business\Model\Carrier;
use Spryker\Zed\Shipment\Business\Model\Method;
use Spryker\Zed\Shipment\Persistence\ShipmentQueryContainerInterface;

class ShipmentInstall extends AbstractInstaller
{

    /**
     * @var \Spryker\Zed\Shipment\Persistence\ShipmentQueryContainerInterface
     */
    protected $queryContainer;

    /**
     * @var \Spryker\Zed\Shipment\Business\Model\Method
     */
    protected $method;

    /**
     * @var \Spryker\Zed\Shipment\Business\Model\Carrier
     */
    protected $carrier;

    /**
     * @param \Spryker\Zed\Shipment\Persistence\ShipmentQueryContainerInterface $queryContainer
     * @param \Spryker\Zed\Shipment\Business\Model\Carrier $carrier
     * @param \Spryker\Zed\Shipment\Business\Model\Method $method
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
        $shipmentCarrierTransfer->setName('Spryker Dummy Shipment');
        $shipmentCarrierTransfer->setIsActive(true);

        return $this->carrier->create($shipmentCarrierTransfer);
    }

    /**
     * @param int $idCarrier
     */
    protected function addShipmentMethodToCarrie($idCarrier)
    {
        $shipmentMethodTransfer = new ShipmentMethodTransfer();
        $shipmentMethodTransfer->setFkShipmentCarrier($idCarrier);
        $shipmentMethodTransfer->setName('Standard');
        $shipmentMethodTransfer->setDefaultPrice(490);
        $shipmentMethodTransfer->setIsActive(true);

        $this->method->create($shipmentMethodTransfer);

        $shipmentMethodTransfer = new ShipmentMethodTransfer();
        $shipmentMethodTransfer->setFkShipmentCarrier($idCarrier);
        $shipmentMethodTransfer->setName('Express');
        $shipmentMethodTransfer->setDefaultPrice(590);
        $shipmentMethodTransfer->setIsActive(true);

        $this->method->create($shipmentMethodTransfer);
    }

}
