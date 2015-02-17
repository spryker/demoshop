<?php

namespace Pyz\Zed\Discount\Business;

use ProjectA\Zed\DiscountCalculationConnector\Dependency\Facade\DiscountFacadeInterface;
use \ProjectA\Zed\Discount\Business\DiscountFacade as CoreDiscountFacade;

/**
 * Class DiscountFacade
 * @package Pyz\Zed\Discount\Business
 */
class DiscountFacade extends CoreDiscountFacade implements
    DiscountFacadeInterface
{

}
