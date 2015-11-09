<?php

namespace Pyz\Zed\DiscountCalculationConnector\Business\Model\Calculator;

use SprykerFeature\Zed\DiscountCalculationConnector\Business\Model\Calculator\DiscountTotalsCalculator as SprykerDiscountTotalsCalculator;
use Generated\Shared\DiscountCalculationConnector\DiscountInterface;
use SprykerFeature\Zed\Calculation\Business\Model\CalculableInterface;
use Pyz\SprykerBugfixInterface;

class DiscountTotalsCalculator extends SprykerDiscountTotalsCalculator implements SprykerBugfixInterface
{
    /**
     * @param CalculableInterface $discountableContainer
     * @param $discountableItems
     *
     * @return array
     */
    protected function sumDiscountItems(
        CalculableInterface $discountableContainer,
        $discountableItems
    ) {
        $orderExpenseItems = [];
        foreach ($discountableContainer->getCalculableObject()->getDiscounts() as $discount) {
            $this->transformDiscountToDiscountTotalItemInArray($discount, $orderExpenseItems);
        }

        foreach ($discountableContainer->getCalculableObject()->getExpenses() as $expenses) {
            foreach ($expenses->getDiscounts() as $discount) {
                $this->transformDiscountToDiscountTotalItemInArray($discount, $orderExpenseItems);
            }
        }

        foreach ($discountableItems as $container) {

            foreach ($container->getDiscounts() as $discount) { //here
                $this->transformDiscountToDiscountTotalItemInArray($discount, $orderExpenseItems, $container->getQuantity());
            }

            foreach ($container->getProductOptions() as $option) {
                foreach ($option->getDiscounts() as $discount) {
                    $this->transformDiscountToDiscountTotalItemInArray($discount, $orderExpenseItems);
                }
            }

            foreach ($container->getExpenses() as $expenses) {
                foreach ($expenses->getDiscounts() as $discount) {
                    $this->transformDiscountToDiscountTotalItemInArray($discount, $orderExpenseItems);
                }
            }
        }

        return $orderExpenseItems;
    }

    /**
     * @param DiscountInterface $discountTransfer
     * @param array $arrayOfExpenseTotalItems
     */
    protected function transformDiscountToDiscountTotalItemInArray(
        DiscountInterface $discountTransfer,
        array &$arrayOfExpenseTotalItems,
        $quantity =  1
    ) {

        if (!isset($arrayOfExpenseTotalItems[$discountTransfer->getDisplayName()])) {
            $discountTotalItemTransfer = $this->getDiscountTotalItem();
            $discountTotalItemTransfer->setName($discountTransfer->getDisplayName());
        } else {
            $discountTotalItemTransfer = $arrayOfExpenseTotalItems[$discountTransfer->getDisplayName()];
        }

        $this->setUsedCodes($discountTotalItemTransfer, $discountTransfer);

        $discountTotalItemTransfer->setAmount($discountTotalItemTransfer->getAmount() +
            $discountTransfer->getAmount() * $quantity);
        $arrayOfExpenseTotalItems[$discountTransfer->getDisplayName()] = $discountTotalItemTransfer;
    }
}