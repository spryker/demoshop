<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

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
