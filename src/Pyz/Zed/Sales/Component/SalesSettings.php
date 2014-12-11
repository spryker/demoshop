<?php

namespace Pyz\Zed\Sales\Component;

use Generated\Shared\Sales\Transfer\Order;
use ProjectA\Zed\Sales\Component\SalesSettings as ProjectASalesSettings;
use Pyz\Zed\Sales\Component\ConstantsInterface\Orderprocess;
use ProjectA\Zed\Payone\Component\Model\Api\ApiConstants as PayoneApiConstants;
use Generated\Shared\Sales\Transfer\OrderItem;

/**
 * @property \Generated\Zed\Sales\Component\SalesFactory $factory
 */
class SalesSettings extends ProjectASalesSettings
{
    /**
     * @throws \ProjectA_Zed_Library_Exception
     * @return \ProjectA_Zed_Sales_Component_Interface_StatemachineFactoryHook
     */
    public function getStateMachineFactoryHook()
    {
        return $this->factory->createModelOrderprocessStatemachineFactoryHook();
    }

    /**
     * @throws \ProjectA_Zed_Library_Exception
     * @return \ProjectA_Zed_Library_StateMachine_Definition_Container
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
