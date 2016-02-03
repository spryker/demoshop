<?php

namespace Pyz\Yves\Customer\Controller;

use Pyz\Yves\Customer\CustomerFactory;
use Pyz\Yves\Customer\Plugin\Provider\CustomerControllerProvider;
use Spryker\Client\Customer\CustomerClientInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * @method \Pyz\Yves\Customer\CustomerFactory getFactory()
 * @method \Spryker\Client\Customer\CustomerClientInterface getClient()
 */
class AuthController extends AbstractCustomerController
{

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function loginAction(Request $request)
    {
        if ($this->isLoggedInCustomer()) {
            return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_OVERVIEW);
        }

        $loginForm = $this->buildForm(
            $this->getFactory()->createFormLogin()
        );
        $registerForm = $this->buildForm(
            $this->getFactory()->createFormRegister()
        );

        return [
            'loginForm' => $loginForm->createView(),
            'registerForm' => $registerForm->createView(),
            'hasAuthError' => $this->hasAuthError($request),
        ];
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return bool
     */
    protected function hasAuthError(Request $request)
    {
        return ($this->getSecurityError($request) !== null);
    }

}
