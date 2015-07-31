<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Shipment\Communication\Plugin\Availability;

use Generated\Shared\Cart\CartInterface;
use SprykerEngine\Zed\Kernel\Communication\AbstractPlugin;
use SprykerFeature\Zed\Shipment\Communication\Plugin\ShipmentMethodAvailabilityPluginInterface;

class KAMSaturdayPlugin extends AbstractPlugin implements ShipmentMethodAvailabilityPluginInterface
{
    const START = 'Thu 10:00';
    const STOP = 'Fri 10:00';
    const FORMAT = 'D H:i';
    /**
     * @param CartInterface $cartTransfer
     *
     * @return bool
     */
    public function isAvailable(CartInterface $cartTransfer)
    {
        $start = \DateTime::createFromFormat(self::FORMAT, self::START);
        $stop = \DateTime::createFromFormat(self::FORMAT, self::STOP);
        $now = new \DateTime();

        return ($start > $now && $now < $stop);
    }
}
