<?php

namespace Pyz\Zed\Sales;

use Generated\Shared\Transfer\SalesOrderTransfer;
use SprykerFeature\Zed\Sales\SalesConfig as SprykerFeatureSalesConfig;
use Pyz\Zed\Sales\Business\ConstantsInterface\Orderprocess;
use Generated\Shared\Transfer\SalesOrderItemTransfer;
use SprykerFeature\Zed\Payone\Business\Model\Api\ApiConstants as PayoneApiConstants;

class SalesConfig extends SprykerFeatureSalesConfig
{
    /**
     * @throws \Exception
     * @return \SprykerFeature_Zed_Sales_Business_Interface_StatemachineFactoryHook
     */
    public function getStateMachineFactoryHook()
    {
        return $this->factory->createModelOrderprocessStatemachineFactoryHook();
    }

    /**
     * @throws \Exception
     * @return \SprykerFeature_Zed_Library_StateMachine_Definition_Container
     */
    public function getStatemachineDefinitionContainer()
    {
        return $this->factory->createModelOrderprocessDefinitionContainer();
    }

    /**
     * @param OrderItem $transferOrderItem
     * @param Order $transferOrder
     * @return string
     * @throws \RuntimeException
     */
    public function getProcessNameForNewOrderItem(OrderItem $transferOrderItem, Order $transferOrder)
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
