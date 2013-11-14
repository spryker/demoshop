<?php
namespace Pyz\Zed\Calculation\Component\Model\Calculators;

use Generated\Shared\Library\TransferLoader;
use Generated\Shared\Sales\Transfer\Order;
use ProjectA\Shared\Sales\Code\ExpenseConstants;
use ProjectA\Zed\Calculation\Component\Model\Calculator\CalculatorInterface;

class FixedShippingExpenseCalculator implements CalculatorInterface
{
    /**
     * @var bool
     */
    public $modifyTotals = false;

    /**
     * @param Order $order
     */
    public function recalculate(Order $order)
    {
        if ($order->getItems()->count() > 0) {
            $expense = TransferLoader::loadSalesPriceExpense();
            $expense->setType(ExpenseConstants::EXPENSE_SHIPPING);
            $expense->setName('cart.fixed.shipping');
            $expense->setGrossPrice(690);
            $expense->setPriceToPay(690);
            $expense->setTaxPercentage('19.00');
            $order->addExpense($expense);
        }
    }
}
