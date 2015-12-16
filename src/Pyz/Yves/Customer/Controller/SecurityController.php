<?php

namespace Pyz\Yves\Customer\Controller;

use Pyz\Yves\Customer\CustomerFactory;
use Pyz\Yves\Customer\Plugin\Provider\CustomerControllerProvider;
use Spryker\Yves\Application\Controller\AbstractController;
use Spryker\Client\Customer\CustomerClientInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Spryker\Shared\Customer\Code\Messages;
use Generated\Shared\Transfer\CustomerTransfer;

/**
 * @method CustomerFactory getFactory()
 * @method CustomerClientInterface getClient()
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
        $customerTransfer = new CustomerTransfer();
        $customerTransfer->setEmail($this->getUsername());
        $this->getClient()->logout($customerTransfer);

        return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_HOME);
    }

    /**
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function registerAction(Request $request)
    {
        $form = $this
            ->buildForm($this->getFactory()->createFormRegister())
            ->handleRequest($request);

        if ($form->isValid()) {
            $customerTransfer = new CustomerTransfer();
            $customerTransfer->fromArray($form->getData());
            $customerTransfer = $this->getClient()->registerCustomer($customerTransfer);
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
        $customerTransfer = $this->getClient()->confirmRegistration($customerTransfer);
        if ($customerTransfer->getRegistered()) {
            $this->addMessageSuccess(Messages::CUSTOMER_REGISTRATION_CONFIRMED);

            return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_HOME);
        }
        $this->addMessageError(Messages::CUSTOMER_REGISTRATION_TIMEOUT);

        return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_HOME);
    }

}
