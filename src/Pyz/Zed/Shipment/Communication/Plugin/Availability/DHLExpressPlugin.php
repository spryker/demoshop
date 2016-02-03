<?php

namespace Pyz\Zed\Shipment\Communication\Plugin\Availability;

use Generated\Shared\Transfer\ShipmentMethodAvailabilityTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\Shipment\Communication\Plugin\ShipmentMethodAvailabilityPluginInterface;
use Pyz\Zed\Shipment\Business\ShipmentFacade;

/**
 * @method \Pyz\Zed\Shipment\Business\ShipmentFacade getFacade()
 */
class DHLExpressPlugin extends AbstractPlugin implements ShipmentMethodAvailabilityPluginInterface
{

    /**
     * @param \Generated\Shared\Transfer\ShipmentMethodAvailabilityTransfer $shipmentMethodAvailability
     *
     * @return bool
     */
    public function isAvailable(ShipmentMethodAvailabilityTransfer $shipmentMethodAvailability)
    {
        return true;
    }

}
