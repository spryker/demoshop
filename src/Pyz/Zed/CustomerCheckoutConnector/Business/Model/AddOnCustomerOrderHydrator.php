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

        if ($billingAddress->getEmail() === null) {
            $billingAddress->setEmail($request->getEmail());
        }
        if ($shippingAddress->getEmail() === null) {
            $shippingAddress->setEmail($request->getEmail());
        }
        if ($orderTransfer->getEmail() === null) {
            $orderTransfer->setEmail($request->getEmail());
        }
        if ($orderTransfer->getFirstName() === null) {
            $orderTransfer->setFirstName($request->getBillingAddress()->getFirstName());
        }
        if ($orderTransfer->getLastName() === null) {
            $orderTransfer->setLastName($request->getBillingAddress()->getLastName());
        }
        if ($orderTransfer->getSalutation() === null) {
            $orderTransfer->setSalutation($request->getBillingAddress()->getSalutation());
        }
    }
}
