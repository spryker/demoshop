<?php

namespace Pyz\Yves\Customer\Communication\Controller;

use SprykerCore\Yves\Application\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SecurityController extends AbstractController
{
    /**
     * @param Request $request
     * @return array|RedirectResponse
     */
    public function loginAction(Request $request)
    {
        if ($this->isGranted("ROLE_USER")) {
            $this->addMessageWarning("customer.already.authenticated");

            return $this->redirectResponseInternal("home");
        }

        return ["error" => $this->getSecurityError($request)];
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function logoutAction(Request $request)
    {
        $this->locator->customer()
            ->pluginSecurityService()
            ->createUserProvider($request->getSession())
            ->logout($this->getUsername());

        return $this->redirectResponseInternal("home");
    }

    /**
     * @return array|RedirectResponse
     */
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

    /**
     * @param Request $request
     * @return RedirectResponse
     */
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
}
