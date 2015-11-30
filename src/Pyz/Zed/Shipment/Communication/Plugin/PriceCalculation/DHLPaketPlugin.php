<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Shipment\Communication\Plugin\PriceCalculation;

use Generated\Shared\Transfer\ShipmentMethodAvailabilityTransfer;
use SprykerEngine\Zed\Kernel\Communication\AbstractPlugin;
use SprykerFeature\Zed\Shipment\Communication\Plugin\ShipmentMethodPriceCalculationPluginInterface;

class DHLPaketPlugin extends AbstractPlugin implements ShipmentMethodPriceCalculationPluginInterface
{

    const DHL_PAKET_FIX_PRICE = 99;

    /**
     * @param ShipmentMethodAvailabilityTransfer $shipmentMethodAvailability
     *
     * @return int
     */
    public function getPrice(ShipmentMethodAvailabilityTransfer $shipmentMethodAvailability)
    {
        return self::DHL_PAKET_FIX_PRICE;
    }

}
