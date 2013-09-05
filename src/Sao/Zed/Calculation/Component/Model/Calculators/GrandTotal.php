<?php

class Sao_Zed_Calculation_Component_Model_Calculators_GrandTotal extends ProjectA_Zed_Calculation_Component_Model_Calculators_GrandTotal
{

//    /**
//     * @param Sao_Shared_Sales_Transfer_Order|ProjectA_Zed_Sales_Persistence_PacSalesOrder $order
//     * @return mixed
//     */
//    public function getAmount($order)
//    {
//        $grandTotal = parent::getAmount($order);
//        return $grandTotal + $this->getStateTaxAmount($order);
//    }

//    /**
//     * @param Sao_Shared_Sales_Transfer_Order|ProjectA_Zed_Sales_Persistence_PacSalesOrder $order
//     * @return int
//     */
//    protected function getStateTaxAmount($order)
//    {
//        $stateTaxAmount = 0;
//
//        /* @var Sao_Shared_Sales_Transfer_Order_Item $item */
//        foreach ($order->getItems() as $item) {
//            /* @var Sao_Shared_Sales_Transfer_Expense $expense */
//            foreach ($item->getExpenses() as $expense) {
//                if ($expense->getType() == ProjectA_Shared_Library_Sales_ExpenseConstants::EXPENSE_TAX) {
//                    $stateTaxAmount += $expense->getGrossPrice();
//                }
//            }
//        }
//
//        return $stateTaxAmount;
//    }

}
