<?php

namespace Pyz\Zed\Calculation\Business;

use SprykerFeature\Zed\Calculation\Business\CalculationFacade as CoreCalculationFacade;
use SprykerFeature\Zed\DiscountCalculationConnector\Dependency\Facade\DiscountCalculationToCalculationInterface;

class CalculationFacade extends CoreCalculationFacade implements DiscountCalculationToCalculationInterface
{

}
