<?php

use Generated\Shared\Library\TransferLoader;

class Pyz_Zed_Calculation_Component_Model_Calculators_QuotesToExpenses extends ProjectA_Zed_Calculation_Component_Model_Calculators_Abstract implements ProjectA_Zed_Misc_Component_Dependency_Facade_Interface
{
    use ProjectA_Zed_Misc_Component_Dependency_Facade_Trait;



    /**
     * @var float
     */
    protected $roundingError = 0.00;

    /**
     * @param ProjectA\Shared\Sales\Transfer\Order $order
     */
    public function recalculate(ProjectA\Shared\Sales\Transfer\Order $order)
    {
        $quotes = $order->getQuotes();

        if (!$quotes) {
            return;
        }

        /* @var Pyz_Shared_Fulfillment_Transfer_Quote $quote */
        foreach ($quotes as $quote) {
            $this->addExpensesToQuote($quotes, $quote, $order, $quote->getShippingFreight(), Pyz_Shared_Library_Sales_ExpenseConstants::EXPENSE_FREIGHT);
            $this->addExpensesToQuote($quotes, $quote, $order, $quote->getShippingTaxDuties(), Pyz_Shared_Library_Sales_ExpenseConstants::EXPENSE_CUSTOMS_AND_DUTIES);
        }

    }

    protected function addExpensesToQuote(Pyz_Shared_Fulfillment_Transfer_Quote_Collection $quotes, Pyz_Shared_Fulfillment_Transfer_Quote $quote, Pyz_Shared_Sales_Transfer_Order $order, $amount, $type)
    {
        if ($amount <= 0) {
            return;
        }

        $itemCollectionGrossPriceSum = $this->getItemCollectionGrossPriceSum($quote->getOrderItems());

        /* @var Pyz_Shared_Sales_Transfer_Order_Item $item */
        foreach ($quote->getOrderItems() as $item) {
            $partialShippingCosts = $this->calculateShippingCostDistribution($item, $itemCollectionGrossPriceSum, $amount);
            $orderItem = $this->getItemByUniqueItemId($order->getItems(), $item);
            /*
             * If an quote-stored item can not be found in the current item-collection, the quote is expired and
             * must be removed
             */
            if (!$orderItem) {
                $quotes->remove($quote);
                $quote->setOrderItems(TransferLoader::getSalesOrderItemCollection());
                continue;
            }
            $itemExpenses = $orderItem->getExpenses();
            $itemExpense = TransferLoader::getSalesExpense();
            $itemExpense->setGrossPrice($partialShippingCosts);
            $itemExpense->setTaxPercentage(0);
            $itemExpense->setType($type);
            $itemExpense->setName($quote->getProvider());
            $itemExpenses->add($itemExpense);

            $orderItem = $this->getItemByUniqueItemId($order->getItems(), $item);
            $orderItem->setExpenses($itemExpenses);
        }
        $this->roundingError = 0.00;
    }

    /**
     * @param Pyz_Shared_Sales_Transfer_Order_Item_Collection $items
     * @return int
     */
    protected function getItemCollectionGrossPriceSum(Pyz_Shared_Sales_Transfer_Order_Item_Collection $items)
    {
        $itemCollectionGrossPriceSum = 0;

        /* @var Pyz_Shared_Sales_Transfer_Order_Item $item */
        foreach ($items as $item) {
            $itemCollectionGrossPriceSum += $item->getGrossPrice();
        }

        return $itemCollectionGrossPriceSum;
    }

    /**
     * @param Pyz_Shared_Sales_Transfer_Order_Item $item
     * @param int $itemCollectionGrossPriceSum
     * @param int $shippingCosts
     * @return int
     */
    protected function calculateShippingCostDistribution($item, $itemCollectionGrossPriceSum, $shippingCosts)
    {
        $percentage = $item->getGrossPrice() / $itemCollectionGrossPriceSum;

        $amount = $this->roundingError + $shippingCosts * $percentage;
        $amountRounded = round($amount, 0);
        $this->roundingError = $amount - $amountRounded;
        return $amountRounded;
    }

    /**
     * @param Pyz_Shared_Sales_Transfer_Order_Item_Collection $items
     * @param Pyz_Shared_Sales_Transfer_Order_Item            $item
     *
     * @return Pyz_Shared_Sales_Transfer_Order_Item|null
     */
    protected function getItemByUniqueItemId(
        Pyz_Shared_Sales_Transfer_Order_Item_Collection $items, Pyz_Shared_Sales_Transfer_Order_Item $item
    ) {
        /** @var Pyz_Shared_Sales_Transfer_Order_Item $orderItem */
        foreach ($items as $orderItem) {
            if ($orderItem->getUniqueItemId() == $item->getUniqueItemId()) {
                return $orderItem;
            }
        }

        return null;
    }

}
