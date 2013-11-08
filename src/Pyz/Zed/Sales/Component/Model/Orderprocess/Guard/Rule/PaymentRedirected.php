<?php

namespace Pyz\Zed\Sales\Component\Model\Orderprocess\Guard\Rule;

use Pyz\Shared\Payone\Code\ProcessConstants as PaymentConstants;

class PaymentRedirected extends \ProjectA_Zed_Library_StateMachine_Transition_Guard_Rule implements
    \ProjectA_Zed_Payment_Component_Interface_Constants
{
    /**
     *
     * @see \ProjectA_Zed_Library_DataStructure_Named_Interface::getName()
     */
    public function getName()
    {
        return PaymentConstants::RULE_PAYMENT_REDIRECTED;
    }

    /**
     * @param \ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItem
     * @param \ProjectA_Zed_Library_StateMachine_Context $context
     * @return bool
     * @see \ProjectA_Zed_Library_StateMachine_Transition_Guard_Rule::check()
     */
    protected function check($orderItem, \ProjectA_Zed_Library_StateMachine_Context $context)
    {
        /** @var \ProjectA_Zed_Payment_Component_Model_Response $response */
        $response = $context[self::PAYMENT_TRANSACTION_RESPONSE_KEY];;
        return $response->isRedirect() === true;
    }
}
