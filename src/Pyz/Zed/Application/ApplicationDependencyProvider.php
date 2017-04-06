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

use Spryker\Service\UtilDateTime\ServiceProvider\DateTimeFormatterServiceProvider;

use Spryker\Shared\Application\ServiceProvider\FormFactoryServiceProvider;
use Spryker\Shared\Config\Environment;
use Spryker\Shared\ErrorHandler\Plugin\ServiceProvider\WhoopsErrorHandlerServiceProvider;
use Spryker\Zed\Acl\Communication\Plugin\Bootstrap\AclBootstrapProvider;
use Spryker\Zed\Api\Communication\Plugin\ApiControllerListenerPlugin;
use Spryker\Zed\Api\Communication\Plugin\ApiServiceProviderPlugin;
use Spryker\Zed\Api\Communication\Plugin\ServiceProvider\ApiRoutingServiceProvider;
use Spryker\Zed\Application\ApplicationDependencyProvider as SprykerApplicationDependencyProvider;
use Spryker\Zed\Application\Communication\Plugin\ServiceProvider\EnvironmentInformationServiceProvider;
use Spryker\Zed\Application\Communication\Plugin\ServiceProvider\MvcRoutingServiceProvider;
use Spryker\Zed\Application\Communication\Plugin\ServiceProvider\RequestServiceProvider;
use Spryker\Zed\Application\Communication\Plugin\ServiceProvider\RoutingServiceProvider;
use Spryker\Zed\Application\Communication\Plugin\ServiceProvider\SilexRoutingServiceProvider;
use Spryker\Zed\Application\Communication\Plugin\ServiceProvider\SslServiceProvider;
use Spryker\Zed\Application\Communication\Plugin\ServiceProvider\SubRequestServiceProvider;
use Spryker\Zed\Application\Communication\Plugin\ServiceProvider\TranslationServiceProvider;
use Spryker\Zed\Application\Communication\Plugin\ServiceProvider\ZedHstsServiceProvider;
use Spryker\Zed\Assertion\Communication\Plugin\ServiceProvider\AssertionServiceProvider;
use Spryker\Zed\Auth\Communication\Plugin\Bootstrap\AuthBootstrapProvider;
use Spryker\Zed\Auth\Communication\Plugin\ServiceProvider\RedirectAfterLoginProvider;
use Spryker\Zed\Currency\Communication\Plugin\ServiceProvider\TwigCurrencyServiceProvider;
use Spryker\Zed\Gui\Communication\Plugin\ServiceProvider\GuiTwigExtensionServiceProvider;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Log\Communication\Plugin\ServiceProvider\LogServiceProvider;
use Spryker\Zed\Messenger\Communication\Plugin\ServiceProvider\MessengerServiceProvider;
use Spryker\Zed\Money\Communication\Plugin\ServiceProvider\TwigMoneyServiceProvider;
use Spryker\Zed\NewRelic\Communication\Plugin\ServiceProvider\NewRelicRequestTransactionServiceProvider;
use Spryker\Zed\Propel\Communication\Plugin\ServiceProvider\PropelServiceProvider;
use Spryker\Zed\Session\Communication\Plugin\ServiceProvider\SessionServiceProvider as SprykerSessionServiceProvider;
use Spryker\Zed\Twig\Communication\Plugin\ServiceProvider\TwigServiceProvider as SprykerTwigServiceProvider;
use Spryker\Zed\User\Communication\Plugin\ServiceProvider\UserServiceProvider;
use Spryker\Zed\ZedNavigation\Communication\Plugin\ServiceProvider\ZedNavigationServiceProvider;
use Spryker\Zed\ZedRequest\Communication\Plugin\GatewayControllerListenerPlugin;
use Spryker\Zed\ZedRequest\Communication\Plugin\GatewayServiceProviderPlugin;

class ApplicationDependencyProvider extends SprykerApplicationDependencyProvider
{

    const SERVICE_UTIL_DATE_TIME = 'util date time service';
    const SERVICE_NETWORK = 'util network service';
    const SERVICE_UTIL_IO = 'util io service';
    const SERVICE_DATA = 'util data service';

    const SERVICE_PROVIDER = 'SERVICE_PROVIDER';
    const SERVICE_PROVIDER_API = 'SERVICE_PROVIDER_API';
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
            return $this->getServiceProviders($container);
        };

        $container[self::SERVICE_PROVIDER_API] = function (Container $container) {
            return $this->getApiServiceProviders($container);
        };

        $container[self::INTERNAL_CALL_SERVICE_PROVIDER] = function (Container $container) {
            return $this->getInternalCallServiceProviders($container);
        };

        $container[self::INTERNAL_CALL_SERVICE_PROVIDER_WITH_AUTHENTICATION] = function (Container $container) {
            return $this->getInternalCallServiceProvidersWithAuthentication($container);
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Silex\ServiceProviderInterface[]
     */
    protected function getServiceProviders(Container $container)
    {
        $coreProviders = parent::getServiceProviders($container);

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
            new MessengerServiceProvider(),
            new ZedNavigationServiceProvider(),
            new NewRelicRequestTransactionServiceProvider(),
            new TranslationServiceProvider(),
            new DateTimeFormatterServiceProvider(),
            new GuiTwigExtensionServiceProvider(),
            new RedirectAfterLoginProvider(),
            new PropelServiceProvider(),
            new GuiTwigExtensionServiceProvider(),
        ];

        $providers = array_merge($providers, $coreProviders);

        return $providers;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Silex\ServiceProviderInterface[]
     */
    protected function getApiServiceProviders(Container $container)
    {
        $providers = [
            // Add Auth service providers
            new RequestServiceProvider(),
            new SslServiceProvider(),
            new ServiceControllerServiceProvider(),
            new RoutingServiceProvider(),
            $this->getApiServiceProvider(),
            new ApiRoutingServiceProvider(),
            new PropelServiceProvider(),
        ];

        if (Environment::isDevelopment()) {
            $providers[] = new WhoopsErrorHandlerServiceProvider();
        }

        return $providers;
    }

        /**
         * @param \Spryker\Zed\Kernel\Container $container
         *
         * @return \Silex\ServiceProviderInterface[]
         */
    protected function getInternalCallServiceProviders(Container $container)
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
     * @return \Silex\ServiceProviderInterface[]
     */
    protected function getInternalCallServiceProvidersWithAuthentication(Container $container)
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
     * @return \Spryker\Zed\ZedRequest\Communication\Plugin\GatewayServiceProviderPlugin
     */
    protected function getGatewayServiceProvider()
    {
        $controllerListener = new GatewayControllerListenerPlugin();
        $serviceProvider = new GatewayServiceProviderPlugin();
        $serviceProvider->setControllerListener($controllerListener);

        return $serviceProvider;
    }

    /**
     * @return \Spryker\Zed\Api\Communication\Plugin\ApiServiceProviderPlugin
     */
    protected function getApiServiceProvider()
    {
        $controllerListener = new ApiControllerListenerPlugin();
        $serviceProvider = new ApiServiceProviderPlugin();
        $serviceProvider->setControllerListener($controllerListener);

        return $serviceProvider;
    }

}
