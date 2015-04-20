<?php

namespace Pyz\Yves\Application\Communication;

use Generated\Yves\Ide\AutoCompletion;
use ProjectA\Shared\Application\Business\Application;
use ProjectA\Shared\Application\Communication\Plugin\ServiceProvider\RoutingServiceProvider;
use ProjectA\Shared\Application\Communication\Plugin\ServiceProvider\UrlGeneratorServiceProvider;
use ProjectA\Shared\Library\Config;
use ProjectA\Shared\System\SystemConfig;
use ProjectA\Shared\Yves\YvesConfig;
use Silex\ServiceProviderInterface;
use SprykerCore\Yves\Application\Business\YvesBootstrap as SprykerYvesBootstrap;
use SprykerCore\Yves\Application\Communication\Plugin\ControllerProviderInterface;
use Pyz\Yves\Checkout\Communication\Plugin\CheckoutControllerProvider;
use Pyz\Yves\Cart\Communication\Plugin\CartControllerProvider;
use Pyz\Yves\Application\Communication\Plugin\ApplicationControllerProvider;
use SprykerCore\Yves\Application\Communication\Plugin\ServiceProvider\CookieServiceProvider;
use SprykerCore\Yves\Application\Communication\Plugin\ServiceProvider\MonologServiceProvider;
use SprykerCore\Yves\Application\Communication\Plugin\ServiceProvider\SessionServiceProvider;
use SprykerCore\Yves\Application\Communication\Plugin\ServiceProvider\ExceptionServiceProvider;
use SprykerCore\Yves\Application\Communication\Plugin\ServiceProvider\YvesLoggingServiceProvider;

use ProjectA\Shared\Application\Business\Routing\SilexRouter;

use ProjectA\Yves\Library\Tracking\Tracking;
use Silex\Provider\FormServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Silex\Provider\WebProfilerServiceProvider;
use SprykerCore\Yves\Kernel\Locator;
use SprykerFeature\Yves\Twig\Plugin\TwigServiceProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;

class YvesBootstrap extends SprykerYvesBootstrap
{
    /**
     * @param Application $app
     */
    protected function beforeBoot(Application $app)
    {
        $app['locale'] = \ProjectA\Shared\Kernel\Store::getInstance()->getCurrentLocale();
        if (\ProjectA_Shared_Library_Environment::isDevelopment()) {
            $app['profiler.cache_dir'] = \ProjectA_Shared_Library_Data::getLocalStoreSpecificPath('cache/profiler');
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
     * @return ServiceProviderInterface[]
     */
    protected function getServiceProviders(Application $app)
    {
        $locator = $this->getLocator($app);

        $translationServiceProvider = $locator->glossary()
            ->pluginTranslationService()
            ->createTranslationServiceProvider();

        $providers = [
            new ExceptionServiceProvider('\\SprykerCore\\Yves\\Application\\Communication\\Controller\\ExceptionController'),
            new YvesLoggingServiceProvider(),
            new MonologServiceProvider(),
            new CookieServiceProvider(),
            new SessionServiceProvider(),
            new UrlGeneratorServiceProvider(),
            new ServiceControllerServiceProvider(),
//            new SecurityServiceProvider(),
//            new RememberMeServiceProvider(),
            new RoutingServiceProvider(),
            $translationServiceProvider,
            new ValidatorServiceProvider(),
            new FormServiceProvider(),
            new TwigServiceProvider(),
        ];

        if (\ProjectA_Shared_Library_Environment::isDevelopment()) {
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
            new CartControllerProvider(false),
            new CheckoutControllerProvider($ssl),
//            new CustomerControllerProvider($ssl),
        ];
    }

    /**
     * @param Application $app
     * @return RouterInterface[]
     */
    protected function getRouters(Application $app)
    {
        $locator = $this->getLocator($app);

        return [
            $locator->setup()->pluginMonitoringRouter()->createMonitoringRouter($app, false),
            $locator->frontendExporter()->pluginStorageRouter()->createStorageRouter($app, false),
            $locator->catalog()->pluginSearchRouter()->createSearchRouter($app, false),
            $locator->cart()->pluginCartRouter()->createCartRouter($app, false),
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
     * @return AutoCompletion
     */
    protected function getLocator(Application $app)
    {
        return $app['locator'];
    }

    /**
     * @param Application $app
     * @return array
     */
    protected function globalTemplateVariables(Application $app)
    {
        $existingGlobalVars = parent::globalTemplateVariables($app);

        $locator = $this->getLocator($app);

        $addditionalGlobalVars = [
            'categories' => $locator->categoryExporter()->sdk()->getNavigationCategories($app['locale']),
            'cartItemCount' => $locator->cart()
                ->pluginCartSessionCount()
                ->createCartSessionCount($app->getSession())
                ->getCount(),
            'tracking' => Tracking::getInstance(),
            'environment' => \ProjectA_Shared_Library_Environment::getEnvironment(),
        ];

        return array_merge($existingGlobalVars, $addditionalGlobalVars);
    }
}
