<?php

namespace Pyz\Zed\Sales\Component\Model\Orderprocess\Guard\Rule;

use Pyz\Shared\Payone\Code\ProcessConstants as PaymentConstants;
use Pyz\Zed\Sales\Component\ConstantsInterface\Orderprocess;

class SomethingExists extends \ProjectA_Zed_Library_StateMachine_Transition_Guard_Rule implements
      Orderprocess
{
    /**
     *
     * @see \ProjectA_Zed_Library_DataStructure_Named_Interface::getName()
     */
    public function getName()
    {
        return self::RULE_SOMETHING_EXISTS;
    }

    /**
     * @param \ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItem
     * @param \ProjectA_Zed_Library_StateMachine_Context $context
     * @return bool
     * @see \ProjectA_Zed_Library_StateMachine_Transition_Guard_Rule::check()
     */
    protected function check($orderItem, \ProjectA_Zed_Library_StateMachine_Context $context)
    {
        return true;
    }
}
