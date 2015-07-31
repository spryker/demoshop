<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Shipment\Communication\Plugin\PriceCalculation;

use Generated\Shared\Cart\CartInterface;
use SprykerEngine\Zed\Kernel\Communication\AbstractPlugin;
use SprykerFeature\Zed\Shipment\Communication\Plugin\ShipmentMethodPriceCalculationPluginInterface;

class DHLExpressPlugin extends AbstractPlugin implements ShipmentMethodPriceCalculationPluginInterface
{

    const DHL_EXPRESS_ITEM_PRICE = 4;
    /**
     * @param CartInterface $cartTransfer
     *
     * @return int
     */
    public function getPrice(CartInterface $cartTransfer)
    {
        $count = 0;
        foreach ($cartTransfer->getItems() as $item) {
            $count += $item->getQuantity();
        }
        return self::DHL_EXPRESS_ITEM_PRICE * $count;
    }
}
