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
     * @param OrderItem $transferOrderItem
     * @param Order $transferOrder
     * @return string
     * @throws RuntimeException
     */
    public function getProcessNameForNewOrderItem(OrderItem $transferOrderItem, Order $transferOrder)
    {
        $method = $transferOrder->getPayment()->getMethod();
        switch ($method) {
            case PayoneApiConstants::PAYMENT_METHOD_CREDITCARD:
            case PayoneApiConstants::PAYMENT_METHOD_CREDITCARD_PSEUDO:
                return Orderprocess::ORDER_PROCESS_PAYONE_CREDIT_CARD;
                break;
            case PayoneApiConstants::PAYMENT_METHOD_PAYPAL_EXPRESS:
                return Orderprocess::ORDER_PROCESS_PAYONE_PAYPAL;
                break;
            case PayoneApiConstants::PAYMENT_METHOD_DIRECT_DEBIT:
                return Orderprocess::ORDER_PROCESS_PAYONE_DIRECT_DEBIT;
                break;
            case PayoneApiConstants::PAYMENT_METHOD_PREPAYMENT:
                return Orderprocess::ORDER_PROCESS_PAYONE_PREPAYMENT;
                break;
            case PayoneApiConstants::PAYMENT_METHOD_INVOICE:
                return Orderprocess::ORDER_PROCESS_PAYONE_INVOICE;
                break;
            case PayoneApiConstants::PAYMENT_METHOD_SOFORT_UEBERWEISUNG:
                return Orderprocess::ORDER_PROCESS_PAYONE_SOFORT_UEBERWEISUNG;
                break;
            default:
                throw new \RuntimeException('Could not find any statemachine process for new order');
        }
    }
}
