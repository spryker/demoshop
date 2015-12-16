<?php

namespace Pyz\Zed\Shipment\Business;

use Spryker\Shared\Kernel\Messenger\MessengerInterface;
use Spryker\Zed\Shipment\Business\ShipmentFacade as SprykerShipmentFacade;

/**
 * @method ShipmentBusinessFactory getBusinessFactory()
 */
class ShipmentFacade extends SprykerShipmentFacade
{

    /**
     * @param MessengerInterface $messenger
     */
    public function installDemoData(MessengerInterface $messenger)
    {
        $this->getBusinessFactory()->createDemoDataInstaller($messenger)->install();
    }

}
