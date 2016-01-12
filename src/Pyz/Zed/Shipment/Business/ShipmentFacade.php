<?php

namespace Pyz\Zed\Shipment\Business;

use Spryker\Zed\Messenger\Business\Model\MessengerInterface;
use Spryker\Zed\Shipment\Business\ShipmentFacade as SprykerShipmentFacade;

/**
 * @method ShipmentBusinessFactory getFactory()
 */
class ShipmentFacade extends SprykerShipmentFacade
{

    /**
     * @param MessengerInterface $messenger
     */
    public function installDemoData(MessengerInterface $messenger)
    {
        $this->getFactory()->createDemoDataInstaller($messenger)->install();
    }

}
