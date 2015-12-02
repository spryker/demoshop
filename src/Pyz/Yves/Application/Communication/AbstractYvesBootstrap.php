<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Application\Communication;

use Generated\Yves\Ide\AutoCompletion;
use Silex\ServiceProviderInterface;
use SprykerEngine\Shared\Application\Communication\Application;
use SprykerEngine\Yves\Application\Communication\Application as YvesApplication;
use SprykerEngine\Yves\Application\Communication\Plugin\ControllerProviderInterface;
use SprykerEngine\Yves\Kernel\Locator;
use Symfony\Component\Routing\RouterInterface;

// FIXME: #688 move this class into core
abstract class AbstractYvesBootstrap
{
    /**
     * @var YvesApplication
     */
    protected $application;

    public function __construct()
    {
        $this->application = new YvesApplication();
    }

    /**
     * @return Application
     */
    public function boot()
    {
        $this->registerServiceProviders($this->getServiceProviders());

        $this->registerRouters($this->getRouters());

        $this->registerControllerProviders($this->getControllerProviders());

        return $this->application;
    }

    /**
     * @return ServiceProviderInterface[]
     */
    abstract protected function getServiceProviders();

    /**
     * @return RouterInterface[]
     */
    abstract protected function getRouters();

    /**
     * @return ControllerProviderInterface[]
     */
    abstract protected function getControllerProviders();

    /**
     * @return AutoCompletion
     */
    protected function getLocator()
    {
        return Locator::getInstance();
    }

    /**
     * @param ServiceProviderInterface[] $serviceProviders
     *
     * @return void
     */
    private function registerServiceProviders(array $serviceProviders)
    {
        foreach ($serviceProviders as $provider) {
            $this->application->register($provider);
        }
    }

    /**
     * @param RouterInterface[] $routers
     *
     * @return void
     */
    private function registerRouters(array $routers)
    {
        foreach ($routers as $router) {
            $this->application->addRouter($router);
        }
    }

    /**
     * @param ControllerProviderInterface[] $controllerProviders
     *
     * @return void
     */
    private function registerControllerProviders(array $controllerProviders)
    {
        foreach ($controllerProviders as $controllerProvider) {
            $this->application->mount($controllerProvider->getUrlPrefix(), $controllerProvider);
        }
    }

}
