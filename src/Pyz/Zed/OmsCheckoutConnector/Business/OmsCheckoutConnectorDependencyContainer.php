<?php

namespace Pyz\Zed\OmsCheckoutConnector\Business;

use Spryker\Zed\OmsCheckoutConnector\Business\OmsOrderHydratorInterface;
use Spryker\Zed\OmsCheckoutConnector\Business\OmsCheckoutConnectorDependencyContainer as BaseOmsChekcoutConnectorDependencyContainer;

class OmsCheckoutConnectorDependencyContainer extends BaseOmsChekcoutConnectorDependencyContainer
{

    /**
     * @return OmsOrderHydratorInterface
     */
    public function createOmsOrderHydrator()
    {
        return new OmsOrderHydrator();
    }

}
