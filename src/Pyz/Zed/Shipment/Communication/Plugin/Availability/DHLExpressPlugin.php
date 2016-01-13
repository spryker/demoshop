<?php

namespace Pyz\Zed\Shipment\Communication\Plugin\Availability;

use Generated\Shared\Transfer\ShipmentMethodAvailabilityTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\Shipment\Communication\Plugin\ShipmentMethodAvailabilityPluginInterface;

class DHLExpressPlugin extends AbstractPlugin implements ShipmentMethodAvailabilityPluginInterface
{

    /**
     * @param ShipmentMethodAvailabilityTransfer $shipmentMethodAvailability
     *
     * @return bool
     */
    public function isAvailable(ShipmentMethodAvailabilityTransfer $shipmentMethodAvailability)
    {
        return true;
    }

}
