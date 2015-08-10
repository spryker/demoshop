<?php

namespace Pyz\Zed\Shipment\Business;

use Pyz\Zed\Shipment\Business\ShipmentDependencyContainer;
use SprykerEngine\Shared\Kernel\Messenger\MessengerInterface;
use SprykerFeature\Zed\Shipment\Business\ShipmentFacade as SprykerShipmentFacade;

/**
 * @method ShipmentDependencyContainer getDependencyContainer()
 */
class ShipmentFacade extends SprykerShipmentFacade
{

    /**
     * @param MessengerInterface $messenger
     */
    public function installDemoData(MessengerInterface $messenger)
    {
        $this->getDependencyContainer()->createDemoDataInstaller($messenger)->install();
    }
}
