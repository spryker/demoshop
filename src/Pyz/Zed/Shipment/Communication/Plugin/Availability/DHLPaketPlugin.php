<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Shipment\Communication\Plugin\Availability;

use Generated\Shared\Shipment\ShipmentMethodAvailabilityInterface;
use SprykerEngine\Zed\Kernel\Communication\AbstractPlugin;
use SprykerFeature\Zed\Shipment\Communication\Plugin\ShipmentMethodAvailabilityPluginInterface;

class DHLPaketPlugin extends AbstractPlugin implements ShipmentMethodAvailabilityPluginInterface
{

    /**
     * @param ShipmentMethodAvailabilityInterface $shipmentMethodAvailability
     *
     * @return bool
     */
    public function isAvailable(ShipmentMethodAvailabilityInterface $shipmentMethodAvailability)
    {
        return true;
    }

}
