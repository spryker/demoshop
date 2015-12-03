<?php

namespace Pyz\Zed\CustomerCheckoutConnector\Business;

use Generated\Shared\CustomerCheckoutConnector\OrderInterface;
use Generated\Shared\Transfer\CheckoutResponseTransfer;
use Generated\Shared\Transfer\CustomerResponseTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Pyz\Zed\CustomerCheckoutConnector\Dependency\Facade\CustomerCheckoutConnectorToCustomerInterface;
use SprykerFeature\Zed\CustomerCheckoutConnector\Business\CustomerOrderSaver as SprykerCustomerOrderSaver;

class CustomerOrderSaver extends SprykerCustomerOrderSaver
{

    /**
     * @var CustomerCheckoutConnectorToCustomerInterface
     */
    private $customerFacade;

    /**
     * @param CustomerCheckoutConnectorToCustomerInterface $customerFacade
     */
    public function __construct(CustomerCheckoutConnectorToCustomerInterface $customerFacade)
    {
        parent::__construct($customerFacade);
        $this->customerFacade = $customerFacade;
    }

    /**
     * @param OrderInterface $orderTransfer
     * @param CheckoutResponseTransfer $checkoutResponse
     */
    public function saveOrder(OrderInterface $orderTransfer, CheckoutResponseTransfer $checkoutResponse)
    {
        $customerTransfer = $orderTransfer->getCustomer();
        if ($customerTransfer->getIsGuest()) {
            return;
        }

        if (!is_null($customerTransfer->getIdCustomer())) {
            $this->customerFacade->updateCustomer($customerTransfer);
        } else {
            $customerTransfer->setFirstName($orderTransfer->getBillingAddress()->getFirstName());
            $customerTransfer->setLastName($orderTransfer->getBillingAddress()->getLastName());
            if (!$customerTransfer->getEmail()) {
                $customerTransfer->setEmail($orderTransfer->getBillingAddress()->getEmail());
            }

            if ($customerTransfer->getPassword() === null) {
                $customerResponseTransfer = $this->createOrUpdateGuest($customerTransfer);
            } else {
                $customerResponseTransfer = $this->customerFacade->registerCustomer($customerTransfer);
            }

            if (!$customerResponseTransfer->getIsSuccess()) {
                return;
            }

            $orderTransfer->setCustomer($customerResponseTransfer->getCustomerTransfer());
            $orderTransfer->setFkCustomer($customerResponseTransfer->getCustomerTransfer()->getIdCustomer());
        }

        $this->persistAddresses($customerTransfer);
    }

    /**
     * @param CustomerTransfer $customerTransfer
     *
     * @return CustomerResponseTransfer
     */
    protected function createOrUpdateGuest(CustomerTransfer $customerTransfer)
    {
        if ($this->customerFacade->hasEmail($customerTransfer->getEmail())) {
            $customerResponseTransfer = $this->customerFacade->updateGuest($customerTransfer);
        } else {
            $customerResponseTransfer = $this->customerFacade->createGuest($customerTransfer);
        }

        return $customerResponseTransfer;
    }

}
