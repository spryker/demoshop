<?php
/**
 * @property \Generated\Zed\Calculation\Component\CalculationFactory $factory
 */
class Pyz_Zed_Calculation_Component_Settings extends \ProjectA\Zed\Calculation\Component\Settings implements
    \ProjectA\Zed\Library\Dependency\DependencyFactoryInterface,
   \Generated\Zed\Salesrule\Component\Dependency\SalesruleFacadeInterface
{

    use \Generated\Zed\Salesrule\Component\Dependency\SalesruleFacadeTrait;

    /**
     * @return CalculatorInterface[]|TotalsCalculatorInterface[]
     */
    public function getCalculatorStack()
    {
        return array(
            //$this->factory->createModelCalculatorRemoveTotalsCalculator(),
            $this->factory->createModelCalculatorRemoveAllExpensesCalculator(),
            $this->factory->createModelCalculatorRemoveAllCalculatedDiscountsCalculator(),
            $this->factory->createModelCalculatorExpenseTotalsCalculator(),
            $this->factory->createModelCalculatorSubtotalTotalsCalculator(),
            $this->factory->createModelCalculatorSubtotalWithoutItemExpensesTotalsCalculator(),
            $this->factory->createModelCalculatorGrandTotalWithoutDiscountsTotalsCalculator(),
            $this->facadeSalesrule->createSalesruleCalculator(),
            $this->factory->createModelCalculatorExpensePriceToPayCalculator(),
            $this->factory->createModelCalculatorItemPriceToPayCalculator(),
            $this->factory->createModelCalculatorOptionPriceToPayCalculator(),
            $this->factory->createModelCalculatorDiscountTotalsCalculator(),
            $this->factory->createModelCalculatorGrandTotalTotalsCalculator(),
        );
    }

}
