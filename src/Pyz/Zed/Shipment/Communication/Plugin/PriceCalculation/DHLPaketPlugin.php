<?php

namespace Pyz\Zed\Shipment\Communication\Plugin\PriceCalculation;

use Generated\Shared\Transfer\ShipmentMethodAvailabilityTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\Shipment\Communication\Plugin\ShipmentMethodPriceCalculationPluginInterface;
use Pyz\Zed\Shipment\Business\ShipmentFacade;

/**
 * @method \Pyz\Zed\Shipment\Business\ShipmentFacade getFacade()
 */
class DHLPaketPlugin extends AbstractPlugin implements ShipmentMethodPriceCalculationPluginInterface
{

    const DHL_PAKET_FIX_PRICE = 99;

    /**
     * @param \Generated\Shared\Transfer\ShipmentMethodAvailabilityTransfer $shipmentMethodAvailability
     *
     * @return int
     */
    public function getPrice(ShipmentMethodAvailabilityTransfer $shipmentMethodAvailability)
    {
        return self::DHL_PAKET_FIX_PRICE;
    }

}
