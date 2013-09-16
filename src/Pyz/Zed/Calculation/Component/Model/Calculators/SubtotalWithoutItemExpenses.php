<?php

class Pyz_Zed_Calculation_Component_Model_Calculators_SubtotalWithoutItemExpenses extends ProjectA_Zed_Calculation_Component_Model_Calculators_Subtotal
{

    /**
     * @param Pyz_Shared_Sales_Transfer_Order|ProjectA_Zed_Sales_Persistence_PacSalesOrder $order $order
     * @return int
     */
    public function getAmount($order)
    {
        $subtotal = 0;
        /* @var $item Pyz_Shared_Sales_Transfer_Order_Item|ProjectA_Zed_Sales_Persistence_PacSalesOrderItem */
        foreach ($order->getItems() as $item) {
             /**
             * ITEM GROSS PRICE
             */
            $subtotal += $item->getGrossPrice();

            /**
             * ITEM OPTIONS GROSS PRICE
             */
            /* @var ProjectA_Zed_Sales_Persistence_PacSalesOrderItemOption|Pyz_Shared_Sales_Transfer_Order_Item_Option $option */
            foreach ($item->getOptions() as $option) {
                $subtotal += $option->getGrossPrice();
            }
        }
        return $subtotal;
    }

    /**
     * @param int $amount
     * @param Pyz_Shared_Sales_Transfer_Order|ProjectA_Zed_Sales_Persistence_PacSalesOrder $order
     */
    public function setTotals($amount, $order)
    {
        $totals = $order->getTotals();
        $totals->setSubtotalWithoutItemExpenses($amount);
        $order->setTotals($totals);
    }

}
