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
 * @method CustomerClientInterface getClient()
 * @method CustomerFactory getFactory()
 */
class CustomerAuthenticationSuccessHandler extends AbstractPlugin implements AuthenticationSuccessHandlerInterface
{

    /**
     * @param Request $request
     * @param TokenInterface $token
     *
     * @return Response
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        $this->setCustomerSession($token->getUser()->getCustomerTransfer());

        $response = $this->createRedirectResponse($request);

        return $response;
    }

    /**
     * @param CustomerTransfer $customer
     *
     * @return void
     */
    protected function setCustomerSession(CustomerTransfer $customer)
    {
        $this->getClient()->setCustomer($customer);
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse
     */
    protected function createRedirectResponse(Request $request)
    {
        $targetUrl = $this->determineTargetUrl($request);

        $response = $this->getFactory()->createRedirectResponse($targetUrl);

        return $response;
    }

    /**
     * @param Request $request
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
