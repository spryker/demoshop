<?php

namespace Pyz\Zed\Oms\Business;

use SprykerFeature\Zed\Oms\Business\OmsFacade as SprykerOmsFacade;
use SprykerFeature\Zed\Checkout\Dependency\Facade\CheckoutToOmsInterface;
use SprykerFeature\Zed\Sales\Dependency\Facade\SalesToOmsInterface;

class OmsFacade extends SprykerOmsFacade implements CheckoutToOmsInterface, SalesToOmsInterface
{

}
