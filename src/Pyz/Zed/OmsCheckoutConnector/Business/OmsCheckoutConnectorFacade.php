<?php

namespace Pyz\Zed\OmsCheckoutConnector\Business;

use Generated\Shared\OmsCheckoutConnector\CheckoutRequestInterface;
use Generated\Shared\OmsCheckoutConnector\OrderInterface;
use SprykerEngine\Zed\Kernel\Business\AbstractFacade;

/**
 * @method OmsCheckoutConnectorDependencyContainer getDependencyContainer()
 */
class OmsCheckoutConnectorFacade extends AbstractFacade
{

    public function hydrateOrderTransfer(OrderInterface $order, CheckoutRequestInterface $request)
    {
        $this->getDependencyContainer()->createOmsOrderHydrator()->hydrateOrderTransfer($order, $request);
    }

}
