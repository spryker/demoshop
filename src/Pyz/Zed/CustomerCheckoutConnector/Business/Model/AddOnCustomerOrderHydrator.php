<?php

namespace Pyz\Zed\CustomerCheckoutConnector\Business\Model;

use Generated\Shared\CustomerCheckoutConnector\CheckoutRequestInterface;
use Generated\Shared\CustomerCheckoutConnector\OrderInterface;
use Generated\Shared\Transfer\AddressTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use SprykerFeature\Zed\CustomerCheckoutConnector\Dependency\Facade\CustomerCheckoutConnectorToCustomerInterface;

class AddOnCustomerOrderHydrator implements AddOnCustomerOrderHydratorInterface
{
    /**
     * @param OrderInterface $orderTransfer
     * @param CheckoutRequestInterface $request
     */
    public function hydrateOrderTransfer(OrderInterface $orderTransfer, CheckoutRequestInterface $request)
    {
    }
}
