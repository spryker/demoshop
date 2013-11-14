<?php
use Generated\Shared\Sales\Transfer\Order;
use Pyz\Zed\Sales\Component\ConstantsInterface\Orderprocess;
use ProjectA\Shared\Stripe\Code\PaymentProviderConstants as Stripe;
use Pyz\Shared\Payone\Code\PaymentProviderConstants as Payone;
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
            case Stripe::METHOD_CREDIT_CARD:
                return Orderprocess::ORDER_PROCESS_CREDIT_CARD_STRIPE;
                break;
            case Payone::METHOD_PAYPAL:
                return Orderprocess::ORDER_PROCESS_PAYPAL_PAYONE;
                break;
        }

        return Orderprocess::ORDER_PROCESS_DEMO;
    }

}
