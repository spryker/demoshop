<?php

namespace Pyz\Zed\Customer\Business;

use SprykerFeature\Zed\Customer\Business\CustomerFacade as SprykerCustomerFacade;
use SprykerFeature\Zed\CustomerCheckoutConnector\Dependency\Facade\CustomerCheckoutConnectorToCustomerInterface;

class CustomerFacade extends SprykerCustomerFacade implements CustomerCheckoutConnectorToCustomerInterface
{

}
