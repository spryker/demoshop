<?php

namespace Pyz\Zed\Sales;

use Generated\Shared\Transfer\OrderTransfer;
use SprykerFeature\Zed\Sales\SalesConfig as SprykerFeatureSalesConfig;
use Pyz\Zed\Sales\Business\ConstantsInterface\Orderprocess;
use Generated\Shared\Transfer\OrderItemTransfer;
use SprykerFeature\Zed\Payone\Business\Model\Api\ApiConstants as PayoneApiConstants;

class SalesConfig extends SprykerFeatureSalesConfig
{

    /**
     * @return mixed
     */
    public function getStateMachineFactoryHook()
    {
        return $this->factory->createModelOrderprocessStatemachineFactoryHook();
    }

    /**
     * @return mixed
     */
    public function getStatemachineDefinitionContainer()
    {
        return $this->factory->createModelOrderprocessDefinitionContainer();
    }

    /**
     * @param OrderItemTransfer $transferOrderItem
     * @param OrderTransfer $transferOrder
     *
     * @return string
     */
    public function getProcessNameForNewOrderItem(OrderItemTransfer $transferOrderItem, OrderTransfer $transferOrder)
    {
        $method = $transferOrder->getPayment()->getMethod();
        switch ($method) {
            case PayoneApiConstants::PAYMENT_METHOD_CREDITCARD:
            case PayoneApiConstants::PAYMENT_METHOD_CREDITCARD_PSEUDO:
                return Orderprocess::ORDER_PROCESS_PAYONE_CREDIT_CARD_PSEUDO_01;
                break;
            case PayoneApiConstants::PAYMENT_METHOD_PAYPAL:
                return Orderprocess::ORDER_PROCESS_PAYONE_PAYPAL_01;
                break;
            case PayoneApiConstants::PAYMENT_METHOD_DIRECT_DEBIT:
                return Orderprocess::ORDER_PROCESS_PAYONE_DIRECT_DEBIT_01;
                break;
            case PayoneApiConstants::PAYMENT_METHOD_PREPAYMENT:
                return Orderprocess::ORDER_PROCESS_PAYONE_PRE_PAYMENT_01;
                break;
            case PayoneApiConstants::PAYMENT_METHOD_INVOICE:
                return Orderprocess::ORDER_PROCESS_PAYONE_INVOICE_01;
                break;
            case PayoneApiConstants::PAYMENT_METHOD_SOFORT_UEBERWEISUNG:
                return Orderprocess::ORDER_PROCESS_PAYONE_SOFORT_UEBERWEISUNG_01;
                break;
            default:
                throw new \RuntimeException('Could not find any statemachine process for new order');
        }
    }

}
