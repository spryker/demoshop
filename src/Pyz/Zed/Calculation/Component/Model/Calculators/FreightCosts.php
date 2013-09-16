<?php

class Pyz_Zed_Calculation_Component_Model_Calculators_FreightCosts extends ProjectA_Zed_Calculation_Component_Model_Calculators_Abstract implements ProjectA_Zed_Calculation_Component_Interface_Calculator
{

    /**
     * @var bool
     */
    public $modifyTotals = true;

    /**
     * @param ProjectA_Shared_Sales_Transfer_Order $order
     */
    public function recalculate(ProjectA_Shared_Sales_Transfer_Order $order)
    {
        parent::recalculate($order);

        $freightCosts = $this->getAmount($order);
        $this->setTotals($freightCosts, $order);
    }

    /**
     * @param Pyz_Shared_Sales_Transfer_Order|ProjectA_Zed_Sales_Persistence_PacSalesOrder $order
     * @return mixed
     */
    public function getAmount($order)
    {
        $freightCosts = 0;

        // Item expenses
        foreach ($order->getItems() as $item) {
            foreach ($item->getExpenses() as $expense) {
                if ($expense->getType() === Pyz_Shared_Library_Sales_ExpenseConstants::EXPENSE_FREIGHT) {
                    $freightCosts += $expense->getGrossPrice();
                }
            }
        }

        // order expenses
        foreach ($order->getExpenses() as $expense) {
            if ($expense->getType() === Pyz_Shared_Library_Sales_ExpenseConstants::EXPENSE_FREIGHT) {
                $freightCosts += $expense->getGrossPrice();
            }
        }

        return $freightCosts;
    }

    /**
     * @param int $amount
     * @param Pyz_Shared_Sales_Transfer_Order|ProjectA_Zed_Sales_Persistence_PacSalesOrder $order
     */
    public function setTotals($amount, $order)
    {
        $totals = $order->getTotals();
        $totals->setFreightCosts($amount);
        $order->setTotals($totals);
    }

}
