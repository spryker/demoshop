<?php
/**
 * @property Sao_Zed_Cart_Component_Facade $facadeCart
 */
class Sao_Zed_Calculation_Component_Model_Calculators_TaxExpensesItem extends ProjectA_Zed_Calculation_Component_Model_Calculators_Abstract
    implements ProjectA_Zed_Misc_Component_Dependency_Facade_Interface, ProjectA_Zed_Cart_Component_Dependency_Facade_Interface
{

    use ProjectA_Zed_Misc_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Cart_Component_Dependency_Facade_Trait;

    const REGION_CALIFORNIA = 'CA';
    const ISO2_CODE_USA = 'US';



    /**
     * @var bool
     */
    public $modifyTotals = true;

    /**
     * @param ProjectA_Shared_Sales_Transfer_Order $order
     */
    public function recalculate(ProjectA_Shared_Sales_Transfer_Order $order)
    {
        if (!$this->isShippingAddressInCalifornia($order->getShippingAddress())) {
            // reset tax in case user switches countries
            $this->setTotals(0, $order);
            return;
        }

        $taxExpensePercentage = $this->getSalesTaxRateFromAddress($order->getShippingAddress());

        /* the shipping address is not in a ZIP code area where additional expenses need to be added to the item */
        if (!$taxExpensePercentage) {
            return;
        }

        /* @var $item Sao_Shared_Sales_Transfer_Order_Item */
        foreach ($order->getItems() as $item) {
            $expenses = $item->getExpenses();
            $expense = Generated_Shared_Library_TransferLoader::getSalesExpense();
            $expense->setType(ProjectA_Shared_Library_Sales_ExpenseConstants::EXPENSE_TAX);
            $expense->setName('State tax');
            $expense->setGrossPrice(round(($item->getGrossPrice() + $this->getOptionsAmount($item) - $this->getItemDiscountAmount($item)) * $taxExpensePercentage / 100));

            /**
             * @todo Think about it
             *
             * This is a hardcoded value. We could also store the tax percentage which was the base for the amount
             * calculation.
             */
            $expense->setTaxPercentage(0);
            $expenses->add($expense);
            $item->setExpenses($expenses);
        }

        $this->setTotals($this->getAmount($order), $order);
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order_Address $address
     * @return int
     */
    protected function getSalesTaxRateFromAddress(Sao_Shared_Sales_Transfer_Order_Address $address)
    {
        return 9; // @todo change me if you can ;)

        $fkMiscCountry = $this->getFkMiscCountryFromAddress($address);
        $zipCode = $address->getZipCode();

        if (empty($fkMiscCountry) || empty($zipCode)) {
            return 0;
        }

        $result = Sao_Zed_Sales_Persistence_SaoSalesTaxQuery::create()->filterByFkMiscCountry($fkMiscCountry)->filterByZipCode($zipCode)->find();

        if ($result->count() === 1) {
            return $result->getFirst()->getTaxPercentage();
        }
        return 0;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order_Address $address
     * @return int|null
     */
    protected function getFkMiscCountryFromAddress(Sao_Shared_Sales_Transfer_Order_Address $address)
    {
        $iso2CountryCode = $address->getIso2Country();
        $fkMiscCountry = $address->getFkMiscCountry();

        if ($fkMiscCountry) {
            return $fkMiscCountry;
        }

        if ($iso2CountryCode) {
            return $this->facadeMisc->getCountryFacade()->getCountryByIso2Code($iso2CountryCode)->getPrimaryKey();
        }

        return null;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order_item $item
     * @return int
     */
    protected function getOptionsAmount(Transfer_Sales_Order_item $item)
    {
        $itemOptionAmount = 0;

        /* @var Sao_Shared_Sales_Transfer_Order_Item_Option $option */
        foreach ($item->getOptions() as $option) {
            $itemOptionAmount += $option->getGrossPrice();
        }

        return $itemOptionAmount;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order_Item $item
     * @return int
     */
    protected function getItemDiscountAmount(Sao_Shared_Sales_Transfer_Order_Item $item)
    {
        $itemDiscountAmount = 0;

        /* @var Sao_Shared_Sales_Transfer_Discount $discount */
        foreach ($item->getDiscounts() as $discount) {
            $itemDiscountAmount += $discount->getAmount();
        }

        return $itemDiscountAmount;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order_Address $address
     * @return bool
     */
    protected function isShippingAddressInCalifornia(Sao_Shared_Sales_Transfer_Order_Address $address)
    {
        if (($address->getRegion() == self::REGION_CALIFORNIA) && ($address->getIso2Country() == self::ISO2_CODE_USA)) {
            return true;
        }

        return false;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order|ProjectA_Zed_Sales_Persistence_PacSalesOrder $order
     * @return int
     */
    public function getAmount($order)
    {
        $taxAmount = 0;

        /* @var Sao_Shared_Sales_Transfer_Order_Item $item */
        foreach ($order->getItems() as $item) {
            /* @var Sao_Shared_Sales_Transfer_Expense $expense */
            foreach ($item->getExpenses() as $expense) {
                if ($expense->getType() == ProjectA_Shared_Library_Sales_ExpenseConstants::EXPENSE_TAX) {
                    // @todo should use price to pay instead?
                    $taxAmount += $expense->getGrossPrice();
                }
            }
        }

        return $taxAmount;
    }

    /**
     * @param int|array $amount
     * @param Sao_Shared_Sales_Transfer_Order|ProjectA_Zed_Sales_Persistence_PacSalesOrder $order
     */
    public function setTotals($amount, $order)
    {
        $totals = $order->getTotals();
        $totals->setStateTaxAmount($amount);
    }

}
