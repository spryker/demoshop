<?php

namespace Pyz\Zed\Cart\Communication\Controller;


use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Zed\Cart\Communication\Controller\GatewayController as SprykerGatewayController;
use Spryker\Zed\Kernel\Communication\Controller\AbstractGatewayController;

/**
 * @method \Pyz\Zed\Cart\Business\CartFacade getFacade()
 */
class GatewayController extends SprykerGatewayController
{

    /**
     * @param CustomerTransfer $customerTransfer
     *
     * @return QuoteTransfer
     */
    public function getAvailableCartsAction(CustomerTransfer $customerTransfer)
    {
        return $this->getFacade()->getAvailableCarts($customerTransfer);
    }
    
}