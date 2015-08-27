<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Application\Communication\Plugin\ServiceProvider;

use SprykerFeature\Shared\Library\System;
use Silex\ServiceProviderInterface;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use SprykerFeature\Shared\Lumberjack\Code\Lumberjack;
use SprykerFeature\Shared\Lumberjack\Code\Log\Types;

class YvesLoggingServiceProvider implements ServiceProviderInterface
{

    /**
     * Registers services on the given app.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Application $app An Application instance
     */
    public function register(Application $app)
    {
    }

    /**
     * Bootstraps the application.
     *
     * This method is called after all services are registered
     * and should be used for "dynamic" configuration (whenever
     * a service must be requested).
     */
    public function boot(Application $app)
    {
    }

    /**
     * Handles controller requests
     *
     * @param FilterControllerEvent $event The event to handle
     */
    public function onKernelController(FilterControllerEvent $event)
    {
        $this->logRequest($event->getRequest());
        $this->setNewRelicTransactionName($event->getRequest());
    }

    /**
     * @param Request $request
     */
    protected function logRequest(Request $request)
    {
        $route = $request->attributes->get('_route', 'unknown');
        Lumberjack::setRoute($route);

        if (false !== strpos($route, 'system/heartbeat') ) {
            return;
        }

        $sessionId = substr(session_id(), 0, 4);
        $lumberjack = Lumberjack::getInstance();
        $lumberjack->addHttpUserAgent();
        $lumberjack->addField('params.post', $request->request->all());
        $lumberjack->addField('params.get', $request->query->all());
        $lumberjack->send(Types::REQUEST, 'User ' . $sessionId . ' on /' . $route, $request->getMethod());
    }

    /**
     * @param Request $request
     */
    protected function setNewRelicTransactionName(Request $request)
    {
        $transactionName = $request->attributes->get('_route');
        $host = $request->server->get('COMPUTERNAME', System::getHostname());
        $requestUri = $request->getRequestUri();

        $newrelic = \SprykerFeature_Shared_Library_NewRelic_Api::getInstance();
        $newrelic->setNameOfTransaction($transactionName)
            ->addCustomParameter('request_uri', $requestUri)
            ->addCustomParameter('host', $host);

        if (false !== strpos($transactionName, 'system/heartbeat')) {
            $newrelic->markIgnoreTransaction();
        }
    }

}
