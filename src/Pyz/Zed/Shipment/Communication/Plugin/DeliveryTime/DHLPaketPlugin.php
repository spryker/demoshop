<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Shipment\Communication\Plugin\DeliveryTime;

use Generated\Shared\Transfer\OrderTransfer;
use SprykerEngine\Zed\Kernel\Communication\AbstractPlugin;
use SprykerFeature\Zed\Shipment\Communication\Plugin\ShipmentMethodDeliveryTimePluginInterface;

class DHLPaketPlugin extends AbstractPlugin implements ShipmentMethodDeliveryTimePluginInterface
{
    /**
     * @param OrderTransfer $orderTransfer
     *
     * @return int
     */
    public function getTime(OrderTransfer $orderTransfer)
    {
        return 10000000;
    }
}
