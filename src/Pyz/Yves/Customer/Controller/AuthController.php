<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Customer\Controller;

use Pyz\Yves\Customer\Plugin\Provider\CustomerControllerProvider;
use Symfony\Component\HttpFoundation\Request;

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

        $loginForm = $this->getFactory()->createLoginForm();
        $registerForm = $this->getFactory()->createRegisterForm();

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
