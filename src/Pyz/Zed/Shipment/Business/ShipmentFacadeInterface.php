<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Shipment\Business;

use Spryker\Zed\Messenger\Business\Model\MessengerInterface;

interface ShipmentFacadeInterface
{

    /**
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger
     */
    public function installDemoData(MessengerInterface $messenger);

}
