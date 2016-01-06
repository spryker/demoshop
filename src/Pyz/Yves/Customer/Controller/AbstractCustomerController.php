<?php

namespace Pyz\Yves\Customer\Controller;

use Generated\Shared\Transfer\CustomerTransfer;
use Pyz\Yves\Customer\CustomerFactory;
use Spryker\Client\Customer\CustomerClientInterface;
use Spryker\Yves\Application\Controller\AbstractController;

/**
 * @method CustomerFactory getFactory()
 * @method CustomerClientInterface getClient()
 */
abstract class AbstractCustomerController extends AbstractController
{

    /**
     * @return CustomerTransfer|null
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

}
