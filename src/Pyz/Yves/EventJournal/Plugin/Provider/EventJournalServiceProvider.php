<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\EventJournal\Plugin\Provider;

use DateTime;
use Pyz\Yves\Application\Plugin\Provider\AbstractServiceProvider;
use Silex\Application;
use Spryker\Client\EventJournal\Event;
use Spryker\Service\UtilNetwork\UtilNetworkService;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Config\Config;

use Spryker\Shared\Session\SessionConstants;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * @method \Pyz\Yves\EventJournal\EventJournalFactory getFactory()
 */
class EventJournalServiceProvider extends AbstractServiceProvider
{

    const COOKIE_HASH_ALGORITHM = 'sha256';

    /**
     * @var \Spryker\Client\EventJournal\EventJournalClientInterface
     */
    protected $eventJournal;

    public function __construct()
    {
        $this->eventJournal = $this->getFactory()->createEventJournalClient();
    }

    /**
     * @param \Silex\Application $app
     *
     * @return void
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
     *
     * @param \Silex\Application $app
     *
     * @return void
     */
    public function boot(Application $app)
    {
        $this->setDeviceIdCookie($app);
        $this->setVisitIdCookie($app);
        $app['dispatcher']->addListener(KernelEvents::CONTROLLER, [$this, 'onKernelController'], -255);
    }

    /**
     * Handles controller requests
     *
     * @param \Symfony\Component\HttpKernel\Event\FilterControllerEvent $event The event to handle
     *
     * @return void
     */
    public function onKernelController(FilterControllerEvent $event)
    {
        $this->setStaticRequestInformation($event->getRequest());
        $this->logRequest($event->getRequest());
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return void
     */
    protected function logRequest(Request $request)
    {
        $route = $request->attributes->get('_route', 'unknown');
        // do not log the loadbalancer-heartbeat
        if (strpos($route, 'system/heartbeat') !== false) {
            return;
        }

        $this->logEvent($request);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return void
     */
    protected function logEvent(Request $request)
    {
        $event = new Event();
        $event->setField(Event::FIELD_NAME, 'request');
        $this->eventJournal->saveEvent($event);
    }

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    private function setDeviceIdCookie(Application $app)
    {
        $this->setTrackingCookie(
            $app,
            Config::get(ApplicationConstants::YVES_COOKIE_DEVICE_ID_NAME),
            Config::get(ApplicationConstants::YVES_COOKIE_DEVICE_ID_VALID_FOR)
        );
    }

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    private function setVisitIdCookie(Application $app)
    {
        $this->setTrackingCookie(
            $app,
            Config::get(ApplicationConstants::YVES_COOKIE_VISITOR_ID_NAME),
            Config::get(ApplicationConstants::YVES_COOKIE_VISITOR_ID_VALID_FOR)
        );
    }

    /**
     * @param \Silex\Application $app
     * @param string $cookieName
     * @param string $validFor
     *
     * @return void
     */
    private function setTrackingCookie(Application $app, $cookieName, $validFor)
    {
        // An unsafe value might have been set in browser by JS or XSS, it should be replaced with a safe one.
        if (empty($_COOKIE[$cookieName]) || !$this->isTrackingValueSafe($_COOKIE[$cookieName])) {
            $utilNetworkService = new UtilNetworkService();
            // uniqid is based on current timestamp, a server ID should be used to prevent 2 servers generating the same ID for 2 simultaneous requests.
            $_COOKIE[$cookieName] = hash(static::COOKIE_HASH_ALGORITHM, uniqid($utilNetworkService->getHostName(), true));
        }
        $dt = new DateTime();
        $app['cookies'][] = new Cookie(
            $cookieName,
            $_COOKIE[$cookieName],
            $dt->modify($validFor),
            '/',
            Config::get(SessionConstants::YVES_SESSION_COOKIE_DOMAIN),
            Config::get(SessionConstants::YVES_SESSION_COOKIE_SECURE, true)
        );
    }

    /**
     * @param string $trackingValue
     *
     * @return bool
     */
    protected function isTrackingValueSafe($trackingValue)
    {
        return ctype_xdigit($trackingValue);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return void
     */
    protected function setStaticRequestInformation(Request $request)
    {
        $event = new Event();
        if (is_string($request->attributes->get('_controller'))) {
            $event->setStaticField('controller', $request->attributes->get('_controller'));
        }
        if (is_string($request->attributes->get('_route'))) {
            $event->setStaticField('route', $request->attributes->get('_route'));
        }
    }

}
