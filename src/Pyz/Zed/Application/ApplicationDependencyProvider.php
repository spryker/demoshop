<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Application;

use Pyz\Shared\Application\Plugin\Provider\WebProfilerServiceProvider;
use Pyz\Yves\NewRelic\Plugin\Provider\NewRelicServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Spryker\Shared\Application\ServiceProvider\FormFactoryServiceProvider;
use Spryker\Zed\Acl\Communication\Plugin\Bootstrap\AclBootstrapProvider;
use Spryker\Zed\Application\ApplicationDependencyProvider as SprykerApplicationDependencyProvider;
use Spryker\Zed\Application\Communication\Plugin\ServiceProvider\EnvironmentInformationServiceProvider;
use Spryker\Zed\Application\Communication\Plugin\ServiceProvider\MvcRoutingServiceProvider;
use Spryker\Zed\Application\Communication\Plugin\ServiceProvider\RequestServiceProvider;
use Spryker\Zed\Application\Communication\Plugin\ServiceProvider\RoutingServiceProvider;
use Spryker\Zed\Application\Communication\Plugin\ServiceProvider\SilexRoutingServiceProvider;
use Spryker\Zed\Application\Communication\Plugin\ServiceProvider\SslServiceProvider;
use Spryker\Zed\Application\Communication\Plugin\ServiceProvider\SubRequestServiceProvider;
use Spryker\Zed\Application\Communication\Plugin\ServiceProvider\TwigServiceProvider as SprykerTwigServiceProvider;
use Spryker\Zed\Application\Communication\Plugin\ServiceProvider\ZedHstsServiceProvider;
use Spryker\Zed\Assertion\Communication\Plugin\ServiceProvider\AssertionServiceProvider;
use Spryker\Zed\Auth\Communication\Plugin\Bootstrap\AuthBootstrapProvider;
use Spryker\Zed\Currency\Communication\Plugin\ServiceProvider\TwigCurrencyServiceProvider;
use Spryker\Zed\Kernel\Communication\Plugin\GatewayControllerListenerPlugin;
use Spryker\Zed\Kernel\Communication\Plugin\GatewayServiceProviderPlugin;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Log\Communication\Plugin\ServiceProvider\LogServiceProvider;
use Spryker\Zed\Money\Communication\Plugin\ServiceProvider\TwigMoneyServiceProvider;
use Spryker\Zed\Propel\Communication\Plugin\ServiceProvider\PropelServiceProvider;
use Spryker\Zed\Session\Communication\Plugin\ServiceProvider\SessionServiceProvider as SprykerSessionServiceProvider;
use Spryker\Zed\User\Communication\Plugin\ServiceProvider\UserServiceProvider;

class ApplicationDependencyProvider extends SprykerApplicationDependencyProvider
{

    const SERVICE_PROVIDER = 'SERVICE_PROVIDER';
    const INTERNAL_CALL_SERVICE_PROVIDER = 'INTERNAL_CALL_SERVICE_PROVIDER';
    const INTERNAL_CALL_SERVICE_PROVIDER_WITH_AUTHENTICATION = 'INTERNAL_CALL_SERVICE_PROVIDER_WITH_AUTHENTICATION';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideCommunicationLayerDependencies(Container $container)
    {
        $container[self::SERVICE_PROVIDER] = function (Container $container) {
            return $this->getServiceProvider($container);
        };

        $container[self::INTERNAL_CALL_SERVICE_PROVIDER] = function (Container $container) {
            return $this->getInternalCallServiceProvider($container);
        };

        $container[self::INTERNAL_CALL_SERVICE_PROVIDER_WITH_AUTHENTICATION] = function (Container $container) {
            return $this->getInternalCallServiceProviderWithAuthentication($container);
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Silex\ServiceProviderInterface[]
     */
    protected function getServiceProvider(Container $container)
    {
        $coreProviders = parent::getServiceProvider($container);

        $providers = [
            new NewRelicServiceProvider(),
            new LogServiceProvider(),
            new SessionServiceProvider(),
            $this->getSessionServiceProvider($container),
            new SslServiceProvider(),
            new AuthBootstrapProvider(),
            new AclBootstrapProvider(),
            new TwigServiceProvider(),
            new SprykerTwigServiceProvider(),
            new EnvironmentInformationServiceProvider(),
            $this->getGatewayServiceProvider(),
            new AssertionServiceProvider(),
            new UserServiceProvider($container),
            new TwigMoneyServiceProvider(),
            new SubRequestServiceProvider(),
            new WebProfilerServiceProvider(),
            new ZedHstsServiceProvider(),
            new FormFactoryServiceProvider(),
            new TwigCurrencyServiceProvider(),
        ];

        $providers = array_merge($providers, $coreProviders);

        return $providers;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return array
     */
    protected function getInternalCallServiceProvider(Container $container)
    {
        return [
            new LogServiceProvider(),
            new PropelServiceProvider(),
            new RequestServiceProvider(),
            new SslServiceProvider(),
            new ServiceControllerServiceProvider(),
            new RoutingServiceProvider(),
            new MvcRoutingServiceProvider(),
            new SilexRoutingServiceProvider(),
            $this->getGatewayServiceProvider(),
            new NewRelicServiceProvider(),
            new HttpFragmentServiceProvider(),
            new SubRequestServiceProvider(),
            new TwigServiceProvider(),
            new SprykerTwigServiceProvider(),
        ];
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return array
     */
    protected function getInternalCallServiceProviderWithAuthentication(Container $container)
    {
        return [
            new LogServiceProvider(),
            new PropelServiceProvider(),
            new RequestServiceProvider(),
            new SessionServiceProvider(),
            $this->getSessionServiceProvider($container),
            new SslServiceProvider(),
            new AuthBootstrapProvider(),
            new AclBootstrapProvider(),
            new ServiceControllerServiceProvider(),
            new RoutingServiceProvider(),
            new MvcRoutingServiceProvider(),
            new SilexRoutingServiceProvider(),
            $this->getGatewayServiceProvider(),
            new HttpFragmentServiceProvider(),
            new SubRequestServiceProvider(),
            new TwigServiceProvider(),
            new SprykerTwigServiceProvider(),
        ];
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Session\Communication\Plugin\ServiceProvider\SessionServiceProvider
     */
    protected function getSessionServiceProvider(Container $container)
    {
        $sessionServiceProvider = new SprykerSessionServiceProvider();
        $sessionServiceProvider->setClient(
            $container->getLocator()->session()->client()
        );

        return $sessionServiceProvider;
    }

    /**
     * @return \Spryker\Zed\Kernel\Communication\Plugin\GatewayServiceProviderPlugin
     */
    protected function getGatewayServiceProvider()
    {
        $controllerListener = new GatewayControllerListenerPlugin();
        $serviceProvider = new GatewayServiceProviderPlugin();
        $serviceProvider->setControllerListener($controllerListener);

        return $serviceProvider;
    }

}
