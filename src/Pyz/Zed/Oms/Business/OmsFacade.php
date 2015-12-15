<?php

namespace Pyz\Zed\Oms\Business;

use Spryker\Zed\Checkout\Dependency\Facade\CheckoutToOmsInterface;
use Spryker\Zed\Oms\Business\OmsFacade as SprykerOmsFacade;
use Spryker\Zed\Sales\Dependency\Facade\SalesToOmsInterface;

class OmsFacade extends SprykerOmsFacade implements
    CheckoutToOmsInterface,
    SalesToOmsInterface
{
}
