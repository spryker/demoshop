<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\EventJournal\Plugin\Provider;

use Pyz\Yves\EventJournal\EventJournalDependencyContainer;
use Silex\Application;
use Silex\ServiceProviderInterface;
use Spryker\Client\EventJournal\Event;
use Spryker\Client\EventJournal\EventJournalClientInterface;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Config;
use Spryker\Yves\Kernel\AbstractPlugin;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * @method EventJournalDependencyContainer getDependencyContainer()
 */
class EventJournalServiceProvider extends AbstractPlugin implements ServiceProviderInterface
{

    /**
     * @var EventJournalClientInterface
     */
    protected $eventJournal;

    public function __construct()
    {
        $this->eventJournal = $this->getDependencyContainer()->createEventJournalClient();
    }

    /**
     * @param Application $app
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
     * @param Application $app
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
     * @param FilterControllerEvent $event The event to handle
     *
     * @return void
     */
    public function onKernelController(FilterControllerEvent $event)
    {
        $this->setStaticRequestInformation($event->getRequest());
        $this->logRequest($event->getRequest());
    }

    /**
     * @param Request $request
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
     * @param Request $request
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
     * @param Application $app
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
     * @param Application $app
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
     * @param Application $app
     * @param $cookieName
     * @param $validFor
     *
     * @return void
     */
    private function setTrackingCookie(Application $app, $cookieName, $validFor) {
        if (empty($_COOKIE[$cookieName])) {
            $_COOKIE[$cookieName] = sha1(uniqid('', true));
        }
        $dt = new \DateTime();
        $app['cookies'][] = new Cookie(
            $cookieName,
            $_COOKIE[$cookieName],
            $dt->modify($validFor),
            '/',
            Config::get(ApplicationConstants::YVES_COOKIE_DOMAIN)
        );
    }

    /**
     * @param Request $request
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
