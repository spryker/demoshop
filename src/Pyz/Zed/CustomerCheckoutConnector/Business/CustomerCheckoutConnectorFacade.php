<?php

namespace Pyz\Zed\CustomerCheckoutConnector\Business;

use Generated\Shared\Transfer\CheckoutRequestTransfer;
use Generated\Shared\Transfer\CheckoutResponseTransfer;
use Generated\Shared\Transfer\OrderTransfer;

/**
 * @method CustomerCheckoutConnectorDependencyContainer getDependencyContainer()
 */
class CustomerCheckoutConnectorFacade extends \SprykerFeature\Zed\CustomerCheckoutConnector\Business\CustomerCheckoutConnectorFacade
{
    /**
     * @param OrderTransfer $order
     * @param CheckoutRequestTransfer $request
     */
    public function hydrateOrderTransferAddOn(OrderTransfer $order, CheckoutRequestTransfer $request)
    {
        $this->getDependencyContainer()->createAddOnCustomerOrderHydrator()->hydrateOrderTransfer($order, $request);
    }

    /**
     * @param CheckoutRequestTransfer $checkoutRequest
     * @param CheckoutResponseTransfer $checkoutResponse
     */
    public function checkPreconditions(CheckoutRequestTransfer $checkoutRequest, CheckoutResponseTransfer $checkoutResponse)
    {
        $this->getDependencyContainer()->createPreconditionChecker()->checkPreconditions($checkoutRequest, $checkoutResponse);
    }

}
