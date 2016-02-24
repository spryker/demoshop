<?php

namespace Pyz\Zed\Sales;

use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\OrderTransfer;
use Pyz\Zed\Sales\Business\ConstantsInterface\Orderprocess;
use Spryker\Shared\Payone\PayoneApiConstants;
use Spryker\Zed\Sales\SalesConfig as SprykerSalesConfig;

class SalesConfig extends SprykerSalesConfig
{

    /**
     * @param \Generated\Shared\Transfer\ItemTransfer $transferItem
     * @param \Generated\Shared\Transfer\OrderTransfer $transferOrder
     *
     * @return string
     */
    public function getProcessNameForNewOrderItem(ItemTransfer $transferItem, OrderTransfer $transferOrder)
    {
        $method = $transferOrder->getPayment()->getMethod();
        switch ($method) {
            case PayoneApiConstants::PAYMENT_METHOD_CREDITCARD:
            case PayoneApiConstants::PAYMENT_METHOD_CREDITCARD_PSEUDO:
                return Orderprocess::ORDER_PROCESS_PAYONE_CREDIT_CARD_PSEUDO_01;
            case PayoneApiConstants::PAYMENT_METHOD_PAYPAL:
                return Orderprocess::ORDER_PROCESS_PAYONE_PAYPAL_01;
            case PayoneApiConstants::PAYMENT_METHOD_DIRECT_DEBIT:
                return Orderprocess::ORDER_PROCESS_PAYONE_DIRECT_DEBIT_01;
            case PayoneApiConstants::PAYMENT_METHOD_PREPAYMENT:
                return Orderprocess::ORDER_PROCESS_PAYONE_PRE_PAYMENT_01;
            case PayoneApiConstants::PAYMENT_METHOD_INVOICE:
                return Orderprocess::ORDER_PROCESS_PAYONE_INVOICE_01;
            case PayoneApiConstants::PAYMENT_METHOD_SOFORT_UEBERWEISUNG:
                return Orderprocess::ORDER_PROCESS_PAYONE_SOFORT_UEBERWEISUNG_01;
            default:
                throw new \RuntimeException('Could not find any statemachine process for new order');
        }
    }

}
