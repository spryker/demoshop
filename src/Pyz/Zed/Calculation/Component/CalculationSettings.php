<?php
namespace Pyz\Zed\Calculation\Component;

use Generated\Zed\Calculation\Component\CalculationFactory;
use Generated\Zed\Salesrule\Component\Dependency\SalesruleFacadeInterface;
use Generated\Zed\Salesrule\Component\Dependency\SalesruleFacadeTrait;
use ProjectA\Zed\Calculation\Component\Model\Calculator\CalculatorInterface;
use ProjectA\Zed\Calculation\Component\Model\Calculator\TotalsCalculatorInterface;
use ProjectA\Zed\Calculation\Component\CalculationSettings as ProjectACalculationSettings;
use ProjectA\Zed\Library\Dependency\DependencyFactoryInterface;

/**
 * @property CalculationFactory $factory
 */
class CalculationSettings extends ProjectACalculationSettings implements
    DependencyFactoryInterface,
    SalesruleFacadeInterface
{

    use SalesruleFacadeTrait;

    /**
     * @return CalculatorInterface[]|TotalsCalculatorInterface[]
     */
    public function getCalculatorStack()
    {
        return array(
            $this->factory->createModelCalculatorRemoveTotalsCalculator(),
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
