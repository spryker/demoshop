<?php
/**
 * @property Generated_Zed_Calculation_Component_Factory $factory
 */
class Pyz_Zed_Calculation_Component_Settings extends ProjectA_Zed_Calculation_Component_Settings implements ProjectA_Zed_Library_Dependency_Factory_Interface
{

    /**
     * @return array
     */
    public function getCalculatorStack()
    {
        return array(
            $this->factory->getModelCalculatorsRemoveAllExpenses(),
            $this->factory->getModelCalculatorsRemoveAllCalculatedDiscounts(),
            $this->factory->getModelCalculatorsItemExpensesTotal(),
            $this->factory->getModelCalculatorsOrderExpensesTotal(),
            $this->factory->getModelCalculatorsSubtotal(),
            $this->factory->getModelCalculatorsSubtotalWithoutItemExpenses(),
            $this->factory->getModelCalculatorsGrandTotalWithoutDiscounts(),
            $this->factory->getModelCalculatorsSalesrule(),
            $this->factory->getModelCalculatorsExpensePriceToPay(),
            $this->factory->getModelCalculatorsItemPriceToPay(),
            $this->factory->getModelCalculatorsOptionPriceToPay(),
            $this->factory->getModelCalculatorsDiscounts(),
            $this->factory->getModelCalculatorsGrandTotal(),
            $this->factory->getModelCalculatorsTax(),
        );
    }

}
