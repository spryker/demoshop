<?php

namespace Pyz\Zed\Calculation\Business;

use SprykerFeature\Zed\Calculation\Business\CalculationFacade as SprykerCalculationFacade;
use SprykerFeature\Zed\DiscountCalculationConnector\Dependency\Facade\DiscountCalculationToCalculationInterface;

class CalculationFacade extends SprykerCalculationFacade implements DiscountCalculationToCalculationInterface
{

}
