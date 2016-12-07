<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\NewRelic\Plugin\Provider;

use Pyz\Yves\Application\Plugin\Provider\AbstractServiceProvider;
use Silex\Application;
use Spryker\Shared\Kernel\Store;
use Spryker\Shared\Library\System;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;

/**
 * @method \Pyz\Yves\NewRelic\NewRelicFactory getFactory()
 */
class NewRelicServiceProvider extends AbstractServiceProvider
{

    /**
     * @var \Spryker\Shared\NewRelic\NewRelicApiInterface
     */
    protected $newRelicApi;

    /**
     * @return \Spryker\Shared\NewRelic\NewRelicApiInterface
     */
    public function getNewRelicApi()
    {
        if ($this->newRelicApi === null) {
            $this->newRelicApi = $this->getFactory()->createNewRelicApi();
        }

        return $this->newRelicApi;
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
        //$app['dispatcher']->addListener(KernelEvents::CONTROLLER, [$this, 'onKernelController'], -255);

        $app->before(function (Request $request) {
            $module = $request->attributes->get('module');
            $controller = $request->attributes->get('controller');
            $action = $request->attributes->get('action');
            $transactionName = $module . '/' . $controller . '/' . $action;

            $requestUri = array_key_exists('REQUEST_URI', $_SERVER) ? $_SERVER['REQUEST_URI'] : 'unknown';

            $host = isset($_SERVER['COMPUTERNAME']) ? $_SERVER['COMPUTERNAME'] : System::getHostname();

            $store = Store::getInstance();

            $this->getNewRelicApi()->setNameOfTransaction($transactionName);
            $this->getNewRelicApi()->addCustomParameter('request_uri', $requestUri);
            $this->getNewRelicApi()->addCustomParameter('host', $host);
            $this->getNewRelicApi()->addCustomParameter('store', $store->getStoreName());
            $this->getNewRelicApi()->addCustomParameter('locale', $store->getCurrentLocale());

            if (strpos($transactionName, 'system/heartbeat') !== false) {
                $this->newRelicApi->markIgnoreTransaction();
            }
        });
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
