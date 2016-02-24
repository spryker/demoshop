<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Shipment\Business;

use \Spryker\Zed\Shipment\Business\ShipmentFacadeInterface as SprykerShipmentFacadeInterface;
use Spryker\Zed\Messenger\Business\Model\MessengerInterface;

interface ShipmentFacadeInterface extends SprykerShipmentFacadeInterface
{

    /**
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger
     *
     * @return void
     */
    public function installDemoData(MessengerInterface $messenger);

}
