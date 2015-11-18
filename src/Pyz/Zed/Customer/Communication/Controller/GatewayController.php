<?php

namespace Pyz\Zed\Customer\Communication\Controller;

use Generated\Shared\Customer\CustomerLoginResultInterface;
use Generated\Shared\Transfer\CustomerInfoTransfer;
use Pyz\Zed\Customer\Business\CustomerFacade;
use Generated\Shared\Transfer\CustomerTransfer;
use SprykerFeature\Zed\Customer\Communication\Controller\GatewayController as SpyGatewayController;

/**
 * @method CustomerFacade getFacade()
 */
class GatewayController extends SpyGatewayController
{
    /**
     * @param CustomerTransfer $customerTransfer
     *
     * @return CustomerTransfer
     */
    public function customerAction(CustomerTransfer $customerTransfer)
    {
        // @TODO : do stuffs with magento password here!

        parent::customerAction($customerTransfer);
    }

    /**
     * @param CustomerLoginResultInterface $customerLoginResultTransfer
     *
     * @return CustomerLoginResultInterface
     */
    public function customerLoginResultAction(CustomerLoginResultInterface $customerLoginResultTransfer)
    {
        return $this->getFacade()->getCustomerLoginResult($customerLoginResultTransfer);
    }


}
