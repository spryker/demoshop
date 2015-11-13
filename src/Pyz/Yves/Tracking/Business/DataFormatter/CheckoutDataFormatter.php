<?php

namespace Pyz\Yves\Tracking\Business\DataFormatter;

use Generated\Shared\Transfer\CartTransfer;
use PavFeature\Yves\Tracking\Business\DataFormatter\AbstractDataFormatter;
use PavFeature\Yves\Tracking\Business\TrackingConstants;

class CheckoutDataFormatter extends AbstractDataFormatter
{
    const PURCHASE = 'purchase';
    const PRODUCTS = 'products';


    /**
     * @param CartTransfer $cartTransfer
     *
     * @return array
     */
    public static function formatPurchase(CartTransfer $cartTransfer)
    {
        $purchaseData = [];

        try {
            $cartTotals = $cartTransfer->getTotals();
            if (!$cartTotals) {
                return $purchaseData;
            }

            $taxAmount = $cartTotals->getTaxTotal()->getAmount();

            $purchaseData = [
                'id' => TrackingConstants::TODO_VALUE,
                'affiliation' => TrackingConstants::TODO_VALUE,
                'revenue' => TrackingConstants::TODO_VALUE,
                'tax' => $taxAmount,
                'shipping' => TrackingConstants::TODO_VALUE,
                'coupon' => TrackingConstants::TODO_VALUE,
            ];

        } catch (\Exception $e) {
            // ignore any errors, it's just tracking ..
        }

        return $purchaseData;
    }

}
