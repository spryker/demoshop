<?php

namespace Pyz\Zed\OmsCheckoutConnector\Business;

use Generated\Zed\Ide\FactoryAutoCompletion\OmsCheckoutConnectorBusiness;
use SprykerEngine\Zed\Kernel\Business\AbstractBusinessDependencyContainer;
use Pyz\Zed\OmsCheckoutConnector\OmsCheckoutConnectorConfig;

/**
 * @method OmsCheckoutConnectorBusiness getFactory()
 * @method OmsCheckoutConnectorConfig getConfig()
 */
class OmsCheckoutConnectorDependencyContainer extends AbstractBusinessDependencyContainer
{

    /**
     * @return OmsOrderHydratorInterface
     */
    public function createOmsOrderHydrator()
    {
        return $this->getFactory()->createOmsOrderHydrator();
    }

}
