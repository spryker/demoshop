<?php

class Sao_Zed_Checkout_Component_Model_Rules_GrandTotal extends Sao_Zed_Checkout_Component_Model_Rules_Abstract
{

    const MAX_GRAND_TOTAL = 2500000;

    /**
     * @return bool
     */
    public function match()
    {
        parent::match();
        return $this->order->getTotals()->getGrandTotal() <= self::MAX_GRAND_TOTAL;
    }

    /**
     * @return bool
     */
    public function executeAction()
    {
        return false;
    }

}
