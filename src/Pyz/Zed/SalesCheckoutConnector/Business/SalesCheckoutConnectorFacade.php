<?php

namespace Pyz\Zed\SalesCheckoutConnector\Business;

use Generated\Shared\Transfer\CheckoutResponseTransfer;
use Generated\Shared\Transfer\OrderTransfer;
use PavFeature\Zed\SalesCheckoutConnector\Business\SalesCheckoutConnectorFacade as PavFeatureSalesCheckoutConnectorFacade;

/**
 * @method SalesCheckoutConnectorDependencyContainer getDependencyContainer()
 */
class SalesCheckoutConnectorFacade extends PavFeatureSalesCheckoutConnectorFacade
{
    /**
     * @param OrderTransfer $order
     * @param CheckoutResponseTransfer $request
     */
    public function saveOrderCustomerLink(OrderTransfer $order, CheckoutResponseTransfer $request)
    {
        $this->getDependencyContainer()->createLinkCustomerToOrder()->saveOrderCustomerLink($order, $request);
    }

}
