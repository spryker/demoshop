<?php

class Sao_Zed_Checkout_Component_Model_Rules_SubtotalWithoutItemExpenses extends Sao_Zed_Checkout_Component_Model_Rules_Abstract
{

    const MAX_SUBTOTAL_WITHOUT_ITEM_EXPENSES = 2500000;

    /**
     * @return bool
     */
    public function match()
    {
        parent::match();
        return $this->order->getTotals()->getSubtotalWithoutItemExpenses() <= self::MAX_SUBTOTAL_WITHOUT_ITEM_EXPENSES;
    }

    /**
     * @return bool
     */
    public function executeAction()
    {
        return false;
    }

}
