<?php
namespace Pyz\Yves\Customer\Communication\Controller;

use SprykerCore\Yves\Application\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use ProjectA\Shared\Customer\Transfer\Customer as CustomerTransfer;
use ProjectA\Shared\Customer\Transfer\Address as AddressTransfer;

class CustomerController extends AbstractController
{
    public function loginAction(Request $request)
    {
        if ($this->isGranted("ROLE_USER")) {
            $this->addMessageWarning("customer.already.authenticated");
            return $this->redirectResponseInternal("home");
        }

        return [
            "error" => $this->getSecurityError($request),
        ];
    }

    public function logoutAction(Request $request)
    {
        $this->locator->customer()
            ->pluginSecurityService()
            ->createUserProvider($request->getSession())
            ->logout($this->getUsername());
        return $this->redirectResponseInternal("home");
    }

    public function registerAction()
    {
        $form = $this->createForm($this->dependencyContainer->createFormRegister());

        if ($form->isValid()) {
            /** @var CustomerTransfer $customerTransfer */
            $customerTransfer = $this->locator->customer()->transferCustomer();
            $customerTransfer->fromArray($form->getData());
            $customerTransfer = $this->locator->customer()->sdk()->registerCustomer($customerTransfer);
            if ($customerTransfer->getRegistrationKey()) {
                $this->addMessageWarning("customer.registration.success");
                return $this->redirectResponseInternal("login");
            }
        }

        return ["registerForm" => $form->createView()];
    }

    public function confirmRegistrationAction(Request $request)
    {
        /** @var CustomerTransfer $customerTransfer */
        $customerTransfer = $this->locator->customer()->transferCustomer();
        $customerTransfer->setRegistrationKey($request->query->get("token"));
        $customerTransfer = $this->locator->customer()->sdk()->confirmRegistration($customerTransfer);
        if ($customerTransfer->getRegistered()) {
            $this->addMessageSuccess("customer.registration.confirmed");
            return $this->redirectResponseInternal("login");
        }
        $this->addMessageError("customer.registration.timeout");
        return $this->redirectResponseInternal("home");
    }

    public function forgotPasswordAction()
    {
        $form = $this->createForm($this->dependencyContainer->createFormForgot());

        if ($form->isValid()) {
            /** @var CustomerTransfer $customerTransfer */
            $customerTransfer = $this->locator->customer()->transferCustomer();
            $customerTransfer->fromArray($form->getData());
            $this->locator->customer()->sdk()->forgotPassword($customerTransfer);
            $this->addMessageSuccess("customer.password.recovery.mail.sent");
            return $this->redirectResponseInternal("home");
        }

        return ["form" => $form->createView()];
    }

    public function restorePasswordAction(Request $request)
    {
        $form = $this->createForm($this->locator->customer()->createFormRestore());

        if ($form->isValid()) {
            /** @var CustomerTransfer $customerTransfer */
            $customerTransfer = $this->locator->customer()->transferCustomer();
            $customerTransfer->setRestorePasswordKey($request->query->get("token"));
            $this->locator->customer()->sdk()->restorePassword($customerTransfer);
            $this->locator->customer()
                ->pluginSecurityService()
                ->createUserProvider($request->getSession())
                ->logout($this->getUsername());
            return $this->redirectResponseInternal("login");
        }

        return ["form" => $form->createView()];
    }

    public function deleteAction(Request $request)
    {
        $form = $this->createForm($registration = $this->dependencyContainer->createFormDelete());

        if ($form->isValid()) {
            /** @var CustomerTransfer $customerTransfer */
            $customerTransfer = $this->locator->customer()->transferCustomer();
            $customerTransfer->setEmail($this->getUsername());
            if ($this->locator->customer()->sdk()->deleteCustomer($customerTransfer)) {
                $this->locator->customer()
                    ->pluginSecurityService()
                    ->createUserProvider($request->getSession())
                    ->logout($this->getUsername());
                return $this->redirectResponseInternal("home");
            } else {
                $this->addMessageError("customer.delete.failed");
            }
        }

        return ["form" => $form->createView()];
    }

    public function profileAction()
    {
        /** @var CustomerTransfer $customerTransfer */
        $customerTransfer = $this->locator->customer()->transferCustomer();

        $form = $this->createForm($this->dependencyContainer->createFormProfile());

        if ($form->isValid()) {
            $customerTransfer->fromArray($form->getData());
            $customerTransfer->setEmail($this->getUsername());
            $this->locator->customer()->sdk()->updateCustomer($customerTransfer);
            return $this->redirectResponseInternal("profile");
        }

        $customerTransfer->setEmail($this->getUsername());
        $customerTransfer = $this->locator->customer()->sdk()->getCustomer($customerTransfer);
        $form->setData($customerTransfer->toArray());

        return [
            "form" => $form->createView(),
            "addresses" => $customerTransfer->getAddresses(),
        ];
    }

    public function addressAction()
    {

    }

    public function newAddressAction()
    {
        $form = $this->createForm($this->dependencyContainer->createFormAddress());

        if ($form->isValid()) {
            /** @var AddressTransfer $addressTransfer */
            $addressTransfer = $this->locator->customer()->transferAddress();
            $addressTransfer->fromArray($form->getData());
            $this->locator->customer()->sdk()->newAddress($addressTransfer);
            $this->addMessageSuccess("customer.address.added");
            return $this->redirectResponseInternal("profile");
        }

        /** @var CustomerTransfer $customerTransfer */
        $customerTransfer = $this->locator->customer()->transferCustomer();
        $customerTransfer->setEmail($this->getUsername());
        $customerTransfer = $this->locator->customer()->sdk()->getCustomer($customerTransfer);
        $form->setData($customerTransfer->toArray());

        return ["form" => $form->createView()];
    }

    protected function getUsername()
    {
        $user = $this->getUser();
        if (is_string($user)) {
            return $user;
        }
        return $user->getUsername();
    }
}