<?php
namespace Pyz\Yves\Application\Module;

use Generated\Yves\Factory;
use ProjectA\Yves\Customer\Component\Model\Security\SecurityServiceProvider;
use Pyz\Yves\Library\Silex\Provider\TrackingServiceProvider;
use ProjectA\Yves\Catalog\Component\Model\Category;
use ProjectA\Yves\Library\Silex\Application;
use ProjectA\Yves\Library\Silex\Provider\CookieServiceProvider;
use ProjectA\Yves\Library\Silex\Provider\MonologServiceProvider;
use ProjectA\Yves\Library\Silex\Provider\SessionServiceProvider;
use ProjectA\Yves\Library\Silex\Provider\StorageServiceProvider;
use ProjectA\Yves\Library\Silex\Provider\ExceptionServiceProvider;
use ProjectA\Yves\Library\Silex\Provider\TranslationServiceProvider;
use ProjectA\Yves\Library\Silex\Provider\TwigServiceProvider;
use ProjectA\Yves\Library\Silex\Provider\YvesLoggingServiceProvider;
use ProjectA\Yves\Library\Silex\Routing\SilexRouter;
use Pyz\Yves\Application\Module\ControllerProvider as ApplicationProvider;
use ProjectA\Yves\Cart\Module\ControllerProvider as CartProvider;
use ProjectA\Yves\Checkout\Module\ControllerProvider as CheckoutProvider;
use ProjectA\Yves\Customer\Module\ControllerProvider as CustomerProvider;
use ProjectA\Yves\Cms\Module\ControllerProvider as CmsProvider;
use ProjectA\Yves\Library\Tracking\Tracking;
use Silex\Provider\FormServiceProvider;
use Silex\Provider\RememberMeServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use SilexRouting\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Silex\Provider\WebProfilerServiceProvider;
use SilexRouting\Provider\RoutingServiceProvider;
use Symfony\Component\HttpFoundation\Request;

class YvesBootstrap extends \ProjectA\Yves\Library\Silex\YvesBootstrap
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

        $proxies = \ProjectA_Shared_Library_Config::get('yves')->get('trusted_proxies', []);
        Request::setTrustedProxies($proxies);
    }

    /**
     * @param Application $app
     */
    protected function afterBoot(Application $app)
    {
        $app['monolog.level'] = \ProjectA_Shared_Library_Config::get('log')->logLevel;
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
        $ssl = \ProjectA_Shared_Library_Config::get('yves')->ssl_enabled;

        return [
            new ApplicationProvider(),
            new CartProvider(),
            new CheckoutProvider($ssl),
            new CmsProvider(),
            new CustomerProvider($ssl),
        ];
    }

    /**
     * @param Application $app
     * @return \Symfony\Component\Routing\RouterInterface[]
     */
    protected function getRouters(Application $app)
    {
        return [
            Factory::getInstance()->createSetupModelRouterMonitoringRouter($app),
            Factory::getInstance()->createCatalogModelRouterCatalogRouter($app),
            Factory::getInstance()->createCatalogModelRouterCatalogDetailRouter($app),
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
            'categories' => Category::getCategoryTree($app->getStorageKeyValue()),
            'cartItemCount' => Factory::getInstance()->createCartModelSessionCartCount($app->getSession())->getCount(),
            'tracking' => Tracking::getInstance(),
        ];
    }
}
