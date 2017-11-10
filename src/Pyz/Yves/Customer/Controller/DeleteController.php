<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Customer\Controller;

use Generated\Shared\Transfer\CustomersTransfer;
use Pyz\Yves\Customer\Plugin\Provider\CustomerControllerProvider;
use Symfony\Component\HttpFoundation\Request;

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

    /**
     *
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteUserAction(Request $request)
    {
        $customerId = (int)$request->get('id');
        $loggedInCustomerTransfer = $this->getLoggedInCustomerTransfer();
        /** @var CustomersTransfer $currentOrganizationUsers */
        $currentOrganizationUsers = $this->getClient()->getCustomersInSameGroup($loggedInCustomerTransfer);

        foreach ($currentOrganizationUsers->getCustomers() as $user) {
            if ($customerId === $user->getIdCustomer() && $loggedInCustomerTransfer->getIdOrganization() === $user->getIdOrganization() && $loggedInCustomerTransfer->getOrganizationRole() === 'Admin') {
                $this->getClient()->anonymizeCustomer($user);
                break;
            }
        }

        return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_ADMIN);
    }
}
