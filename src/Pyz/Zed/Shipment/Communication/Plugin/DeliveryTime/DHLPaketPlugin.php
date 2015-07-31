<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Shipment\Communication\Plugin\DeliveryTime;

use Generated\Shared\Cart\CartInterface;
use SprykerEngine\Zed\Kernel\Communication\AbstractPlugin;
use SprykerFeature\Zed\Shipment\Communication\Plugin\ShipmentMethodDeliveryTimePluginInterface;

class DHLPaketPlugin extends AbstractPlugin implements ShipmentMethodDeliveryTimePluginInterface
{

    const DAY_IN_SECONDS = 86400;

    /**
     * @param CartInterface $cartTransfer
     *
     * @return int
     */
    public function getTime(CartInterface $cartTransfer)
    {
        $time = self::DAY_IN_SECONDS * ((date('H') < 11) ? 2 : 3);

        return $time;
    }
}
