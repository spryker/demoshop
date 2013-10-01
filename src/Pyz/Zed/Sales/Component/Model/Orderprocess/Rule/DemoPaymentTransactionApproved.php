<?php

class Pyz_Zed_Sales_Component_Model_Orderprocess_Rule_DemoPaymentTransactionApproved
    extends ProjectA_Zed_Library_StateMachine_Transition_Guard_Rule//ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Guard_Rule
        implements ProjectA_Zed_Payment_Component_Interface_Constants,
                   Pyz_Zed_Sales_Component_Interface_OrderprocessConstant
{

    /**
     * @see Pal_DataStructure_Named_Interface::getName()
     */
    public function getName()
    {
        return self::RULE_PAYMENT_TRANSACTION_APPROVED;
    }

    /**
     * @param object $orderItem
     * @param ProjectA_Zed_Library_StateMachine_Context $context
     * @return bool
     */
    protected function check($orderItem, ProjectA_Zed_Library_StateMachine_Context $context)
    {
        if ($context->offsetExists(self::PAYMENT_TRANSACTION_RESPONSE_KEY)) {
            /* @var $paymentResponse ProjectA_Zed_Payment_Component_Model_Response */
            $paymentResponse = $context[self::PAYMENT_TRANSACTION_RESPONSE_KEY];
            return $paymentResponse->isSuccess();
        } else {
            return false;
        }
    }

}