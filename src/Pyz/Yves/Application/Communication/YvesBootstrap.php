<?php

namespace Pyz\Yves\Application\Communication;

use Pyz\Yves\Application\Communication\Plugin\ApplicationControllerProvider;
use Pyz\Yves\Cart\Communication\Plugin\CartControllerProvider;
use Pyz\Yves\Checkout\Communication\Plugin\CheckoutControllerProvider;
use Pyz\Yves\Customer\Communication\Plugin\CustomerControllerProvider;
use Silex\Provider\FormServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;
use Silex\Provider\RememberMeServiceProvider;
use Silex\Provider\SecurityServiceProvider as SilexSecurityServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\SessionServiceProvider as SilexSessionServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Silex\Provider\WebProfilerServiceProvider;
use Silex\ServiceProviderInterface;
use SprykerEngine\Shared\Kernel\Store;
use SprykerEngine\Yves\Application\Business\YvesBootstrap as SprykerYvesBootstrap;
use SprykerEngine\Yves\Application\Communication\Plugin\ControllerProviderInterface;
use SprykerEngine\Yves\Application\Communication\Plugin\ServiceProvider\CookieServiceProvider;
use SprykerEngine\Yves\Application\Communication\Plugin\ServiceProvider\ExceptionServiceProvider;
use SprykerEngine\Yves\Application\Communication\Plugin\ServiceProvider\MonologServiceProvider;
use SprykerEngine\Yves\Application\Communication\Plugin\ServiceProvider\YvesLoggingServiceProvider;
use SprykerEngine\Yves\Kernel\Locator;
use SprykerFeature\Shared\Application\Business\Application;
use SprykerFeature\Shared\Application\Business\Routing\SilexRouter;
use SprykerFeature\Shared\Application\Communication\Plugin\ServiceProvider\RoutingServiceProvider;
use SprykerFeature\Shared\Application\Communication\Plugin\ServiceProvider\UrlGeneratorServiceProvider;
use SprykerFeature\Shared\Library\Config;
use SprykerFeature\Shared\System\SystemConfig;
use SprykerFeature\Shared\Yves\YvesConfig;
use SprykerFeature\Yves\Twig\Communication\Plugin\TwigServiceProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;

class YvesBootstrap extends SprykerYvesBootstrap
{

    /**
     * @param Application $app
     */
    protected function beforeBoot(Application $app)
    {
        $app['locale'] = Store::getInstance()->getCurrentLocale();
        if (\SprykerFeature_Shared_Library_Environment::isDevelopment()) {
            $app['profiler.cache_dir'] = \SprykerFeature_Shared_Library_Data::getLocalStoreSpecificPath('cache/profiler');
        }
        $app['locator'] = Locator::getInstance();

        $proxies = Config::get(YvesConfig::YVES_TRUSTED_PROXIES);

        Request::setTrustedProxies($proxies);
    }

    /**
     * @param Application $app
     */
    protected function afterBoot(Application $app)
    {
        $app['monolog.level'] = Config::get(SystemConfig::LOG_LEVEL);
    }

    /**
     * @param Application $app
     *
     * @return ServiceProviderInterface[]
     */
    protected function getServiceProviders(Application $app)
    {
        $locator = $this->getLocator($app);

        $pimplePlugin = $locator->application()->pluginPimple();
        $pimplePlugin->setApplication($app);

        $translationServiceProvider = $locator->glossary()
            ->pluginServiceProviderTranslationServiceProvider()
            ->setGlossaryClient($locator->glossary()->client());

        $userProvider = $locator->customer()->pluginUserProvider()
            ->setCustomerClient($locator->customer()->client());

        $securityServiceProvider = $locator->customer()->pluginServiceProviderSecurityServiceProvider();
        $securityServiceProvider->setUserProvider($userProvider);

        $sessionServiceProvider = $locator->session()->pluginServiceProviderSessionServiceProvider();
        $sessionServiceProvider->setClient($locator->session()->client());

        $providers = [
            new SilexSessionServiceProvider(),
            new SilexSecurityServiceProvider(),
            new ExceptionServiceProvider('\\SprykerEngine\\Yves\\Application\\Communication\\Controller\\ExceptionController'),
            new YvesLoggingServiceProvider(),
            new MonologServiceProvider(),
            new CookieServiceProvider(),
            $sessionServiceProvider,
            new UrlGeneratorServiceProvider(),
            new ServiceControllerServiceProvider(),
            $securityServiceProvider,
            new SilexSecurityServiceProvider(),
            new RememberMeServiceProvider(),
            new RoutingServiceProvider(),
            $translationServiceProvider,
            new ValidatorServiceProvider(),
            new FormServiceProvider(),
            new TwigServiceProvider(),
            new HttpFragmentServiceProvider(),
        ];

        if (\SprykerFeature_Shared_Library_Environment::isDevelopment()) {
            $providers[] = new WebProfilerServiceProvider();
        }

        return $providers;
    }

    /**
     * @return ControllerProviderInterface[]
     */
    protected function getControllerProviders()
    {
        $ssl = Config::get(YvesConfig::YVES_SSL_ENABLED);

        return [
            new ApplicationControllerProvider(false),
            new CheckoutControllerProvider($ssl),
            new CustomerControllerProvider($ssl),
            new CartControllerProvider($ssl),
        ];
    }

    /**
     * @param Application $app
     *
     * @return RouterInterface[]
     */
    protected function getRouters(Application $app)
    {
        $locator = $this->getLocator($app);

        return [
            $locator->setup()->pluginRouterMonitoringRouter()->setSsl(false),
            $locator->frontendExporter()->pluginRouterStorageRouter()->setSsl(false),
            $locator->catalog()->pluginRouterSearchRouter()->setSsl(false),
            /*
             * SilexRouter should come last, as it is not the fastest one if it can
             * not find a matching route (lots of magic)
             */
            new SilexRouter($app),
        ];
    }

    /**
     * @param Application $app
     *
     * @return array
     */
    protected function globalTemplateVariables(Application $app)
    {
        $existingGlobalVars = parent::globalTemplateVariables($app);

        $locator = $this->getLocator($app);

        $additionalGlobalVars = [
            'categories' => $locator->categoryExporter()->client()->getNavigationCategories($app['locale']),
            'environment' => \SprykerFeature_Shared_Library_Environment::getEnvironment(),
            'registerForm' => $app['form.factory']->create($locator->customer()->pluginRegisterForm()->createFormRegister())->createView(),
        ];

        return array_merge($existingGlobalVars, $additionalGlobalVars);
    }

}
