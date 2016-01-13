<?php

namespace Pyz\Zed\Shipment\Communication\Plugin\DeliveryTime;

use Generated\Shared\Transfer\ShipmentMethodAvailabilityTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\Shipment\Communication\Plugin\ShipmentMethodDeliveryTimePluginInterface;

class DHLPaketPlugin extends AbstractPlugin implements ShipmentMethodDeliveryTimePluginInterface
{

    const DAY_IN_SECONDS = 86400;

    /**
     * @param ShipmentMethodAvailabilityTransfer $shipmentMethodAvailability
     *
     * @return int
     */
    public function getTime(ShipmentMethodAvailabilityTransfer $shipmentMethodAvailability)
    {
        $time = self::DAY_IN_SECONDS * ((date('H') < 11) ? 2 : 3);

        return $time;
    }

}
