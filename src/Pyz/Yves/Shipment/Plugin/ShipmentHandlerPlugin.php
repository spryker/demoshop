<?php

namespace Pyz\Yves\Shipment\Plugin;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Checkout\Dependency\Plugin\CheckoutStepHandlerPluginInterface;
use Spryker\Yves\Kernel\AbstractPlugin;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Yves\Shipment\ShipmentFactory getFactory()
 */
class ShipmentHandlerPlugin extends AbstractPlugin implements CheckoutStepHandlerPluginInterface
{

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function addToQuote(Request $request, QuoteTransfer $quoteTransfer)
    {
        $this->getFactory()->createShipmentHandler()->addShipmentToQuote($request, $quoteTransfer);
    }

}
