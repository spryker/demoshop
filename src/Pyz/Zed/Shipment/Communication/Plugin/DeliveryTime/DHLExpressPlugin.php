<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Shipment\Communication\Plugin\DeliveryTime;

use Generated\Shared\Shipment\ShipmentMethodAvailabilityInterface;
use SprykerEngine\Zed\Kernel\Communication\AbstractPlugin;
use SprykerFeature\Zed\Shipment\Communication\Plugin\ShipmentMethodDeliveryTimePluginInterface;

class DHLExpressPlugin extends AbstractPlugin implements ShipmentMethodDeliveryTimePluginInterface
{

    const HALF_DAY_IN_SECONDS = 43200;

    /**
     * @param ShipmentMethodAvailabilityInterface $shipmentMethodAvailability
     *
     * @return int
     */
    public function getTime(ShipmentMethodAvailabilityInterface $shipmentMethodAvailability)
    {
        $count = 0;
        foreach ($shipmentMethodAvailability->getCart()->getItems() as $item) {
            $count += $item->getQuantity();
        }

        return ($count < 4) ? self::HALF_DAY_IN_SECONDS : self::HALF_DAY_IN_SECONDS * 2;
    }

}
