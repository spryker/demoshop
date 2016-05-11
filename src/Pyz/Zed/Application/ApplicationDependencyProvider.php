<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Application;

use Silex\Provider\SessionServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\WebProfilerServiceProvider;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Config\Config;
use Spryker\Zed\Acl\Communication\Plugin\Bootstrap\AclBootstrapProvider;
use Spryker\Zed\Application\ApplicationDependencyProvider as SprykerApplicationDependencyProvider;
use Spryker\Zed\Application\Communication\Plugin\ServiceProvider\DateFormatterServiceProvider;
use Spryker\Zed\Application\Communication\Plugin\ServiceProvider\EnvironmentInformationServiceProvider;
use Spryker\Zed\Application\Communication\Plugin\ServiceProvider\SubRequestServiceProvider;
use Spryker\Zed\Application\Communication\Plugin\ServiceProvider\TranslationServiceProvider;
use Spryker\Zed\Application\Communication\Plugin\ServiceProvider\TwigServiceProvider as SprykerTwigServiceProvider;
use Spryker\Zed\Assertion\Communication\Plugin\ServiceProvider\AssertionServiceProvider;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Log\Communication\Plugin\ServiceProvider\LogServiceProvider;
use Spryker\Zed\Price\Communication\Plugin\ServiceProvider\PriceServiceProvider;
use Spryker\Zed\Session\Communication\Plugin\ServiceProvider\SessionServiceProvider as SprykerSessionServiceProvider;
use Spryker\Zed\User\Communication\Plugin\ServiceProvider\UserServiceProvider;

class ApplicationDependencyProvider extends SprykerApplicationDependencyProvider
{

    const SERVICE_PROVIDER = 'SERVICE_PROVIDER';
    const INTERNAL_CALL_SERVICE_PROVIDER = 'INTERNAL_CALL_SERVICE_PROVIDER';

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

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @throws \Exception
     * @return \Silex\ServiceProviderInterface[]
     */
    protected function getServiceProvider(Container $container)
    {
        $coreProviders = parent::getServiceProvider($container);

        $providers = [
            new LogServiceProvider(),
            new SessionServiceProvider(),
            $this->getSessionServiceProvider($container),
            new AclBootstrapProvider(),
            new TwigServiceProvider(),
            new SprykerTwigServiceProvider(),
            new EnvironmentInformationServiceProvider(),
            $this->getGatewayServiceProvider(),
            new AssertionServiceProvider(),
            new UserServiceProvider($container),
            new PriceServiceProvider(),
            new DateFormatterServiceProvider(),
            new TranslationServiceProvider(),
            new SubRequestServiceProvider(),
        ];

        if (Config::get(ApplicationConstants::ENABLE_WEB_PROFILER, false)) {
            $providers[] = new WebProfilerServiceProvider();
        }

        return array_merge($providers, $coreProviders);
    }

    /**
     * @return \Spryker\Zed\Library\Twig\TwigFunctionInterface[]
     */
    protected function getTwigFunctions()
    {
        // here you can add or replace service providers
        return parent::getTwigFunctions();
    }

    /**
     * @return \Spryker\Zed\Library\Twig\TwigFilterInterface[]
     */
    protected function getTwigFilters()
    {
        // here you can add or replace service providers
        return parent::getTwigFilters();
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
        // here you can add or replace service providers
        return parent::getGatewayServiceProvider();
    }

}
