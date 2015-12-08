<?php

namespace Pyz\Zed\OmsCheckoutConnector\Business;

use SprykerFeature\Zed\OmsCheckoutConnector\Business\OmsOrderHydratorInterface;
use SprykerFeature\Zed\OmsCheckoutConnector\Business\OmsCheckoutConnectorDependencyContainer as BaseOmsChekcoutConnectorDependencyContainer;

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
