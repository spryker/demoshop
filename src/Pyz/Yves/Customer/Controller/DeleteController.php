<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Customer\Controller;

use Pyz\Yves\Customer\Plugin\Provider\CustomerControllerProvider;

class DeleteController extends AbstractCustomerController
{
    /**
     * @return void
     */
    public function indexAction()
    {
    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function confirmAction()
    {
        $loggedInCustomerTransfer = $this->getLoggedInCustomerTransfer();

        $this->getClient()->anonymizeCustomer($loggedInCustomerTransfer);

        return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_LOGOUT);
    }
}
