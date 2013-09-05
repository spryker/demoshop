<?php

class Sao_Zed_Calculation_Component_Model_Calculators_CustomsAndDuties extends ProjectA_Zed_Calculation_Component_Model_Calculators_Abstract implements ProjectA_Zed_Calculation_Component_Interface_Calculator
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

        $customsAndDuties = $this->getAmount($order);
        $this->setTotals($customsAndDuties, $order);
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order|ProjectA_Zed_Sales_Persistence_PacSalesOrder $order
     * @return mixed
     */
    public function getAmount($order)
    {
        $customsAndDuties = 0;

        // Item expenses
        foreach ($order->getItems() as $item) {
            foreach ($item->getExpenses() as $expense) {
                if ($expense->getType() === Sao_Shared_Library_Sales_ExpenseConstants::EXPENSE_CUSTOMS_AND_DUTIES) {
                    $customsAndDuties += $expense->getGrossPrice();
                }
            }
        }

        // order expenses
        foreach ($order->getExpenses() as $expense) {
            if ($expense->getType() === Sao_Shared_Library_Sales_ExpenseConstants::EXPENSE_CUSTOMS_AND_DUTIES) {
                $customsAndDuties += $expense->getGrossPrice();
            }
        }

        return $customsAndDuties;
    }

    /**
     * @param int $amount
     * @param Sao_Shared_Sales_Transfer_Order|ProjectA_Zed_Sales_Persistence_PacSalesOrder $order
     */
    public function setTotals($amount, $order)
    {
        $totals = $order->getTotals();
        $totals->setCustomsAndDuties($amount);
        $order->setTotals($totals);
    }

}
