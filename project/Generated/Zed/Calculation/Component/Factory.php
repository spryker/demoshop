<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Calculation_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return ProjectA_Zed_Calculation_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('ProjectA_Zed_Calculation_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Calculation_Component_Model_Calculator
     */
    public function getModelCalculator()
    {
        $class = $this->transformClassName('ProjectA_Zed_Calculation_Component_Model_Calculator');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Calculation_Component_Model_Calculators_Abstract
     */
    public function getModelCalculatorsAbstract()
    {
        $class = $this->transformClassName('ProjectA_Zed_Calculation_Component_Model_Calculators_Abstract');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Calculation_Component_Model_Calculators_Discounts
     */
    public function getModelCalculatorsDiscounts()
    {
        $class = $this->transformClassName('ProjectA_Zed_Calculation_Component_Model_Calculators_Discounts');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Calculation_Component_Model_Calculators_ExpensePriceToPay
     */
    public function getModelCalculatorsExpensePriceToPay()
    {
        $class = $this->transformClassName('ProjectA_Zed_Calculation_Component_Model_Calculators_ExpensePriceToPay');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Calculation_Component_Model_Calculators_GrandTotal
     */
    public function getModelCalculatorsGrandTotal()
    {
        $class = $this->transformClassName('Sao_Zed_Calculation_Component_Model_Calculators_GrandTotal');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Calculation_Component_Model_Calculators_GrandTotalWithoutDiscounts
     */
    public function getModelCalculatorsGrandTotalWithoutDiscounts()
    {
        $class = $this->transformClassName('ProjectA_Zed_Calculation_Component_Model_Calculators_GrandTotalWithoutDiscounts');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Calculation_Component_Model_Calculators_ItemExpensesTotal
     */
    public function getModelCalculatorsItemExpensesTotal()
    {
        $class = $this->transformClassName('ProjectA_Zed_Calculation_Component_Model_Calculators_ItemExpensesTotal');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Calculation_Component_Model_Calculators_ItemPriceToPay
     */
    public function getModelCalculatorsItemPriceToPay()
    {
        $class = $this->transformClassName('ProjectA_Zed_Calculation_Component_Model_Calculators_ItemPriceToPay');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Calculation_Component_Model_Calculators_OptionPriceToPay
     */
    public function getModelCalculatorsOptionPriceToPay()
    {
        $class = $this->transformClassName('ProjectA_Zed_Calculation_Component_Model_Calculators_OptionPriceToPay');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Calculation_Component_Model_Calculators_OrderExpensesTotal
     */
    public function getModelCalculatorsOrderExpensesTotal()
    {
        $class = $this->transformClassName('ProjectA_Zed_Calculation_Component_Model_Calculators_OrderExpensesTotal');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Calculation_Component_Model_Calculators_RemoveAllCalculatedDiscounts
     */
    public function getModelCalculatorsRemoveAllCalculatedDiscounts()
    {
        $class = $this->transformClassName('ProjectA_Zed_Calculation_Component_Model_Calculators_RemoveAllCalculatedDiscounts');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Calculation_Component_Model_Calculators_RemoveAllExpenses
     */
    public function getModelCalculatorsRemoveAllExpenses()
    {
        $class = $this->transformClassName('ProjectA_Zed_Calculation_Component_Model_Calculators_RemoveAllExpenses');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Calculation_Component_Model_Calculators_Salesrule
     */
    public function getModelCalculatorsSalesrule()
    {
        $class = $this->transformClassName('ProjectA_Zed_Calculation_Component_Model_Calculators_Salesrule');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Calculation_Component_Model_Calculators_Subtotal
     */
    public function getModelCalculatorsSubtotal()
    {
        $class = $this->transformClassName('ProjectA_Zed_Calculation_Component_Model_Calculators_Subtotal');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Calculation_Component_Model_Calculators_Tax
     */
    public function getModelCalculatorsTax()
    {
        $class = $this->transformClassName('ProjectA_Zed_Calculation_Component_Model_Calculators_Tax');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Calculation_Component_Model_Calculators_Totals
     */
    public function getModelCalculatorsTotals()
    {
        $class = $this->transformClassName('ProjectA_Zed_Calculation_Component_Model_Calculators_Totals');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Calculation_Component_Model_Tax
     */
    public function getModelTax()
    {
        $class = $this->transformClassName('ProjectA_Zed_Calculation_Component_Model_Tax');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Calculation_Component_Settings
     */
    public function getSettings()
    {
        $class = $this->transformClassName('Sao_Zed_Calculation_Component_Settings');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Calculation_Component_Model_Calculators_AddCatalogProductToOrderItem
     */
    public function getModelCalculatorsAddCatalogProductToOrderItem()
    {
        $class = $this->transformClassName('Sao_Zed_Calculation_Component_Model_Calculators_AddCatalogProductToOrderItem');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Calculation_Component_Model_Calculators_CustomsAndDuties
     */
    public function getModelCalculatorsCustomsAndDuties()
    {
        $class = $this->transformClassName('Sao_Zed_Calculation_Component_Model_Calculators_CustomsAndDuties');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Calculation_Component_Model_Calculators_FreightCosts
     */
    public function getModelCalculatorsFreightCosts()
    {
        $class = $this->transformClassName('Sao_Zed_Calculation_Component_Model_Calculators_FreightCosts');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Calculation_Component_Model_Calculators_QuotesToExpenses
     */
    public function getModelCalculatorsQuotesToExpenses()
    {
        $class = $this->transformClassName('Sao_Zed_Calculation_Component_Model_Calculators_QuotesToExpenses');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Calculation_Component_Model_Calculators_ShippingCosts
     */
    public function getModelCalculatorsShippingCosts()
    {
        $class = $this->transformClassName('Sao_Zed_Calculation_Component_Model_Calculators_ShippingCosts');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Calculation_Component_Model_Calculators_ShippingCostsWithoutDiscounts
     */
    public function getModelCalculatorsShippingCostsWithoutDiscounts()
    {
        $class = $this->transformClassName('Sao_Zed_Calculation_Component_Model_Calculators_ShippingCostsWithoutDiscounts');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Calculation_Component_Model_Calculators_SubtotalWithoutItemExpenses
     */
    public function getModelCalculatorsSubtotalWithoutItemExpenses()
    {
        $class = $this->transformClassName('Sao_Zed_Calculation_Component_Model_Calculators_SubtotalWithoutItemExpenses');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Calculation_Component_Model_Calculators_TaxExpensesItem
     */
    public function getModelCalculatorsTaxExpensesItem()
    {
        $class = $this->transformClassName('Sao_Zed_Calculation_Component_Model_Calculators_TaxExpensesItem');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Calculation_Component_Model_Calculators_TaxExpensesOrder
     */
    public function getModelCalculatorsTaxExpensesOrder()
    {
        $class = $this->transformClassName('Sao_Zed_Calculation_Component_Model_Calculators_TaxExpensesOrder');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Calculation_Component_Model_Calculators_TotalDiscountOnItem
     */
    public function getModelCalculatorsTotalDiscountOnItem()
    {
        $class = $this->transformClassName('Sao_Zed_Calculation_Component_Model_Calculators_TotalDiscountOnItem');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
