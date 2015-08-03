<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Shipment\Communication\Plugin\DeliveryTime;

use Generated\Shared\Cart\CartInterface;
use SprykerEngine\Zed\Kernel\Communication\AbstractPlugin;
use SprykerFeature\Zed\Shipment\Communication\Plugin\ShipmentMethodDeliveryTimePluginInterface;

class DHLExpressPlugin extends AbstractPlugin implements ShipmentMethodDeliveryTimePluginInterface
{
    const HALF_DAY_IN_SECONDS = 43200;

    /**
     * @param CartInterface $cartTransfer
     *
     * @return int
     */
    public function getTime(CartInterface $cartTransfer)
    {
        $count = 0;
        foreach ($cartTransfer->getItems() as $item) {
            $count += $item->getQuantity();
        }

        return ($count < 4) ? self::HALF_DAY_IN_SECONDS : self::HALF_DAY_IN_SECONDS * 2;
    }
}
