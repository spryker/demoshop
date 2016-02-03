<?php

namespace Pyz\Yves\Customer\Plugin\Provider;

use Generated\Shared\Transfer\CustomerTransfer;
use Pyz\Yves\Application\Plugin\Provider\ApplicationControllerProvider;
use Pyz\Yves\Customer\CustomerFactory;
use Spryker\Client\Customer\CustomerClientInterface;
use Spryker\Yves\Kernel\AbstractPlugin;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

/**
 * @method \Spryker\Client\Customer\CustomerClientInterface getClient()
 * @method \Pyz\Yves\Customer\CustomerFactory getFactory()
 */
class CustomerAuthenticationSuccessHandler extends AbstractPlugin implements AuthenticationSuccessHandlerInterface
{

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Symfony\Component\Security\Core\Authentication\Token\TokenInterface $token
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        $this->setCustomerSession($token->getUser()->getCustomerTransfer());

        $response = $this->createRedirectResponse($request);

        return $response;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customer
     *
     * @return void
     */
    protected function setCustomerSession(CustomerTransfer $customer)
    {
        $this->getClient()->setCustomer($customer);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    protected function createRedirectResponse(Request $request)
    {
        $targetUrl = $this->determineTargetUrl($request);

        $response = $this->getFactory()->createRedirectResponse($targetUrl);

        return $response;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return string
     */
    protected function determineTargetUrl($request)
    {
        if ($request->headers->has('Referer')) {
            return $request->headers->get('Referer');
        }

        return ApplicationControllerProvider::ROUTE_HOME;
    }

}
