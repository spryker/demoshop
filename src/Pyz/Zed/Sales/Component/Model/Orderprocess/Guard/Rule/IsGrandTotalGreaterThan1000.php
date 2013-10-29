<?php

namespace Pyz\Zed\Sales\Component\Model\Orderprocess\Guard\Rule;

use Pyz\Zed\Sales\Component\ConstantsInterface\Orderprocess;

class IsGrandTotalGreaterThan1000 extends \ProjectA_Zed_Library_StateMachine_Transition_Guard_Rule
{

    const ORDER_GRAND_TOTAL_1000 = 100000;

    /**
     *
     * @see \ProjectA_Zed_Library_DataStructure_Named_Interface::getName()
     */
    public function getName()
    {
        return Orderprocess::RULE_DEMO_ORDER_GRAND_TOTAL_GREATER_THAN_1000;
    }

    /**
     * @param \ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItem
     * @param \ProjectA_Zed_Library_StateMachine_Context $context
     * @return bool
     * @see \ProjectA_Zed_Library_StateMachine_Transition_Guard_Rule::check()
     */
    protected function check($orderItem, \ProjectA_Zed_Library_StateMachine_Context $context)
    {
        return $orderItem->getOrder()->getGrandTotal() > self::ORDER_GRAND_TOTAL_1000;
    }
}
