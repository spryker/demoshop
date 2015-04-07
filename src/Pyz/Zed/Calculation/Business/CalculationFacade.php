<?php

namespace Pyz\Zed\Calculation\Business;

use ProjectA\Zed\Calculation\Business\CalculationFacade as CoreCalculationFacade;
use ProjectA\Zed\DiscountCalculationConnector\Dependency\Facade\DiscountCalculationToCalculationInterface;

class CalculationFacade extends CoreCalculationFacade implements DiscountCalculationToCalculationInterface
{

}
