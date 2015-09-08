<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Shipment\Communication\Plugin\PriceCalculation;

use Generated\Shared\Cart\CartInterface;
use Generated\Shared\Shipment\ShipmentMethodAvailabilityInterface;
use SprykerEngine\Zed\Kernel\Communication\AbstractPlugin;
use SprykerFeature\Zed\Shipment\Communication\Plugin\ShipmentMethodPriceCalculationPluginInterface;

class DHLPaketPlugin extends AbstractPlugin implements ShipmentMethodPriceCalculationPluginInterface
{

    const DHL_PAKET_FIX_PRICE = 99;

    /**
     * @param ShipmentMethodAvailabilityInterface $shipmentMethodAvailability
     *
     * @return int
     */
    public function getPrice(ShipmentMethodAvailabilityInterface $shipmentMethodAvailability)
    {
        return self::DHL_PAKET_FIX_PRICE;
    }

}
