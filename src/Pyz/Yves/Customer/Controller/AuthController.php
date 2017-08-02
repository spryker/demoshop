<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Customer\Controller;

use Pyz\Yves\Customer\Plugin\Provider\CustomerControllerProvider;

/**
 * @method \Pyz\Yves\Customer\CustomerFactory getFactory()
 * @method \Spryker\Client\Customer\CustomerClientInterface getClient()
 */
class AuthController extends AbstractCustomerController
{

    /**
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function loginAction()
    {
        if ($this->isLoggedInCustomer()) {
            return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_OVERVIEW);
        }

        $loginForm = $this
            ->getFactory()
            ->createCustomerFormFactory()
            ->createLoginForm();
        $registerForm = $this
            ->getFactory()
            ->createCustomerFormFactory()
            ->createRegisterForm();

        return [
            'loginForm' => $loginForm->createView(),
            'registerForm' => $registerForm->createView(),
        ];
    }

}
