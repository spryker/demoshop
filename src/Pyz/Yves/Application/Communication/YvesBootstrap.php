<?php

namespace Pyz\Yves\Application\Communication;

use Pyz\Yves\Application\Communication\Plugin\ApplicationControllerProvider;
use Pyz\Yves\Cart\Communication\Plugin\CartControllerProvider;
use Pyz\Yves\Checkout\Communication\Plugin\CheckoutControllerProvider;
use Pyz\Yves\Customer\Communication\Plugin\CustomerControllerProvider;
use Pyz\Yves\System\Communication\Plugin\SystemControllerProvider;
use Pyz\Yves\Wishlist\Communication\Plugin\WishlistControllerProvider;
use Silex\Provider\FormServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;
use Silex\Provider\RememberMeServiceProvider;
use Silex\Provider\SecurityServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Silex\Provider\WebProfilerServiceProvider;
use Silex\ServiceProviderInterface;
use SprykerEngine\Yves\Application\Communication\YvesBootstrap as SprykerYvesBootstrap;
use SprykerEngine\Yves\Application\Communication\Plugin\ControllerProviderInterface;
use SprykerEngine\Yves\Application\Communication\Plugin\ServiceProvider\CookieServiceProvider;
use SprykerEngine\Yves\Application\Communication\Plugin\ServiceProvider\ExceptionServiceProvider;
use SprykerEngine\Yves\Application\Communication\Plugin\ServiceProvider\MonologServiceProvider;
use SprykerEngine\Yves\Application\Communication\Plugin\ServiceProvider\YvesLoggingServiceProvider;
use SprykerEngine\Shared\Application\Communication\Application;
use SprykerFeature\Shared\Application\Business\Routing\SilexRouter;
use SprykerFeature\Shared\Application\Communication\Plugin\ServiceProvider\RoutingServiceProvider;
use SprykerFeature\Shared\Application\Communication\Plugin\ServiceProvider\UrlGeneratorServiceProvider;
use SprykerFeature\Shared\Library\Config;
use SprykerFeature\Shared\Library\DataDirectory;
use SprykerFeature\Shared\Library\Environment;
use SprykerFeature\Shared\System\SystemConfig;
use SprykerFeature\Shared\Yves\YvesConfig;
use Pyz\Yves\Twig\Communication\Plugin\TwigServiceProvider;
use Symfony\Component\Routing\RouterInterface;
use SprykerFeature\Client\Lumberjack\Service\EventJournalClient;
use SprykerFeature\Shared\Library\NewRelic\Api;

class YvesBootstrap extends SprykerYvesBootstrap
{

    /**
     * @param Application $app
     */
    protected function beforeBoot(Application $app)
    {
        $app['locale'] = Store::getInstance()->getCurrentLocale();
        if (Environment::isDevelopment()) {
            $app['profiler.cache_dir'] = DataDirectory::getLocalStoreSpecificPath('cache/profiler');
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
        $pimplePlugin = $this->getLocator()->application()->pluginPimple();
        $pimplePlugin->setApplication($app);

        $translationServiceProvider = $this->getLocator()->glossary()
            ->pluginServiceProviderTranslationServiceProvider()
            ->setGlossaryClient($this->getLocator()->glossary()->client());

        $userProvider = $this->getLocator()->customer()->pluginUserProvider()
            ->setCustomerClient($this->getLocator()->customer()->client());

        $securityServiceProvider = $this->getLocator()->customer()->pluginServiceProviderSecurityServiceProvider();
        $securityServiceProvider->setUserProvider($userProvider);

        $sessionServiceProvider = $this->getLocator()->session()->pluginServiceProviderSessionServiceProvider();
        $sessionServiceProvider->setClient($this->getLocator()->session()->client());

        $providers = [
            new SessionServiceProvider(),
            new SecurityServiceProvider(),
            $this->getLocator()->application()->pluginServiceProviderYvesSecurityServiceProvider(),
            new ExceptionServiceProvider('\\SprykerEngine\\Yves\\Application\\Communication\\Controller\\ExceptionController'),
            new YvesLoggingServiceProvider(new EventJournalClient(), Api::getInstance()),
            new MonologServiceProvider(),
            new CookieServiceProvider(),
            $sessionServiceProvider,
            new UrlGeneratorServiceProvider(),
            new ServiceControllerServiceProvider(),
            $securityServiceProvider,
            new RememberMeServiceProvider(),
            new RoutingServiceProvider(),
            $translationServiceProvider,
            new ValidatorServiceProvider(),
            new FormServiceProvider(),
            new TwigServiceProvider(),
            new HttpFragmentServiceProvider(),
        ];

        if (Environment::isDevelopment()) {
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
            new WishlistControllerProvider($ssl),
            new SystemControllerProvider($ssl),
        ];
    }

    /**
     * @param Application $app
     *
     * @return RouterInterface[]
     */
    protected function getRouters(Application $app)
    {
        return [
            $this->getLocator()->collector()->pluginRouterStorageRouter()->setSsl(false),
            $this->getLocator()->catalog()->pluginRouterSearchRouter()->setSsl(false),
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

        $additionalGlobalVars = [
            'categories' => $this->getLocator()->categoryExporter()->client()->getNavigationCategories($app['locale']),
            'environment' => Environment::getEnvironment(),
            'registerForm' => $app['form.factory']->create($this->getLocator()->customer()->pluginRegisterForm()->createFormRegister())->createView(),
        ];

        return array_merge($existingGlobalVars, $additionalGlobalVars);
    }

}
