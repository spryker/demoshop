<?php

namespace Pyz\Zed\CustomerCheckoutConnector\Business\Model;

use Generated\Shared\CustomerCheckoutConnector\CheckoutRequestInterface;
use Generated\Shared\Transfer\OrderTransfer;

class AddOnCustomerOrderHydrator implements AddOnCustomerOrderHydratorInterface
{
    /**
     * [bugfix] save email in billing address entity
     *
     * @param OrderTransfer $orderTransfer
     * @param CheckoutRequestInterface $request
     */
    public function hydrateOrderTransfer(OrderTransfer $orderTransfer, CheckoutRequestInterface $request)
    {
        $billingAddress = $request->getBillingAddress();
        $billingAddress->setEmail($request->getEmail());
        $request->setBillingAddress($billingAddress);

        $orderTransfer->setEmail($request->getEmail());
        $orderTransfer->setFirstName($request->getBillingAddress()->getFirstName());
        $orderTransfer->setLastName($request->getBillingAddress()->getLastName());
        $orderTransfer->setSalutation($request->getBillingAddress()->getSalutation());
    }
}
