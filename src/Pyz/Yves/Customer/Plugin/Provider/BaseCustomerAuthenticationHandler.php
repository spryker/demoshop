<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Customer\Plugin\Provider;

use Pyz\Yves\Application\Plugin\Provider\ApplicationControllerProvider;
use Spryker\Yves\Kernel\AbstractPlugin;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Spryker\Client\Customer\CustomerClientInterface getClient()
 * @method \Pyz\Yves\Customer\CustomerFactory getFactory()
 * @method \Pyz\Yves\Customer\CustomerConfig getConfig()
 */
class BaseCustomerAuthenticationHandler extends AbstractPlugin
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    protected function createRefererRedirectResponse(Request $request)
    {
        $targetUrl = $this->filterUrl(
            $request->headers->get('Referer'),
            $this->getConfig()->getYvesHost(),
            $this->getHomeUrl()
        );

        $response = $this->getFactory()->createRedirectResponse($targetUrl);

        return $response;
    }

    /**
     * @param string|null $refererUrl
     * @param string $allowedHost
     * @param string $fallbackUrl
     *
     * @return null|string
     */
    protected function filterUrl($refererUrl, $allowedHost, $fallbackUrl)
    {
        if ($refererUrl === null) {
            return $fallbackUrl;
        }

        $allowedUrl = sprintf('#^(?P<scheme>http|https)://%s/(?P<uri>.*)#', $allowedHost);
        $isRefererUrlAllowed = (bool)preg_match($allowedUrl, $refererUrl, $matches);
        if ($isRefererUrlAllowed) {
            return sprintf('%s://%s/%s', $matches['scheme'], $allowedHost, $matches['uri']);
        }

        return $fallbackUrl;
    }

    /**
     * @return string
     */
    protected function getHomeUrl()
    {
        return $this->getFactory()->getApplication()->url(ApplicationControllerProvider::ROUTE_HOME);
    }
}
