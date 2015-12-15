<?php

namespace Pyz\Zed\Calculation\Business;

use Spryker\Zed\Calculation\Business\CalculationFacade as SprykerCalculationFacade;
use Spryker\Zed\DiscountCalculationConnector\Dependency\Facade\DiscountCalculationToCalculationInterface;

class CalculationFacade extends SprykerCalculationFacade implements DiscountCalculationToCalculationInterface
{
}
