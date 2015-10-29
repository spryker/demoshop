<?php

namespace Pyz\Zed\SalesCheckoutConnector\Business\Model;

use Generated\Shared\Transfer\CheckoutResponseTransfer;
use Generated\Shared\Transfer\OrderTransfer;
use Pyz\Zed\SalesCheckoutConnector\Dependency\Facade\SalesCheckoutConnectorToSalesInterface;

class AddOnLinkCustomerToOrder implements AddOnLinkCustomerToOrderInterface
{
    /**
     * @var SalesCheckoutConnectorToSalesInterface
     */
    protected $salesFacade;

    /**
     * @param SalesCheckoutConnectorToSalesInterface $salesFacade
     */
    public function __construct(SalesCheckoutConnectorToSalesInterface $salesFacade)
    {
        $this->salesFacade = $salesFacade;
    }

    /**
     * @param OrderTransfer $orderTransfer
     * @param CheckoutResponseTransfer $checkoutResponse
     */
    public function saveOrderCustomerLink(OrderTransfer $orderTransfer, CheckoutResponseTransfer $checkoutResponse)
    {
        if (!null == $orderTransfer->getIdSalesOrder()) {
            $orderEntity = $this->salesFacade->getSalesOrderById($orderTransfer->getIdSalesOrder());
            if (!null == $orderEntity) {
                $orderEntity->setFkCustomer($orderTransfer->getCustomer()->getIdCustomer());
            }
        }
    }

}
