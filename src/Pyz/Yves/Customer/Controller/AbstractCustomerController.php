<?php

namespace Pyz\Yves\Customer\Controller;

use Generated\Shared\Transfer\CustomerResponseTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Pyz\Client\Customer\CustomerClientInterface;
use Pyz\Yves\Customer\CustomerFactory;
use Spryker\Yves\Application\Controller\AbstractController;

/**
 * @method \Pyz\Yves\Customer\CustomerFactory getFactory()
 * @method \Pyz\Client\Customer\CustomerClientInterface getClient()
 */
abstract class AbstractCustomerController extends AbstractController
{

    /**
     * @return \Generated\Shared\Transfer\CustomerTransfer|null
     */
    protected function getLoggedInCustomerTransfer()
    {
        if ($this->isLoggedInCustomer()) {
            return $this->getClient()->getCustomer();
        }

        return null;
    }

    /**
     * @return bool
     */
    protected function isLoggedInCustomer()
    {
        return $this->getClient()->isLoggedIn();
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerResponseTransfer $customerResponseTransfer
     *
     * @return void
     */
    protected function processResponseErrors(CustomerResponseTransfer $customerResponseTransfer)
    {
        foreach ($customerResponseTransfer->getErrors() as $errorTransfer) {
            $this->addErrorMessage($errorTransfer->getMessage());
        }
    }

}
