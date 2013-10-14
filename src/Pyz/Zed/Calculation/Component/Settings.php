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
            $this->factory->createModelCalculatorsRemoveAllExpenses(),
            $this->factory->createModelCalculatorsRemoveAllCalculatedDiscounts(),
            $this->factory->createModelCalculatorsItemExpensesTotal(),
            $this->factory->createModelCalculatorsOrderExpensesTotal(),
            $this->factory->createModelCalculatorsSubtotal(),
            $this->factory->createModelCalculatorsSubtotalWithoutItemExpenses(),
            $this->factory->createModelCalculatorsGrandTotalWithoutDiscounts(),
            $this->factory->createModelCalculatorsSalesrule(),
            $this->factory->createModelCalculatorsExpensePriceToPay(),
            $this->factory->createModelCalculatorsItemPriceToPay(),
            $this->factory->createModelCalculatorsOptionPriceToPay(),
            $this->factory->createModelCalculatorsDiscounts(),
            $this->factory->createModelCalculatorsGrandTotal(),
            $this->factory->createModelCalculatorsTax(),
        );
    }

}
