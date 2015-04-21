<?php

namespace Pyz\Yves\Customer2\Communication\Controller;

use SprykerCore\Yves\Application\Communication\Controller\AbstractController;
use ProjectA\Shared\Customer\Transfer as CustomerTransfer;
use Symfony\Component\HttpFoundation\Request;

class Customer2Controller extends AbstractController
{

    /**
     * @param Request $req
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function loginAction(Request $req)
    {
        /** @var CustomerTransfer $customerTransfer */
        $customerTransfer = $this->locator->customer()->transferCustomer();

        if ($req->isMethod("POST")) {
            $customerTransfer->setEmail($req->get("email"));
            $customerTransfer->setPassword($req->get("password"));

            if ($this->locator->customer2()->pluginAuth()->login($customerTransfer)) {
                $this->addMessageSuccess("login.successful");
                return $this->redirectResponseInternal("/");
            } else {
                $this->addMessageError("login.failed");
            }
        }

        return $this->redirectResponseInternal("/");
    }

    /**
     * @param Request $req
     */
    public function logoutAction(Request $req)
    {
        if ($req->isMethod("POST")) {
            $this->locator->customer2()->pluginAuth()->logout();
        }
    }

    /**
     * @param Request $req
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function registerAction(Request $req)
    {
        /** @var CustomerTransfer $customerTransfer */
        $customerTransfer = $this->locator->customer()->transferCustomer();

        if ($req->isMethod("POST")) {
            $customerTransfer->setEmail($req->get("email"));
            // etc.

            if ($this->locator->customer2()->sdk()->register($customerTransfer)) {
                $this->addMessageSuccess("registration.confirmation.mail.sent");
                return $this->redirectResponseInternal("/");
            } else {
                $this->addMessageError("registration.failed");
            }
        }

        return $this->redirectResponseInternal("/");
    }

    /**
     * @param Request $req
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function confirmRegistrationAction(Request $req)
    {
        if ($this->locator->customer2()->sdk()->confirmRegistration($req->get("token"))) {
            $this->addMessageSuccess("registration.confirmed");
        } else {
            $this->addMessageError("registration.token.expired");
        }
        return $this->redirectResponseInternal("/");
    }

    /**
    public function forgotPasswordAction();
    public function resetPasswordAction();
    public function viewAction();
    public function updateAction();
    public function addAddress();
    public function updateAddress();
    public function deleteAddress();
    public function viewAddresses();
    **/
}