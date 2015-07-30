<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Shipment\Communication\Plugin\PriceCalculation;

use Generated\Shared\Transfer\OrderTransfer;
use SprykerEngine\Zed\Kernel\Communication\AbstractPlugin;
use SprykerFeature\Zed\Shipment\Communication\Plugin\ShipmentMethodPriceCalculationPluginInterface;

class DHLPaketPlugin extends AbstractPlugin implements ShipmentMethodPriceCalculationPluginInterface
{
    /**
     * @param OrderTransfer $orderTransfer
     *
     * @return int
     */
    public function getPrice(OrderTransfer $orderTransfer)
    {
        return 5;
    }
}
