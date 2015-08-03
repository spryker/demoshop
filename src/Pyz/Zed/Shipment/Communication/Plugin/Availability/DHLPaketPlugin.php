<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Shipment\Communication\Plugin\Availability;

use Generated\Shared\Cart\CartInterface;
use SprykerEngine\Zed\Kernel\Communication\AbstractPlugin;
use SprykerFeature\Zed\Shipment\Communication\Plugin\ShipmentMethodAvailabilityPluginInterface;

class DHLPaketPlugin extends AbstractPlugin implements ShipmentMethodAvailabilityPluginInterface
{
    /**
     * @param CartInterface $cartTransfer
     *
     * @return bool
     */
    public function isAvailable(CartInterface $cartTransfer)
    {
        return true;
    }
}
