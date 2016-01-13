<?php

namespace Pyz\Zed\Shipment\Communication\Plugin\PriceCalculation;

use Generated\Shared\Transfer\ShipmentMethodAvailabilityTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\Shipment\Communication\Plugin\ShipmentMethodPriceCalculationPluginInterface;

class DHLExpressPlugin extends AbstractPlugin implements ShipmentMethodPriceCalculationPluginInterface
{

    const DHL_EXPRESS_ITEM_PRICE = 4;

    /**
     * @param ShipmentMethodAvailabilityTransfer $shipmentMethodAvailability
     *
     * @return int
     */
    public function getPrice(ShipmentMethodAvailabilityTransfer $shipmentMethodAvailability)
    {
        $count = 0;
        foreach ($shipmentMethodAvailability->getCart()->getItems() as $item) {
            $count += $item->getQuantity();
        }

        return self::DHL_EXPRESS_ITEM_PRICE * $count;
    }

}
