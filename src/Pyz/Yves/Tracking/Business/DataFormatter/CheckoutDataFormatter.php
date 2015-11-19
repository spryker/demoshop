<?php

namespace Pyz\Yves\Tracking\Business\DataFormatter;

use Generated\Shared\Transfer\ExpenseTransfer;
use Generated\Shared\Transfer\TotalsTransfer;
use PavFeature\Shared\Library\Currency\CurrencyManager;
use PavFeature\Yves\Tracking\Business\DataFormatter\AbstractDataFormatter;
use Pyz\Shared\Shipment\Business\ShipmentMethodConstants;

class CheckoutDataFormatter extends AbstractDataFormatter
{
    const PURCHASE = 'purchase';
    const PRODUCTS = 'products';

    /**
     * @param int|null $idSalesOrder
     * @param TotalsTransfer $totalsTransfer
     * @param ExpenseTransfer[] $expensesTransfer
     *
     * @return array
     */
    public static function formatPurchase(
        $idSalesOrder,
        TotalsTransfer $totalsTransfer,
        $expenseTransfers
    ) {
        $purchaseData = [];

        try {
            $currencyManager = CurrencyManager::getInstance();

            $taxAmount = $currencyManager->convertCentToDecimal($totalsTransfer->getTaxTotal()->getAmount());
            $grandTotal = $currencyManager->convertCentToDecimal($totalsTransfer->getGrandTotal());

            $purchaseData = [
                'revenue' => $grandTotal,
                'tax' => $taxAmount,
            ];

            if ($idSalesOrder) {
                $purchaseData['id'] = $idSalesOrder;
            }

            $shipmentFee = self::getShippingFee($expenseTransfers);
            if ($shipmentFee !== null) {
                $purchaseData['shipping'] = $currencyManager->convertCentToDecimal($shipmentFee);
            }

            $voucherCodes = self::getVoucherCodes($expenseTransfers);
            if ($voucherCodes !== null) {
                $purchaseData['coupon'] = $voucherCodes;
            }

        } catch (\Exception $e) {
            // ignore any errors, it's just tracking ..
        }

        return $purchaseData;
    }

    /**
     * @param ExpenseTransfer[] $expenseTransfers
     *
     * @return int|null
     */
    protected static function getShippingFee($expenseTransfers)
    {
        foreach ($expenseTransfers as $expenseTransfer) {
            if ($expenseTransfer->getType() === ShipmentMethodConstants::TYPE_SHIPMENT_FEE) {
                return $expenseTransfer->getPriceToPay();
            }
        }

        return null;
    }

    /**
     * @param ExpenseTransfer[] $expenseTransfers
     *
     * @return string|null
     */
    protected static function getVoucherCodes($expenseTransfers)
    {
        foreach ($expenseTransfers as $expenseTransfer) {
            foreach ($expenseTransfer->getDiscounts() as $discountTransfer) {

                return implode(', ', $discountTransfer->getUsedCodes());
            }
        }

        return null;
    }

}
