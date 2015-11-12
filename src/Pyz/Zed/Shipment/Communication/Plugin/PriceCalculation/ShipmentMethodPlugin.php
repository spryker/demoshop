<?php

namespace Pyz\Zed\Shipment\Communication\Plugin\PriceCalculation;

use Generated\Shared\Shipment\ShipmentMethodAvailabilityInterface;
use SprykerEngine\Zed\Kernel\Communication\AbstractPlugin;
use SprykerFeature\Zed\Shipment\Communication\Plugin\ShipmentMethodPriceCalculationPluginInterface;

class ShipmentMethodPlugin extends AbstractPlugin implements ShipmentMethodPriceCalculationPluginInterface
{

    /**
     * @param ShipmentMethodAvailabilityInterface $shipmentMethodAvailability
     * @return int
     */
    public function getPrice(ShipmentMethodAvailabilityInterface $shipmentMethodAvailability)
    {


        return 10;
    }

}