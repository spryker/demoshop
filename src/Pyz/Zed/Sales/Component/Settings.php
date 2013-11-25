<?php
use Generated\Shared\Sales\Transfer\Order;
use Pyz\Zed\Sales\Component\ConstantsInterface\Orderprocess;
use ProjectA\Zed\Payone\Component\Model\Api\ApiConstants as PayoneApiConstants;
use Generated\Shared\Sales\Transfer\OrderItem;


/**
 * @property \Generated\Zed\Sales\Component\SalesFactory $factory
 */
class Pyz_Zed_Sales_Component_Settings extends \ProjectA_Zed_Sales_Component_Settings
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
     * @param Order $transferOrder
     * @return string
     */
    public function getProcessNameForNewOrderItem(OrderItem $transferOrderItem, Order $transferOrder)
    {
        $method = $transferOrder->getPayment()->getMethod();
        switch ($method) {
            case PayoneApiConstants::PAYMENT_METHOD_CREDITCARD:
                return Orderprocess::ORDER_PROCESS_PAYONE_CREDIT_CARD;
                break;
            case PayoneApiConstants::PAYMENT_METHOD_PAYPAL_EXPRESS:
                return Orderprocess::ORDER_PROCESS_PAYONE_PAYPAL;
                break;
            case PayoneApiConstants::PAYMENT_METHOD_DIRECT_DEBIT:
                return Orderprocess::ORDER_PROCESS_DIRECT_DEBIT;
                break;
            case PayoneApiConstants::PAYMENT_METHOD_PREPAYMENT:
                return Orderprocess::ORDER_PROCESS_PREPAYMENT;
                break;
        }

        return Orderprocess::ORDER_PROCESS_DEMO;
    }

}
