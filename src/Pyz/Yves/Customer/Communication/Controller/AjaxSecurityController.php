<?php

namespace Pyz\Yves\Customer\Communication\Controller;

use Pyz\Yves\Customer\CustomerDependencyContainer;
use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use SprykerFeature\Shared\Customer\Code\Messages;
use Pyz\Yves\Customer\Communication\Plugin\CustomerControllerProvider;

/**
 * @method CustomerDependencyContainer getDependencyContainer()
 */
class AjaxSecurityController extends AbstractController
{
    /**
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function loginAction(Request $request)
    {
        var_dump($request->request); die();
        if ($this->isGranted("ROLE_USER")) {
            $this->addMessageWarning(Messages::CUSTOMER_ALREADY_AUTHENTICATED);

            return $this->redirectResponseInternal("home");
        }

        return ["error" => $this->getSecurityError($request)];
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function logoutAction(Request $request)
    {
        $this->getLocator()->customer()
            ->pluginSecurityService()
            ->createUserProvider($request->getSession())
            ->logout($this->getUsername());

        return $this->redirectResponseInternal("home");
    }

    /**
     * @return array|RedirectResponse
     */
    public function registerAction(Request $request)
    {
        $form = $this->createForm($this->getDependencyContainer()->createFormRegister());

        if ($form->isValid()) {
            $customerTransfer = $this->getLocator()->customer()->transferCustomer();
            $customerTransfer->fromArray($form->getData());
            $customerTransfer = $this->getLocator()->customer()->sdk()->registerCustomer($customerTransfer);
            if ($customerTransfer->getRegistrationKey()) {
                $this->addMessageWarning(Messages::CUSTOMER_REGISTRATION_SUCCESS);

                return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_LOGIN);
            }
        }

        $m = [];
        foreach ($form->getErrors() as $error) {
            $m[] = $error->getMessage();
        }

        return $this->jsonResponse($request->query->keys());
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function confirmRegistrationAction(Request $request)
    {
        $customerTransfer = $this->getLocator()->customer()->transferCustomer();
        $customerTransfer->setRegistrationKey($request->query->get("token"));
        $customerTransfer = $this->getLocator()->customer()->sdk()->confirmRegistration($customerTransfer);
        if ($customerTransfer->getRegistered()) {
            $this->addMessageSuccess(Messages::CUSTOMER_REGISTRATION_CONFIRMED);

            return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_LOGIN);
        }
        $this->addMessageError(Messages::CUSTOMER_REGISTRATION_TIMEOUT);

        return $this->redirectResponseInternal("home");
    }
}
