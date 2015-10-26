<?php

namespace Pyz\Zed\CustomerCheckoutConnector\Business\Model;

use Generated\Shared\CustomerCheckoutConnector\CheckoutRequestInterface;
use Generated\Shared\Transfer\CheckoutResponseTransfer;
use SprykerFeature\Zed\CustomerCheckoutConnector\Dependency\Facade\CustomerCheckoutConnectorToCustomerInterface;

class PreconditionChecker implements PreconditionCheckerInterface
{

    /**
     * @var CustomerCheckoutConnectorToCustomerInterface
     */
    private $customerFacade;

    /**
     * @param CustomerCheckoutConnectorToCustomerInterface $customerFacade
     */
    public function __construct(CustomerCheckoutConnectorToCustomerInterface $customerFacade)
    {
        $this->customerFacade = $customerFacade;
    }

    /**
     * @param CheckoutRequestInterface $request
     * @param CheckoutResponseTransfer $response
     */
    public function checkPreconditions(CheckoutRequestInterface $request, CheckoutResponseTransfer $response)
    {

    }

}
