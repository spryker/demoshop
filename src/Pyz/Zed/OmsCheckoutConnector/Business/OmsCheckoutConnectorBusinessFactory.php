<?php

namespace Pyz\Zed\OmsCheckoutConnector\Business;

use Spryker\Zed\OmsCheckoutConnector\Business\OmsOrderHydratorInterface;
use Spryker\Zed\OmsCheckoutConnector\Business\OmsCheckoutConnectorBusinessFactory as BaseOmsChekcoutConnectorBusinessFactory;

class OmsCheckoutConnectorBusinessFactory extends BaseOmsChekcoutConnectorBusinessFactory
{

    /**
     * @return OmsOrderHydratorInterface
     */
    public function createOmsOrderHydrator()
    {
        return new OmsOrderHydrator();
    }

}
