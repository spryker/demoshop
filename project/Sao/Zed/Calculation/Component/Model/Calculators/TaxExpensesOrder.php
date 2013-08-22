<?php

class Sao_Zed_Calculation_Component_Model_Calculators_TaxExpensesOrder extends ProjectA_Zed_Calculation_Component_Model_Calculators_Abstract implements ProjectA_Zed_Misc_Component_Dependency_Facade_Interface
{

    use ProjectA_Zed_Misc_Component_Dependency_Facade_Trait;

    /** @var Sao_Zed_Calculation_Component_Factory */
    protected $factory;

    /**
     * @var bool
     */
    public $modifyTotals = true;

    /**
     * @param Sao_Shared_Sales_Transfer_Order $order
     */
    public function recalculate(Sao_Shared_Sales_Transfer_Order $order)
    {
        $taxExpensePercentage = $this->getSalesTaxRateFromAddress($order->getShippingAddress());

        /* the shipping address is not in a ZIP code area where additional expenses need to be added to the item */
        if (!$taxExpensePercentage) {
            return;
        }

        $itemGrossPriceSum = 0;

        /* @var $item Sao_Shared_Sales_Transfer_Order_Item */
        foreach ($order->getItems() as $item) {
            $itemGrossPriceSum += $item->getGrossPrice();
        }

        $expenses = $order->getExpenses();
        $expense = Generated_Shared_Library_TransferLoader::getSalesExpense();
        $expense->setType(ProjectA_Shared_Library_Sales_ExpenseConstants::EXPENSE_TAX);
        $expense->setName('Special ZIP code dependent tax Order');
        $expense->setGrossPrice(round($itemGrossPriceSum * $taxExpensePercentage / 100));

        /**
         * @todo Think about it
         *
         * This is a hardcoded value. We could also store the tax percentage which was the base for the amount
         * calculation.
         */
        $expense->setTaxPercentage(0);
        $expenses->add($expense);
        $order->setExpenses($expenses);
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order_Address $address
     * @return int
     */
    protected function getSalesTaxRateFromAddress(Sao_Shared_Sales_Transfer_Order_Address $address)
    {
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
     * Normalize country-information
     *
     * @param Sao_Shared_Sales_Transfer_Order_Address $address
     *
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

}
