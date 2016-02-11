<?php

namespace Pyz\Zed\OmsCheckoutConnector\Business;

use Spryker\Zed\OmsCheckoutConnector\Business\OmsCheckoutConnectorBusinessFactory as BaseOmsChekcoutConnectorBusinessFactory;

class OmsCheckoutConnectorBusinessFactory extends BaseOmsChekcoutConnectorBusinessFactory
{

    /**
     * @return \Spryker\Zed\OmsCheckoutConnector\Business\OmsOrderHydratorInterface
     */
    public function createOmsOrderHydrator()
    {
        return new OmsOrderHydrator();
    }

}
