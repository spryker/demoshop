<?php

namespace Pyz\Yves\Customer\Controller;

use Generated\Shared\Transfer\CustomerTransfer;
use Pyz\Yves\Customer\Plugin\Provider\CustomerControllerProvider;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class ProfileController extends AbstractCustomerController
{

    const MESSAGE_PROFILE_CHANGE_SUCCESS = 'customer.profile.change.success';
    const MESSAGE_PASSWORD_CHANGE_SUCCESS = 'customer.password.change.success';

    /**
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function indexAction(Request $request)
    {
        $profileForm = $this
            ->buildForm($this->getFactory()->createFormProfile($this->getLoggedInCustomerTransfer()))
            ->handleRequest($request);

        if ($profileForm->isValid()) {
            return $this->processProfileUpdate($profileForm->getData());
        }

        $passwordForm = $this
            ->buildForm($this->getFactory()->createFormPassword())
            ->handleRequest($request);

        if ($passwordForm->isValid()) {
            return $this->processPasswordUpdate($passwordForm->getData());
        }

        return [
            'profileForm' => $profileForm->createView(),
            'passwordForm' => $passwordForm->createView(),
        ];
    }

    /**
     * @param CustomerTransfer $customerTransfer
     *
     * @return RedirectResponse
     */
    protected function processProfileUpdate(CustomerTransfer $customerTransfer)
    {
        $customerResponseTransfer = $this
            ->getClient()
            ->updateCustomer($customerTransfer);

        if ($customerResponseTransfer->getIsSuccess()) {
            $this->updateLoggedInCustomerTransfer($customerResponseTransfer->getCustomerTransfer());

            $this->addSuccessMessage(self::MESSAGE_PROFILE_CHANGE_SUCCESS);
        } else {
            foreach ($customerResponseTransfer->getErrors() as $customerErrorTransfer) {
                $this->addErrorMessage($customerErrorTransfer->getMessage());
            }
        }

        return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_PROFILE);
    }

    /**
     * @param CustomerTransfer $customerTransfer
     *
     * @return RedirectResponse
     */
    protected function processPasswordUpdate(CustomerTransfer $customerTransfer)
    {
        $customerTransfer->setIdCustomer($this->getLoggedInCustomerTransfer()->getIdCustomer());

        $customerResponseTransfer = $this
            ->getClient()
            ->updateCustomerPassword($customerTransfer);

        if ($customerResponseTransfer->getIsSuccess()) {
            $this->updateLoggedInCustomerTransfer($customerResponseTransfer->getCustomerTransfer());

            $this->addSuccessMessage(self::MESSAGE_PASSWORD_CHANGE_SUCCESS);
        }

        foreach ($customerResponseTransfer->getErrors() as $customerErrorTransfer) {
            $this->addErrorMessage($customerErrorTransfer->getMessage());
        }

        return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_PROFILE);
    }

    /**
     * @param CustomerTransfer $customerTransfer
     *
     * @return void
     */
    protected function updateLoggedInCustomerTransfer(CustomerTransfer $customerTransfer)
    {
        $loggedInCustomerTransfer = $this->getLoggedInCustomerTransfer();
        $loggedInCustomerTransfer->fromArray($customerTransfer->toArray());
    }

}
