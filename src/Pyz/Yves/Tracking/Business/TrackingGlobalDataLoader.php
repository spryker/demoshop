<?php

namespace Pyz\Yves\Tracking\Business;

use Generated\Shared\Transfer\CustomerInfoTransfer;
use Pyz\Client\Customer\Service\Session\CustomerSession;
use Pyz\Yves\Tracking\Business\Tracking;
use SprykerEngine\Shared\Application\Communication\Application;
use SprykerEngine\Shared\Kernel\Store;
use SprykerFeature\Shared\Library\Environment;

class TrackingGlobalDataLoader
{
    /**
     * @var Application
     */
    protected $app;

    /**
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * @return Tracking
     */
    public function getTrackingContainer()
    {
        $trackingContainer = Tracking::getInstance();

        if ($this->getRequest()->isXmlHttpRequest()) {
            return $trackingContainer;
        }

        $trackingContainer->getGlobalDataContainer()
            ->setLanguage($this->app['locale'])
            ->setUrlPath($this->getCurrentUrlPath())
            ->setReferer($this->getReferer())
            ->setTimestamp(time())
            ->setSessionId($this->getSessionId())
            ->setUserAgent($this->getUserAgent())
            ->setEnvironment(Environment::getEnvironment())
            ->setStore(Store::getInstance()->getStoreName())
        ;

        $customer = $this->getCustomer();
        $clientId = $customer ? $customer->getUsername() : null;
        $isLoggedIn = ($clientId !== null);

        if ($isLoggedIn) {
            $trackingContainer->getGlobalDataContainer()
                ->setClientId($clientId)
                ->setIsLoggedIn($isLoggedIn)
                ->setIsReturningCustomer($this->getIsReturningCustomer())
            ;
        }
        return $trackingContainer;
    }

    /**
     * @return string
     */
    protected function getSessionId()
    {
        return $this->getSession()->getId();
    }

    /**
     * @return bool
     */
    protected function getIsReturningCustomer()
    {
        return $this->getCustomerInfo()->getIsReturning();
    }

    /**
     * @return CustomerInfoTransfer
     */
    protected function getCustomerInfo()
    {
        return $this->getSession()->get(CustomerSession::SESSION_INFO_KEY, new CustomerInfoTransfer());
    }

    /**
     * @return string|null
     */
    protected function getUserAgent()
    {
        return $this->getHeaders()->get('user-agent', null);
    }

    /**
     * @return string|null
     */
    protected function getReferer()
    {
        return $this->getHeaders()->get('referer', null);
    }

    /**
     * @return string
     */
    protected function getCurrentUrlPath()
    {
        return $this->getRequest()->getUri();
    }

    /**
     * @return \Symfony\Component\HttpFoundation\HeaderBag
     */
    protected function getHeaders()
    {
        return $this->headers = $this->getRequest()->headers;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Request
     */
    protected function getRequest()
    {
        return $this->app[Application::REQUEST];
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Session\Session
     */
    protected function getSession()
    {
        return $this->app['session'];
    }

    /**
     * @return null|\Symfony\Component\Security\Core\User\User
     */
    protected function getCustomer()
    {
        /** @var \Symfony\Component\Security\Core\SecurityContext $securityContext */
        $securityContext = $this->app['security'];
        if (!$securityContext) {
            return null;
        }

        /** @var \Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken $token */
        $token = $securityContext->getToken();
        if ($token === null) {
            return null;
        }

        $user = $token->getUser();
        if ($user === 'anon.') {
            return null;
        }

        return $user;
    }
}
