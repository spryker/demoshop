<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Customer\Plugin\Provider;

use Generated\Shared\Transfer\CustomerTransfer;
use Pyz\Yves\Application\Plugin\Provider\ApplicationControllerProvider;
use Spryker\Yves\Kernel\AbstractPlugin;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

/**
 * @method \Spryker\Client\Customer\CustomerClientInterface getClient()
 * @method \Pyz\Yves\Customer\CustomerFactory getFactory()
 * @method \Pyz\Yves\Customer\CustomerConfig getConfig()
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
    protected function determineTargetUrl(Request $request)
    {
        $refererUrl = $request->headers->get('Referer');
        if ($refererUrl !== null && $this->isYvesDomain($refererUrl)) {
            return $refererUrl;
        }

        return $this->getHomeUrl();
    }

    /**
     * @param string $url
     *
     * @return bool
     */
    protected function isYvesDomain($url)
    {
        $acceptedDomain = sprintf('#^(http|https)://%s/#', $this->getConfig()->getYvesHost());

        return (bool)preg_match($acceptedDomain, $url);
    }

    /**
     * @return string
     */
    protected function getHomeUrl()
    {
        return $this->getFactory()->getApplication()->url(ApplicationControllerProvider::ROUTE_HOME);
    }
}
