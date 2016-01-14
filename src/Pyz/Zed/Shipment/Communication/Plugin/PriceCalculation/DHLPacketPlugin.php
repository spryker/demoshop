<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Shipment\Communication\Plugin\PriceCalculation;

use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\Shipment\Communication\Plugin\ShipmentMethodPricePluginInterface;

class DHLPacketPlugin extends AbstractPlugin implements ShipmentMethodPricePluginInterface
{

    const DHL_PACKET_FIX_PRICE = 99;

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return int
     */
    public function getPrice(QuoteTransfer $quoteTransfer)
    {
        return self::DHL_PACKET_FIX_PRICE;
    }

}
