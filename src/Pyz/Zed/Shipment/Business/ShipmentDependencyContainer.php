<?php

namespace Pyz\Zed\Shipment\Business;

use Pyz\Zed\Shipment\ShipmentDependencyProvider;
use SprykerFeature\Zed\Shipment\Business\Model\Method;
use SprykerFeature\Zed\Shipment\Business\Model\Carrier;
use Pyz\Zed\Shipment\Business\Internal\DemoData\ShipmentInstall;
use SprykerEngine\Shared\Kernel\Messenger\MessengerInterface;
use SprykerFeature\Zed\Shipment\Business\ShipmentDependencyContainer as SprykerShipmentDependencyContainer;
use SprykerFeature\Zed\Shipment\Persistence\ShipmentQueryContainer;

/**
 * @method ShipmentQueryContainer getQueryContainer()
 */
class ShipmentDependencyContainer extends SprykerShipmentDependencyContainer
{

    /**
     * @param MessengerInterface $messenger
     *
     * @return ShipmentInstall
     */
    public function createDemoDataInstaller(MessengerInterface $messenger)
    {
        $installer = new ShipmentInstall(
            $this->getQueryContainer(),
            $this->createCarrier(),
            $this->createMethod()
        );
        $installer->setMessenger($messenger);

        return $installer;
    }

    /**
     * @return Carrier
     */
    public function createCarrier()
    {
        return new Carrier();
    }

    /**
     * @return Method
     */
    public function createMethod()
    {
        return new Method(
            $this->getQueryContainer(),
            $this->getProvidedDependency(ShipmentDependencyProvider::PLUGINS)
        );
    }

}
