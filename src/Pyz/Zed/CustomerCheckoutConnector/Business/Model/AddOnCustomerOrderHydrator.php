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
        $shippingAddress = $request->getShippingAddress();

        if (null == $billingAddress->getEmail()) {
            $billingAddress->setEmail($request->getEmail());
        }
        if (null == $shippingAddress->getEmail()) {
            $shippingAddress->setEmail($request->getEmail());
        }
        if (null == $orderTransfer->getEmail()) {
            $orderTransfer->setEmail($request->getEmail());
        }
        if (null == $orderTransfer->getFirstName()) {
            $orderTransfer->setFirstName($request->getBillingAddress()->getFirstName());
        }
        if (null == $orderTransfer->getLastName()) {
            $orderTransfer->setLastName($request->getBillingAddress()->getLastName());
        }
        if (null == $orderTransfer->getSalutation()) {
            $orderTransfer->setSalutation($request->getBillingAddress()->getSalutation());
        }
    }
}
