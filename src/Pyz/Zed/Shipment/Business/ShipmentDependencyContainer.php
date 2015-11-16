<?php

namespace Pyz\Zed\Shipment\Business;

use Pyz\Zed\Shipment\Business\Internal\DemoData\ShipmentInstall;
use SprykerEngine\Shared\Kernel\Messenger\MessengerInterface;
use SprykerFeature\Zed\Shipment\Business\ShipmentDependencyContainer as SprykerShipmentDependencyContainer;
use Pyz\Zed\Shipment\Persistence\ShipmentQueryContainer;

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
        $installer = $this->getFactory()->createInternalDemoDataShipmentInstall(
            $this->getQueryContainer(),
            $this->createCarrier(),
            $this->createMethod()
        );
        $installer->setMessenger($messenger);

        return $installer;
    }

    /**
     * @return Model\ShipmentMethodManager
     */
    public function createShipmentMethodManager()
    {
        return $this->getFactory()
            ->createModelShipmentMethodManager(
                $this->getQueryContainer()
            );
    }
}
