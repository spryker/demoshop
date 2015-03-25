<?php
namespace Pyz\Yves\Customer\Communication\Controller;

use SprykerCore\Yves\Application\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use ProjectA\Shared\Customer\Transfer\Customer as CustomerTransfer;
use SprykerFeature\Yves\Customer\Form\Register;

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

    public function logoutAction()
    {
        return $this->redirectResponseInternal("home");
    }

    public function registerAction()
    {
        /** @var Register $register */
        $registration = $this->locator->customer()
            ->pluginSecurityService()
            ->createFormRegister();

        $form = $this->createForm($registration);

        if ($form->isValid()) {
            /** @var CustomerTransfer $customerTransfer */
            $customerTransfer = $this->locator->customer()->transferCustomer();
            $customerTransfer->setEmail($form->getData()["email"]);
            $customerTransfer->setPassword($form->getData()["password"]);
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
        $this->addMessageError("customer.registrationtoken.timeout");
        return $this->redirectResponseInternal("home");
    }
}