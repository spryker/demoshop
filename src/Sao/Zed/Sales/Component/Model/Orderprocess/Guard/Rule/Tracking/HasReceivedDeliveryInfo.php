<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_Tracking_HasReceivedDeliveryInfo extends Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_Tracking_Abstract
{
    /**
     * ['provider'] => [validCodes]
     * @var array
     */
    protected $validStatusHistoryCodes = [
        Sao_Zed_Fulfillment_Component_Model_Sba_Api::PROVIDER_NAME => [
            self::TRACKING_STATUS_PROOF_OF_DELIVERY,
        ],
    ];

    /**
     * @see ProjectA_Zed_Library_DataStructure_Named_Interface::getName()
     * @return string
     */
    public function getName()
    {
        return self::RULE_HAS_RECEIVED_DELIVERY_INFO;
    }
}
