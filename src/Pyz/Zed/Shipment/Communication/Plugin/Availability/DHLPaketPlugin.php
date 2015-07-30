<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Shipment\Communication\Plugin\Availability;

use Generated\Shared\Transfer\OrderTransfer;
use SprykerEngine\Zed\Kernel\Communication\AbstractPlugin;
use SprykerFeature\Zed\Shipment\Communication\Plugin\ShipmentMethodAvailabilityPluginInterface;

class DHLPaketPlugin extends AbstractPlugin implements ShipmentMethodAvailabilityPluginInterface
{
    /**
     * @param OrderTransfer $orderTransfer
     *
     * @return bool
     */
    public function isAvailable(OrderTransfer $orderTransfer)
    {
        return false;
    }
}
