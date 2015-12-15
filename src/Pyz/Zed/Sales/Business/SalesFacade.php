<?php

namespace Pyz\Zed\Sales\Business;

use Spryker\Zed\Sales\Business\SalesFacade as SprykerSalesFacade;
use Spryker\Zed\SalesCheckoutConnector\Dependency\Facade\SalesCheckoutConnectorToSalesInterface;

class SalesFacade extends SprykerSalesFacade implements SalesCheckoutConnectorToSalesInterface
{
}
