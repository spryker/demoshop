<?php

namespace Pyz\Yves\Application\Communication;

use Generated\Yves\Factory;
use ProjectA\Shared\Library\Config;
use ProjectA\Shared\System\SystemConfig;
use ProjectA\Shared\Yves\YvesConfig;
use ProjectA\Yves\Customer\Business\Model\Security\SecurityServiceProvider;
use Pyz\Yves\Library\Silex\Provider\TrackingServiceProvider;
use ProjectA\Shared\Library\Silex\Application;
use ProjectA\Yves\Library\Silex\Provider\CookieServiceProvider;
use ProjectA\Yves\Library\Silex\Provider\MonologServiceProvider;
use ProjectA\Yves\Library\Silex\Provider\SessionServiceProvider;
use ProjectA\Yves\Library\Silex\Provider\StorageServiceProvider;
use ProjectA\Yves\Library\Silex\Provider\ExceptionServiceProvider;
use ProjectA\Yves\Library\Silex\Provider\TranslationServiceProvider;
use ProjectA\Yves\Library\Silex\Provider\TwigServiceProvider;
use ProjectA\Yves\Library\Silex\Provider\YvesLoggingServiceProvider;
use ProjectA\Shared\Library\Silex\Routing\SilexRouter;
use Pyz\Yves\Application\Communication\ControllerProvider as ApplicationProvider;
use ProjectA\Yves\Cart\Communication\ControllerProvider as CartProvider;
use ProjectA\Yves\Checkout\Communication\ControllerProvider as CheckoutProvider;
use ProjectA\Yves\Customer\Communication\ControllerProvider as CustomerProvider;
use ProjectA\Yves\Newsletter\Communication\ControllerProvider as NewsletterProvider;
use ProjectA\Yves\Library\Tracking\Tracking;
use ProjectA\Shared\Library\Silex\ServiceProvider\UrlGeneratorServiceProvider;
use Silex\Provider\FormServiceProvider;
use Silex\Provider\RememberMeServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Silex\Provider\WebProfilerServiceProvider;
use ProjectA\Shared\Library\Silex\ServiceProvider\RoutingServiceProvider;
use Symfony\Component\HttpFoundation\Request;
use ProjectA\Yves\Library\Silex\YvesBootstrap as CoreYvesBootstrap;

class YvesBootstrap extends CoreYvesBootstrap
{
    /**
     * @param Application $app
     */
    protected function beforeBoot(Application $app)
    {
        $app['locale'] = \ProjectA_Shared_Library_Store::getInstance()->getCurrentLocale();
        if (\ProjectA_Shared_Library_Environment::isDevelopment()) {
            $app['profiler.cache_dir'] = \ProjectA_Shared_Library_Data::getLocalStoreSpecificPath('cache/profiler');
        }

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
     * @return \Silex\ServiceProviderInterface[]
     */
    protected function getServiceProviders()
    {
        $providers = [
            new ExceptionServiceProvider('\Pyz\Yves\Library\Controller\ExceptionController'),
            new YvesLoggingServiceProvider(),
            new MonologServiceProvider(),
            new CookieServiceProvider(),
            new SessionServiceProvider(),
            new UrlGeneratorServiceProvider(),
            new ServiceControllerServiceProvider(),
            new SecurityServiceProvider(),
            new RememberMeServiceProvider(),
            new RoutingServiceProvider(),
            new StorageServiceProvider(),
            new TranslationServiceProvider('ProjectA\Shared\Glossary\Code\Storage\StorageKeyGenerator'),
            new ValidatorServiceProvider(),
            new FormServiceProvider(),
            new TwigServiceProvider(),
            new TrackingServiceProvider()
        ];

        if (\ProjectA_Shared_Library_Environment::isDevelopment()) {
            $providers[] = new WebProfilerServiceProvider();
        }

        return $providers;
    }

    /**
     * @return \Silex\ControllerProviderInterface[]
     */
    protected function getControllerProviders()
    {
        $ssl = Config::get(YvesConfig::YVES_SSL_ENABLED);

        return [
            new ApplicationProvider(false),
            new CartProvider(false),
            new CheckoutProvider($ssl),
            new CustomerProvider($ssl),
            new NewsletterProvider(),
        ];
    }

    /**
     * @param Application $app
     * @return \Symfony\Component\Routing\RouterInterface[]
     */
    protected function getRouters(Application $app)
    {
        $productResourceCreator = Factory::getInstance()->createProductExporterDependencyContainer()
            ->createProductDetailResourceCreator();
        $categoryResourceCreator = Factory::getInstance()->createCategoryExporterDependencyContainer()
            ->createCategoryResourceCreator();
        return [
            Factory::getInstance()->createSetupModelRouterMonitoringRouter($app),
            Factory::getInstance()->createCmsModelRouterRedirectRouter($app),
            Factory::getInstance()->createYvesExportDependencyContainer()->createKvStorageRouter($app)
                ->addResourceCreator($productResourceCreator)
                ->addResourceCreator($categoryResourceCreator),
            Factory::getInstance()->createCmsModelRouterCmsRouter($app),
            /*
             * SilexRouter should come last, as it is not the fastest one if it can
             * not find a matching route (lots of magic)
             */
            new SilexRouter($app),
        ];
    }

    /**
     * @param Application $app
     * @return array
     */
    protected function globalTemplateVariables(Application $app)
    {
        return [
            'categories' => Factory::getInstance()->createCategoryExporterDependencyContainer()->createNavigation()->getCategories($app['locale']),
            'cartItemCount' => Factory::getInstance()->createCartModelSessionCartCount($app->getSession())->getCount(),
            'tracking' => Tracking::getInstance(),
        ];
    }
}
