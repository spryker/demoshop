<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Customer\Plugin\Provider;

use Generated\Shared\Transfer\CustomerTransfer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

/**
 * @method \Spryker\Client\Customer\CustomerClientInterface getClient()
 */
class CustomerAuthenticationSuccessHandler extends BaseCustomerAuthenticationHandler implements AuthenticationSuccessHandlerInterface
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Symfony\Component\Security\Core\Authentication\Token\TokenInterface $token
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        /** @var \Pyz\Yves\Customer\Security\Customer $customer */
        $customer = $token->getUser();
        $this->setCustomerSession($customer->getCustomerTransfer());

        return $this->createRefererRedirectResponse($request);
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return void
     */
    protected function setCustomerSession(CustomerTransfer $customerTransfer)
    {
        $this->getClient()->setCustomer($customerTransfer);
    }
}
