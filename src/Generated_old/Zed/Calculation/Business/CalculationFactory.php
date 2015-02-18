<?php 

namespace Generated\Zed\Calculation\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class CalculationFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @return \ProjectA\Zed\Calculation\Business\CalculationFacade
     */
    public function createFacade()
    {
        $class = $this->transformClassName('ProjectA\Zed\Calculation\Business\CalculationFacade');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Calculation\Business\CalculationSettings
     */
    public function createSettings()
    {
        $class = $this->transformClassName('ProjectA\Zed\Calculation\Business\CalculationSettings');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Calculation\Business\Model\Calculator\DiscountTotalsCalculator
     */
    public function createModelCalculatorDiscountTotalsCalculator()
    {
        $class = $this->transformClassName('ProjectA\Zed\Calculation\Business\Model\Calculator\DiscountTotalsCalculator');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Calculation\Business\Model\Calculator\ExpensePriceToPayCalculator
     */
    public function createModelCalculatorExpensePriceToPayCalculator()
    {
        $class = $this->transformClassName('ProjectA\Zed\Calculation\Business\Model\Calculator\ExpensePriceToPayCalculator');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Calculation\Business\Model\Calculator\ExpenseTotalsCalculator
     */
    public function createModelCalculatorExpenseTotalsCalculator()
    {
        $class = $this->transformClassName('ProjectA\Zed\Calculation\Business\Model\Calculator\ExpenseTotalsCalculator');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Calculation\Business\Model\Calculator\GrandTotalTotalsCalculator
     */
    public function createModelCalculatorGrandTotalTotalsCalculator()
    {
        $class = $this->transformClassName('ProjectA\Zed\Calculation\Business\Model\Calculator\GrandTotalTotalsCalculator');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Calculation\Business\Model\Calculator\GrandTotalWithoutDiscountsTotalsCalculator
     */
    public function createModelCalculatorGrandTotalWithoutDiscountsTotalsCalculator()
    {
        $class = $this->transformClassName('ProjectA\Zed\Calculation\Business\Model\Calculator\GrandTotalWithoutDiscountsTotalsCalculator');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Calculation\Business\Model\Calculator\ItemPriceToPayCalculator
     */
    public function createModelCalculatorItemPriceToPayCalculator()
    {
        $class = $this->transformClassName('ProjectA\Zed\Calculation\Business\Model\Calculator\ItemPriceToPayCalculator');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Calculation\Business\Model\Calculator\OptionPriceToPayCalculator
     */
    public function createModelCalculatorOptionPriceToPayCalculator()
    {
        $class = $this->transformClassName('ProjectA\Zed\Calculation\Business\Model\Calculator\OptionPriceToPayCalculator');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Calculation\Business\Model\Calculator\RemoveAllCalculatedDiscountsCalculator
     */
    public function createModelCalculatorRemoveAllCalculatedDiscountsCalculator()
    {
        $class = $this->transformClassName('ProjectA\Zed\Calculation\Business\Model\Calculator\RemoveAllCalculatedDiscountsCalculator');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Calculation\Business\Model\Calculator\RemoveAllExpensesCalculator
     */
    public function createModelCalculatorRemoveAllExpensesCalculator()
    {
        $class = $this->transformClassName('ProjectA\Zed\Calculation\Business\Model\Calculator\RemoveAllExpensesCalculator');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Calculation\Business\Model\Calculator\RemoveTotalsCalculator
     */
    public function createModelCalculatorRemoveTotalsCalculator()
    {
        $class = $this->transformClassName('ProjectA\Zed\Calculation\Business\Model\Calculator\RemoveTotalsCalculator');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Calculation\Business\Model\Calculator\SubtotalTotalsCalculator
     */
    public function createModelCalculatorSubtotalTotalsCalculator()
    {
        $class = $this->transformClassName('ProjectA\Zed\Calculation\Business\Model\Calculator\SubtotalTotalsCalculator');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Calculation\Business\Model\Calculator\SubtotalWithoutItemExpensesTotalsCalculator
     */
    public function createModelCalculatorSubtotalWithoutItemExpensesTotalsCalculator()
    {
        $class = $this->transformClassName('ProjectA\Zed\Calculation\Business\Model\Calculator\SubtotalWithoutItemExpensesTotalsCalculator');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Calculation\Business\Model\Calculator\TaxTotalsCalculator
     */
    public function createModelCalculatorTaxTotalsCalculator()
    {
        $class = $this->transformClassName('ProjectA\Zed\Calculation\Business\Model\Calculator\TaxTotalsCalculator');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Calculation\Business\Model\Calculator
     */
    public function createModelCalculator()
    {
        $class = $this->transformClassName('ProjectA\Zed\Calculation\Business\Model\Calculator');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Calculation\Business\Model\PriceCalculationHelper
     */
    public function createModelPriceCalculationHelper()
    {
        $class = $this->transformClassName('ProjectA\Zed\Calculation\Business\Model\PriceCalculationHelper');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
