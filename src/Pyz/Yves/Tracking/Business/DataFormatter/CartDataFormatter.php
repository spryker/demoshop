<?php

namespace Pyz\Yves\Tracking\Business\DataFormatter;

use Generated\Shared\Transfer\DiscountTransfer;
use Generated\Shared\Transfer\ExpenseTransfer;
use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\TotalsTransfer;
use PavFeature\Yves\Tracking\Business\DataFormatter\AbstractDataFormatter;
use Pyz\Yves\Tracking\Business\TrackingConstants;
use SprykerFeature\Shared\Library\Currency\CurrencyManager;

class CartDataFormatter extends AbstractDataFormatter
{

    /**
     * @param ItemTransfer[] $cartItems
     *
     * @return array
     */
    public static function formatCartItems($cartItems)
    {
        $productData = [];

        try {
            $currencyManager = CurrencyManager::getInstance();

            /** @var ItemTransfer $itemTransfer */
            foreach ($cartItems as $itemTransfer) {
                $productData[] = [
                    'id' => $itemTransfer->getAbstractSku(),
                    'name' => $itemTransfer->getName(),
                    'brand' => TrackingConstants::VALUE_BRAND,
                    'price' => $currencyManager->convertCentToDecimal($itemTransfer->getPriceToPay()),
                    'quantity' => $itemTransfer->getQuantity(),
                ];
            }

        } catch (\Exception $e) {
            // ignore any errors, it's just tracking ..
        }

        return $productData;
    }

    /**
     * @param \ArrayObject $coupons
     *
     * @return array
     */
    public static function formatCoupons($coupons)
    {
        // TODO
        return $coupons->getArrayCopy();
    }

    /**
     * @param DiscountTransfer[] $discounts
     *
     * @return array
     */
    public static function formatDiscounts($discounts)
    {
        $discountsData = [];

        try {
            foreach ($discounts as $discount) {
                // @TODO
                $discountsData[] = $discount->toArray(true);
            }

        } catch (\Exception $e) {
            // ignore any errors, it's just tracking ..
        }

        return $discountsData;
    }

    /**
     * @param ExpenseTransfer[] $expenses
     *
     * @return array
     */
    public static function formatExpenses($expenses)
    {
        $expensesData = [];

        try {
            foreach ($expenses as $expense) {
                // @TODO
                $expensesData[] = $expense->toArray(true);
            }

        } catch (\Exception $e) {
            // ignore any errors, it's just tracking ..
        }

        return $expensesData;
    }

    /**
     * @param TotalsTransfer $totals
     *
     * @return array
     */
    public static function formatTotals(TotalsTransfer $total)
    {
        $totalsData = [];

        try {
            // @TODO
            $totalsData = $total->toArray(true);


        } catch (\Exception $e) {
            // ignore any errors, it's just tracking ..
        }

        return $totalsData;
    }
}
