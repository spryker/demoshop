<?php
namespace Pyz\Yves\Customer\Communication\Controller;

use SprykerCore\Yves\Application\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use ProjectA\Shared\Customer\Transfer\Customer as CustomerTransfer;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CustomerController extends AbstractController
{
    /**
     * @return array|RedirectResponse
     */
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

    /**
     * @param Request $request
     * @return array|RedirectResponse
     */
    public function restorePasswordAction(Request $request)
    {
        $form = $this->createForm($this->dependencyContainer->createFormRestore());

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

    /**
     * @param Request $request
     * @return array|RedirectResponse
     */
    public function deleteAction(Request $request)
    {
        $form = $this->createForm($this->dependencyContainer->createFormDelete());

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

    /**
     * @return array|RedirectResponse
     */
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
}