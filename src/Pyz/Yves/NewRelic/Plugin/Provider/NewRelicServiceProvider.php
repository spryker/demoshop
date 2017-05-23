<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\NewRelic\Plugin\Provider;

use Pyz\Yves\Application\Plugin\Provider\AbstractServiceProvider;
use Silex\Application;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * @method \Pyz\Yves\NewRelic\NewRelicFactory getFactory()
 */
class NewRelicServiceProvider extends AbstractServiceProvider
{

    /**
     * @var \Spryker\Shared\NewRelicApi\NewRelicApiInterface
     */
    protected $newRelicApi;

    public function __construct()
    {
        $this->newRelicApi = $this->getFactory()->createNewRelicApi();
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
     * @param \Silex\Application $app
     *
     * @return void
     */
    public function boot(Application $app)
    {
        $app['dispatcher']->addListener(KernelEvents::CONTROLLER, [$this, 'onKernelController'], -255);
    }

    /**
     * @param \Symfony\Component\HttpKernel\Event\FilterControllerEvent $event
     *
     * @return void
     */
    public function onKernelController(FilterControllerEvent $event)
    {
        $this->setNewRelicTransactionName($event->getRequest());
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return void
     */
    protected function setNewRelicTransactionName(Request $request)
    {
        $transactionName = $request->attributes->get('_route');
        $host = $request->server->get('COMPUTERNAME', $this->getFactory()->getUtilNetworkService()->getHostname());
        $requestUri = $request->getRequestUri();

        $this->newRelicApi->setNameOfTransaction($transactionName)
            ->addCustomParameter('request_uri', $requestUri)
            ->addCustomParameter('host', $host);

        if (strpos($transactionName, 'system/heartbeat') !== false) {
            $this->newRelicApi->markIgnoreTransaction();
        }
    }

}
