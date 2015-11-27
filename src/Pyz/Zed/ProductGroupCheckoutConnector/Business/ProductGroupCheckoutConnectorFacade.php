<?php

namespace Pyz\Zed\ProductGroupCheckoutConnector\Business;

use Generated\Shared\Transfer\OrderTransfer;
use SprykerEngine\Zed\Kernel\Business\AbstractFacade;

/**
 * @method ProductGroupCheckoutConnectorDependencyContainer getDependencyContainer
 */
class ProductGroupCheckoutConnectorFacade extends AbstractFacade
{
    /**
     * @param OrderTransfer $orderTransfer
     * @return mixed
     */
    public function saveOrderProductGroups(OrderTransfer $orderTransfer)
    {
        return $this->getDependencyContainer()->createOrderProductGroupManager()->saveOrderProductGroups($orderTransfer);
    }
}
