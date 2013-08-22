<?php

class Sao_Zed_Checkout_Component_Model_Rules_AllowedShippingCountry extends Sao_Zed_Checkout_Component_Model_Rules_Abstract
{

    /**
     * @var array
     */
    protected $forbiddenCountries = array(
        'KP',   // North Korea
        'IQ',   // Iraq
        'IR',   // Iran
        'CU',   // Cuba
        'SY',   // Syria
    );

    /**
     * @return bool
     */
    public function match()
    {
        parent::match();
        $isoToCountry = $this->order->getShippingAddress()->getIso2Country();

        if (!in_array($isoToCountry, $this->forbiddenCountries)) {
            return true;
        }
        return false;
    }

    /**
     * @return bool
     */
    public function executeAction()
    {
        return false;
    }

}
