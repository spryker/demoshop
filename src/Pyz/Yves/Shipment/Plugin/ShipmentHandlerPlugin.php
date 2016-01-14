<?php

namespace Pyz\Yves\Shipment\Plugin;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Checkout\Dependency\Plugin\CheckoutStepHandlerInterface;
use Pyz\Yves\Shipment\ShipmentFactory;
use Spryker\Yves\Kernel\AbstractPlugin;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method ShipmentFactory getFactory()
 */
class ShipmentHandlerPlugin extends AbstractPlugin implements CheckoutStepHandlerInterface
{

    /**
     * @param Request $request
     * @param QuoteTransfer $quoteTransfer
     *
     * @return QuoteTransfer
     */
    public function addToQuote(Request $request, QuoteTransfer $quoteTransfer)
    {
        $this->getFactory()->createShipmentHandler()->addShipmentToQuote($request, $quoteTransfer);
    }

}
