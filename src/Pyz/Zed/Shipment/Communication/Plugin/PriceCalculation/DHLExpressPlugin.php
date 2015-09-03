<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Shipment\Communication\Plugin\PriceCalculation;

use Generated\Shared\Shipment\ShipmentMethodAvailabilityInterface;
use SprykerEngine\Zed\Kernel\Communication\AbstractPlugin;
use SprykerFeature\Zed\Shipment\Communication\Plugin\ShipmentMethodPriceCalculationPluginInterface;

class DHLExpressPlugin extends AbstractPlugin implements ShipmentMethodPriceCalculationPluginInterface
{

    const DHL_EXPRESS_ITEM_PRICE = 4;

    /**
     * @param ShipmentMethodAvailabilityInterface $shipmentMethodAvailability
     *
     * @return int
     */
    public function getPrice(ShipmentMethodAvailabilityInterface $shipmentMethodAvailability)
    {
        $count = 0;
        foreach ($shipmentMethodAvailability->getCart()->getItems() as $item) {
            $count += $item->getQuantity();
        }

        return self::DHL_EXPRESS_ITEM_PRICE * $count;
    }

}
