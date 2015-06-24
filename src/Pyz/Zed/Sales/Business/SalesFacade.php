<?php

namespace Pyz\Zed\Sales\Business;

use SprykerFeature\Zed\Sales\Business\SalesFacade as SprykerSalesFacade;
use SprykerFeature\Zed\SalesCheckoutConnector\Dependency\Facade\SalesCheckoutConnectorToSalesInterface;

class SalesFacade extends SprykerSalesFacade implements SalesCheckoutConnectorToSalesInterface
{

}
