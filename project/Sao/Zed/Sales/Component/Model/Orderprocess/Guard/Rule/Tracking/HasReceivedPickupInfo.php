<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @version $Id$
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_Tracking_HasReceivedPickupInfo extends Sao_Zed_Sales_Component_Model_Orderprocess_Guard_Rule_Tracking_Abstract
{
    /**
     * ['provider'] => [validCodes]
     * @var array
     */
    protected $validStatusHistoryCodes = [
        Sao_Zed_Fulfillment_Component_Model_Sba_Api::PROVIDER_NAME => [
            self::TRACKING_STATUS_PICKED_UP_AND_ON_HAND,
            self::TRACKING_STATUS_PICKED_UP_AND_IN_TRANSIT,
            self::TRACKING_STATUS_CONFIRMED_AND_ON_BOARD,
            self::TRACKING_STATUS_OUT_FOR_DELIVERY
        ],
    ];

    /**
     * @see ProjectA_Zed_Library_DataStructure_Named_Interface::getName()
     * @return string
     */
    public function getName()
    {
        return self::RULE_HAS_RECEIVED_PICKUP_INFO;
    }
}
