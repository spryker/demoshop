<?php

namespace Pyz\Yves\Customer2\Communication\Controller;

use ProjectA\Yves\Application\Communication\Controller\AbstractController;
use ProjectA\Shared\Customer\Transfer as CustomerTransfer;
use Symfony\Component\HttpFoundation\Request;

class Customer2Controller extends AbstractController
{
    public function loginAction(Request $req)
    {
        /** @var CustomerTransfer $customerTransfer */
        $customerTransfer = $this->locator->transfer()->customer();

        if ($req->isMethod("POST")) {
            $customerTransfer->setEmail($req->get("email"));
            $customerTransfer->setPassword($req->get("password"));

            if ($this->locator->customer2()->pluginAuth()->login($customerTransfer)) {
                $this->addMessageSuccess("LOGIN SUCCESSFUL");
                return $this->redirectResponseInternal("/");
            } else {
                $this->addMessageError("LOGIN FAILED");
            }
        }

        return $this->viewResponse(["customer" => $customerTransfer]);
    }

    public function logoutAction(Request $req)
    {
        if ($req->isMethod("POST")) {
            $this->locator->customer2()->pluginAuth()->logout();
        }
    }

    public function registerAction(Request $req)
    {
        /** @var CustomerTransfer $customerTransfer */
        $customerTransfer = $this->locator->transfer()->customer();

        if ($req->isMethod("POST")) {
            $customerTransfer->setEmail($req->get("email"));
            // etc.

            if ($this->locator->customer2()->sdk()->register($customerTransfer)) {
                $this->addMessageSuccess("REGISTRATION CONFIRMATION MAIL SENT");
                return $this->redirectResponseInternal("/");
            } else {
                $this->addMessageError("REGISTRATION FAILED");
            }
        }

        return $this->viewResponse(["customer" => $customerTransfer]);
    }

    public function confirmRegistrationAction(Request $req)
    {
        if ($this->locator->customer2()->sdk()->confirmRegistration($req->get("token"))) {
            $this->addMessageSuccess("REGISTRATION CONFIRMED");
        } else {
            $this->addMessageError("REGISTRATION TOKEN EXPIRED");
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