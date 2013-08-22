<?php

/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
abstract class Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_Tracking_Abstract extends ProjectA_Zed_Library_StateMachine_Transition_Guard_Rule implements
     Sao_Zed_Sales_Component_Interface_OrderprocessConstant,
     ProjectA_Zed_Sales_Component_Dependency_Facade_Interface,
     Sao_Zed_Fulfillment_Component_Dependency_Facade_Interface,
     Sao_Zed_Fulfillment_Component_Model_Sba_Constants
{
    use ProjectA_Zed_Sales_Component_Dependency_Facade_Trait;
    use Sao_Zed_Fulfillment_Component_Dependency_Facade_Trait;

    /**
     * ['provider'] => [validCodes]
     * @var array
     */
    protected $validStatusHistoryCodes = [
        Sao_Zed_Fulfillment_Component_Model_Sba_Api::PROVIDER_NAME => [
        ],
        Sao_Zed_Fulfillment_Component_Model_Jondo_Api::PROVIDER_NAME => [
        ],
    ];

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItem
     * @param ProjectA_Zed_Library_StateMachine_Context $context
     * @return bool
     */
    protected function check($orderItem, ProjectA_Zed_Library_StateMachine_Context $context)
    {
        $quote = $this->facadeFulfillment->getQuoteByOrderItem($orderItem);
        $providerStatusHistoryCodes = $this->validStatusHistoryCodes[$quote->getProvider()->getShortName()];
        return
            $this->facadeFulfillment->hasReceivedInfoByStatusHistoryCodes(
                $quote,
                $providerStatusHistoryCodes
            );
    }
}
