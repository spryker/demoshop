<?php

namespace Pyz\Zed\Shipment\Communication\Plugin\DeliveryTime;

use Generated\Shared\Transfer\ShipmentMethodAvailabilityTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\Shipment\Communication\Plugin\ShipmentMethodDeliveryTimePluginInterface;
use Pyz\Zed\Shipment\Business\ShipmentFacade;

/**
 * @method \Pyz\Zed\Shipment\Business\ShipmentFacade getFacade()
 */
class DHLExpressPlugin extends AbstractPlugin implements ShipmentMethodDeliveryTimePluginInterface
{

    const HALF_DAY_IN_SECONDS = 43200;

    /**
     * @param \Generated\Shared\Transfer\ShipmentMethodAvailabilityTransfer $shipmentMethodAvailability
     *
     * @return int
     */
    public function getTime(ShipmentMethodAvailabilityTransfer $shipmentMethodAvailability)
    {
        $count = 0;
        foreach ($shipmentMethodAvailability->getCart()->getItems() as $item) {
            $count += $item->getQuantity();
        }

        return ($count < 4) ? self::HALF_DAY_IN_SECONDS : self::HALF_DAY_IN_SECONDS * 2;
    }

}
