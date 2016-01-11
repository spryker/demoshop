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
     * @return array|RedirectResponse
     */
    public function indexAction()
    {
        $profileFormType = $this
            ->getFactory()
            ->createFormProfile($this->getLoggedInCustomerTransfer());
        $profileForm = $this->buildForm($profileFormType);

        $passwordFormType = $this
            ->getFactory()
            ->createFormPassword();
        $passwordForm = $this->buildForm($passwordFormType);

        return $this->viewResponse([
            'profileForm' => $profileForm->createView(),
            'passwordForm' => $passwordForm->createView(),
        ]);
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function submitProfileAction(Request $request)
    {
        $profileForm = $this
            ->buildForm($this->getFactory()->createFormProfile($this->getLoggedInCustomerTransfer()))
            ->handleRequest($request);

        if ($profileForm->isValid()) {
            $this->processProfileUpdate($profileForm->getData());
        }

        return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_PROFILE);
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function submitPasswordAction(Request $request)
    {
        $passwordForm = $this
            ->buildForm($this->getFactory()->createFormPassword())
            ->handleRequest($request);

        if ($passwordForm->isValid()) {
            $this->processPasswordUpdate($passwordForm->getData());
        }

        return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_PROFILE);
    }

    /**
     * @param CustomerTransfer $customerTransfer
     *
     * @return RedirectResponse
     */
    protected function processProfileUpdate(CustomerTransfer $customerTransfer)
    {
        $customerTransfer->setIdCustomer($this->getLoggedInCustomerTransfer()->getIdCustomer());

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
