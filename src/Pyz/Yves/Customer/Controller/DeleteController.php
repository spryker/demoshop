<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Customer\Controller;

use Pyz\Yves\Customer\Plugin\Provider\CustomerControllerProvider;
use Spryker\Shared\Customer\Code\Messages;

class DeleteController extends AbstractCustomerController
{

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function confirmAction()
    {
        $loggedInCustomerTransfer = $this->getLoggedInCustomerTransfer();

        $isSuccessful = $this->getClient()->anonymizeCustomer($loggedInCustomerTransfer);

        if ($isSuccessful) {
            $this->getClient()->logout();
            $this->addSuccessMessage(Messages::CUSTOMER_ANONYMIZATION_SUCCESS);
            return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_LOGIN);
        }

        $this->addErrorMessage(Messages::CUSTOMER_ANONYMIZATION_FAILED);
        return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_DELETE);
    }

}
