<?php

namespace Pyz\Yves\Customer\Communication\Controller;

use Pyz\Yves\Customer\Communication\CustomerDependencyContainer;
use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use SprykerFeature\Shared\Customer\Code\Messages;
use Pyz\Yves\Customer\Plugin\CustomerControllerProvider;
use Generated\Shared\Transfer\CustomerTransfer;

/**
 * @method CustomerDependencyContainer getDependencyContainer()
 */
class SecurityController extends AbstractController
{
    /**
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function loginAction(Request $request)
    {
        if ($this->isGranted('ROLE_USER')) {
            $this->addMessageWarning(Messages::CUSTOMER_ALREADY_AUTHENTICATED);

            return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_HOME);
        }

        return ['error' => $this->getSecurityError($request)];
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

        return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_HOME);
    }

    /**
     * @return array|RedirectResponse
     */
    public function registerAction()
    {
        $form = $this->createForm($this->getDependencyContainer()->createFormRegister());

        if ($form->isValid()) {
            $customerTransfer = new CustomerTransfer();
            $customerTransfer->fromArray($form->getData());
            $customerTransfer = $this->getLocator()->customer()->client()->registerCustomer($customerTransfer);
            if ($customerTransfer->getRegistrationKey()) {
                $this->addMessageWarning(Messages::CUSTOMER_REGISTRATION_SUCCESS);

                return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_LOGIN);
            }
        }

        return ['registerForm' => $form->createView()];
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function confirmRegistrationAction(Request $request)
    {
        $customerTransfer = new CustomerTransfer();
        $customerTransfer->setRegistrationKey($request->query->get('token'));
        $customerTransfer = $this->getLocator()->customer()->client()->confirmRegistration($customerTransfer);
        if ($customerTransfer->getRegistered()) {
            $this->addMessageSuccess(Messages::CUSTOMER_REGISTRATION_CONFIRMED);

            return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_HOME);
        }
        $this->addMessageError(Messages::CUSTOMER_REGISTRATION_TIMEOUT);

        return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_HOME);
    }
}
