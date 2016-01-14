<?php

namespace Pyz\Zed\Shipment\Communication\Plugin\DeliveryTime;

use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\Shipment\Communication\Plugin\ShipmentMethodDeliveryTimePluginInterface;

class DHLPacketPlugin extends AbstractPlugin implements ShipmentMethodDeliveryTimePluginInterface
{

    const DAY_IN_SECONDS = 86400;

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return int
     */
    public function getTime(QuoteTransfer $quoteTransfer)
    {
        $time = self::DAY_IN_SECONDS * ((date('H') < 11) ? 2 : 3);

        return $time;
    }

}
