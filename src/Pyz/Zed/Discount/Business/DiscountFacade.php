<?php

namespace Pyz\Zed\Discount\Business;

use ProjectA\Zed\DiscountCalculationConnector\Dependency\Facade\DiscountFacadeInterface;
use ProjectA\Zed\Discount\Business\DiscountFacade as CoreDiscountFacade;

class DiscountFacade extends CoreDiscountFacade implements
    DiscountFacadeInterface
{

}
