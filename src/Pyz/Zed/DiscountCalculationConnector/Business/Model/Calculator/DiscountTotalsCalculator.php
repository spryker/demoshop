<?php

namespace Pyz\Zed\DiscountCalculationConnector\Business\Model\Calculator;

use SprykerFeature\Zed\DiscountCalculationConnector\Business\Model\Calculator\DiscountTotalsCalculator as SprykerDiscountTotalsCalculator;
use Generated\Shared\DiscountCalculationConnector\ItemInterface;
use Pyz\SprykerBugfixInterface;

class DiscountTotalsCalculator extends SprykerDiscountTotalsCalculator implements SprykerBugfixInterface
{
    /**
     * @param ItemInterface $itemTransfer
     *
     * @return int
     */
    protected function calculateItemDiscountAmount(ItemInterface $itemTransfer)
    {
        $itemDiscountAmount = 0;

        $itemDiscountAmount += $this->sumItemDiscounts($itemTransfer->getDiscounts());
        $itemDiscountAmount += $this->sumItemExpenseDiscounts($itemTransfer->getExpenses());
        $itemDiscountAmount += $this->sumOptionDiscounts($itemTransfer->getProductOptions());

        //$itemDiscountAmount = $itemDiscountAmount * $itemTransfer->getQuantity();

        return $itemDiscountAmount;
    }
}