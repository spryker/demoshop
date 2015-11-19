<?php

namespace Pyz\Zed\Customer\Communication\Controller;
use Generated\Shared\Customer\CustomerLoginResultInterface;
use Generated\Shared\Transfer\CustomerInfoTransfer;
use Pyz\Zed\Customer\Business\CustomerFacade;
use SprykerFeature\Zed\Customer\Communication\Controller\GatewayController as SprykerFeatureGatewayController;

/**
 * @method CustomerFacade getFacade()
 */
class GatewayController extends SprykerFeatureGatewayController
{

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
