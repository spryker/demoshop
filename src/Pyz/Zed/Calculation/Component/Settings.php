<?php
/**
 * @property Generated_Zed_Calculation_Component_Factory $factory
 */
class Pyz_Zed_Calculation_Component_Settings extends ProjectA_Zed_Calculation_Component_Settings implements
    ProjectA_Zed_Library_Dependency_Factory_Interface,
    ProjectA_Zed_Salesrule_Component_Dependency_Facade_Interface
{

    use ProjectA_Zed_Salesrule_Component_Dependency_Facade_Trait;

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
            $this->facadeSalesrule->createSalesruleCalculator(),
            $this->factory->createModelCalculatorsExpensePriceToPay(),
            $this->factory->createModelCalculatorsItemPriceToPay(),
            $this->factory->createModelCalculatorsOptionPriceToPay(),
            $this->factory->createModelCalculatorsDiscounts(),
            $this->factory->createModelCalculatorsGrandTotal(),
            $this->factory->createModelCalculatorsTax(),
        );
    }

}
