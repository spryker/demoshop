<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Customer\Controller;

use Generated\Shared\Transfer\CustomerTransfer;
use Pyz\Yves\Customer\Plugin\Provider\CustomerControllerProvider;
use Symfony\Component\HttpFoundation\Request;

class ProfileController extends AbstractCustomerController
{
    const MESSAGE_PROFILE_CHANGE_SUCCESS = 'customer.profile.change.success';
    const MESSAGE_PASSWORD_CHANGE_SUCCESS = 'customer.password.change.success';

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function indexAction(Request $request)
    {
        $profileForm = $this
            ->getFactory()
            ->createCustomerFormFactory()
            ->createProfileForm()
            ->handleRequest($request);

        if ($profileForm->isSubmitted() === false) {
            $loggedInCustomerTransfer = $this->getLoggedInCustomerTransfer();

            $customerTransfer = $this
                ->getClient()
                ->getCustomerByEmail($loggedInCustomerTransfer);

            $profileForm->setData($customerTransfer->toArray());
        }

        if ($profileForm->isValid() && $this->processProfileUpdate($profileForm->getData()) === true) {
            return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_PROFILE);
        }

        $passwordForm = $this
            ->getFactory()
            ->createCustomerFormFactory()
            ->createPasswordForm()
            ->handleRequest($request);

        if ($passwordForm->isValid() && $this->processPasswordUpdate($passwordForm->getData()) === true) {
            return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_PROFILE);
        }

        return $this->viewResponse([
            'profileForm' => $profileForm->createView(),
            'passwordForm' => $passwordForm->createView(),
        ]);
    }

    /**
     * @param array $customerData
     *
     * @return bool
     */
    protected function processProfileUpdate(array $customerData)
    {
        $customerTransfer = new CustomerTransfer();
        $customerTransfer->fromArray($customerData);
        $customerTransfer->setIdCustomer($this->getLoggedInCustomerTransfer()->getIdCustomer());

        $customerResponseTransfer = $this
            ->getClient()
            ->updateCustomer($customerTransfer);

        if ($customerResponseTransfer->getIsSuccess()) {
            $this->updateLoggedInCustomerTransfer($customerResponseTransfer->getCustomerTransfer());

            $this->addSuccessMessage(self::MESSAGE_PROFILE_CHANGE_SUCCESS);

            return true;
        }

        $this->processResponseErrors($customerResponseTransfer);

        return false;
    }

    /**
     * @param array $customerData
     *
     * @return bool
     */
    protected function processPasswordUpdate(array $customerData)
    {
        $customerTransfer = new CustomerTransfer();
        $customerTransfer->fromArray($customerData);

        $customerTransfer->setIdCustomer($this->getLoggedInCustomerTransfer()->getIdCustomer());

        $customerResponseTransfer = $this
            ->getClient()
            ->updateCustomerPassword($customerTransfer);

        if ($customerResponseTransfer->getIsSuccess()) {
            $this->updateLoggedInCustomerTransfer($customerResponseTransfer->getCustomerTransfer());

            $this->addSuccessMessage(self::MESSAGE_PASSWORD_CHANGE_SUCCESS);

            return true;
        }

        $this->processResponseErrors($customerResponseTransfer);

        return false;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return void
     */
    protected function updateLoggedInCustomerTransfer(CustomerTransfer $customerTransfer)
    {
        $loggedInCustomerTransfer = $this->getLoggedInCustomerTransfer();
        $loggedInCustomerTransfer->fromArray($customerTransfer->modifiedToArray());
    }
}
