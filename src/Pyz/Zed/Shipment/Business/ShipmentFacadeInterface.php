<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Shipment\Business;

use Spryker\Zed\Messenger\Business\Model\MessengerInterface;
use \Spryker\Zed\Shipment\Business\ShipmentFacadeInterface as SprykerShipmentFacadeInterface;

interface ShipmentFacadeInterface extends SprykerShipmentFacadeInterface
{

    /**
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger
     *
     * @return void
     */
    public function installDemoData(MessengerInterface $messenger);

}
