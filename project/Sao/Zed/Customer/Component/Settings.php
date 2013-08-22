<?php

/**
 * @author jstick
 */
class Sao_Zed_Customer_Component_Settings extends ProjectA_Zed_Customer_Component_Settings
{
    /**
     * @return array
     */
    public function getCustomerIncrementKeys()
    {
        return array('3', '6', '1', '4', '2', '9', '7', '5', '8');
    }

    /**
     * @return integer
     */
    public function getCustomerIncrementPrefix()
    {
        return '2';
    }

    /**
     * @return integer
     */
    public function getCustomerIncrementDigits()
    {
        return 12;
    }

}
