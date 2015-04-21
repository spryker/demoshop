<?php

namespace Pyz\Zed\Discount\Business;

use SprykerFeature\Zed\DiscountCalculationConnector\Dependency\Facade\DiscountFacadeInterface;
use SprykerFeature\Zed\Discount\Business\DiscountFacade as CoreDiscountFacade;

class DiscountFacade extends CoreDiscountFacade implements
    DiscountFacadeInterface
{

}
