<?php

class Sao_Zed_Calculation_Component_Settings extends ProjectA_Zed_Calculation_Component_Settings implements ProjectA_Zed_Library_Dependency_Factory_Interface
{

    /**
     * @return array
     */
    public function getCalculatorStack()
    {
        return array(
            $this->factory->getModelCalculatorsRemoveAllExpenses(),
            $this->factory->getModelCalculatorsRemoveAllCalculatedDiscounts(),
            $this->factory->getModelCalculatorsQuotesToExpenses(),
            $this->factory->getModelCalculatorsFreightCosts(),
            $this->factory->getModelCalculatorsCustomsAndDuties(),
            $this->factory->getModelCalculatorsItemExpensesTotal(),
            $this->factory->getModelCalculatorsOrderExpensesTotal(),
            $this->factory->getModelCalculatorsSubtotal(),
            $this->factory->getModelCalculatorsSubtotalWithoutItemExpenses(),
            $this->factory->getModelCalculatorsGrandTotalWithoutDiscounts(),
            $this->factory->getModelCalculatorsSalesrule(),
            $this->factory->getModelCalculatorsTaxExpensesItem(),
            $this->factory->getModelCalculatorsExpensePriceToPay(),
//            $this->factory->getModelCalculatorsShippingCosts(),
//            $this->factory->getModelCalculatorsShippingCostsWithoutDiscounts(),
            $this->factory->getModelCalculatorsItemPriceToPay(),
            $this->factory->getModelCalculatorsOptionPriceToPay(),
            $this->factory->getModelCalculatorsDiscounts(),
            $this->factory->getModelCalculatorsGrandTotal(),
            $this->factory->getModelCalculatorsTax(),
            $this->factory->getModelCalculatorsAddCatalogProductToOrderItem(),
            $this->factory->getModelCalculatorsTotalDiscountOnItem(),
        );
    }

}
