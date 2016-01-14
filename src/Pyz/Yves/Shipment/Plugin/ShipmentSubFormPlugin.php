<?php

namespace Pyz\Yves\Shipment\Plugin;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Checkout\Dependency\Plugin\CheckoutSubFormInterface;
use Pyz\Yves\Shipment\Form\ShipmentSubForm;
use Pyz\Yves\Shipment\ShipmentFactory;
use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method ShipmentFactory getFactory()
 */
class ShipmentSubFormPlugin extends AbstractPlugin implements CheckoutSubFormInterface
{

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return ShipmentSubForm
     */
    public function createSubFrom(QuoteTransfer $quoteTransfer)
    {
        return $this->getFactory()->createShipmentForm($quoteTransfer);
    }

}
