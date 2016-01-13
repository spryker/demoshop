<?php

namespace Pyz\Yves\NewRelic\Plugin\Provider;

use Pyz\Yves\Application\Plugin\Provider\AbstractServiceProvider;
use Pyz\Yves\NewRelic\NewRelicFactory;
use Silex\Application;
use Spryker\Shared\Library\System;
use Spryker\Shared\NewRelic\ApiInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * @method NewRelicFactory getFactory()
 */
class NewRelicServiceProvider extends AbstractServiceProvider
{

    /**
     * @var ApiInterface
     */
    protected $newRelicApi;

    public function __construct()
    {
        $this->newRelicApi = $this->getFactory()->createNewRelicApi();
    }

    /**
     * @param Application $app
     *
     * @return void
     */
    public function register(Application $app)
    {
    }

    /**
     * @param Application $app
     *
     * @return void
     */
    public function boot(Application $app)
    {
        $app['dispatcher']->addListener(KernelEvents::CONTROLLER, [$this, 'onKernelController'], -255);
    }

    /**
     * @param FilterControllerEvent $event
     *
     * @return void
     */
    public function onKernelController(FilterControllerEvent $event)
    {
        $this->setNewRelicTransactionName($event->getRequest());
    }

    /**
     * @param Request $request
     *
     * @return void
     */
    protected function setNewRelicTransactionName(Request $request)
    {
        $transactionName = $request->attributes->get('_route');
        $host = $request->server->get('COMPUTERNAME', System::getHostname());
        $requestUri = $request->getRequestUri();

        $this->newRelicApi->setNameOfTransaction($transactionName)
            ->addCustomParameter('request_uri', $requestUri)
            ->addCustomParameter('host', $host);

        if (strpos($transactionName, 'system/heartbeat') !== false) {
            $this->newRelicApi->markIgnoreTransaction();
        }
    }
}
