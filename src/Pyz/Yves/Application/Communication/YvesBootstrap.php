<?php

namespace Pyz\Yves\Application\Communication;

use ProjectA\Shared\Application\Business\Application;
use ProjectA\Shared\Application\Business\Bootstrap;

use ProjectA\Shared\Application\Communication\Plugin\ServiceProvider\RoutingServiceProvider;
use ProjectA\Shared\Application\Communication\Plugin\ServiceProvider\UrlGeneratorServiceProvider;
use ProjectA\Shared\Library\Config;
use ProjectA\Shared\Library\Environment;
use ProjectA\Shared\System\SystemConfig;
use ProjectA\Shared\Yves\YvesConfig;
use SprykerCore\Yves\Application\Communication\Plugin\ControllerProviderInterface;

use Pyz\Yves\Checkout\Communication\Plugin\CheckoutControllerProvider;
use Pyz\Yves\Cart\Communication\Plugin\CartControllerProvider;
use ProjectA\Yves\Library\Asset\AssetManager;
use Pyz\Yves\Application\Communication\Plugin\ApplicationControllerProvider;
use SprykerCore\Yves\Application\Business\Twig\YvesExtension;

use SprykerCore\Yves\Application\Communication\Plugin\ServiceProvider\CookieServiceProvider;
use SprykerCore\Yves\Application\Communication\Plugin\ServiceProvider\MonologServiceProvider;
use SprykerCore\Yves\Application\Communication\Plugin\ServiceProvider\SessionServiceProvider;
use SprykerCore\Yves\Application\Communication\Plugin\ServiceProvider\ExceptionServiceProvider;
use SprykerCore\Yves\Application\Communication\Plugin\ServiceProvider\TwigServiceProvider;
use SprykerCore\Yves\Application\Communication\Plugin\ServiceProvider\YvesLoggingServiceProvider;

use ProjectA\Shared\Application\Business\Routing\SilexRouter;

use ProjectA\Yves\Library\Tracking\Tracking;
use Silex\Provider\FormServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Silex\Provider\WebProfilerServiceProvider;
use SprykerCore\Yves\Kernel\Locator;
use Symfony\Component\HttpFoundation\Request;

class YvesBootstrap extends Bootstrap
{

    /**
     * @return Application
     */
    protected function getBaseApplication()
    {
        return new \SprykerCore\Yves\Application\Business\Application();
    }

    /**
     * @param Application $app
     */
    protected function addProvidersToApp(Application $app)
    {
        parent::addProvidersToApp($app);

        foreach ($this->getControllerProviders() as $provider) {
            $app->mount($provider->getUrlPrefix(), $provider);
        }
    }

    /**
     * @param Application $app
     *
     * @return \Twig_Extension[]
     */
    protected function getTwigExtensions(Application $app)
    {
        $assetManager = new AssetManager($app['request_stack']);
        $yvesExtension = new YvesExtension($assetManager);

        return [
            $yvesExtension
        ];
    }

    /**
     * @param Application $app
     */
    protected function beforeBoot(Application $app)
    {
        $app['locale'] = \ProjectA_Shared_Library_Store::getInstance()->getCurrentLocale();
        if (Environment::isDevelopment()) {
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
     * @return \Silex\ServiceProviderInterface[]
     */
    protected function getServiceProviders(Application $app)
    {
        $locator = $this->getLocator($app);

        $translationServiceProvider = $locator->glossary()
            ->pluginTranslationService()
            ->createTranslationServiceProvider();

        $providers = [
            new ExceptionServiceProvider('\Pyz\Yves\Library\Controller\ExceptionController'),
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
//            new TrackingServiceProvider()
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
            new CartControllerProvider(false),
            new CheckoutControllerProvider($ssl),
//            new CustomerControllerProvider($ssl),
        ];
    }

    /**
     * @param Application $app
     * @return \Symfony\Component\Routing\RouterInterface[]
     */
    protected function getRouters(Application $app)
    {
        $locator = $this->getLocator($app);
        $productResourceCreatorPlugin = $locator->productExporter()->pluginProductResourceCreator();
        $categoryResourceCreatorPlugin = $locator->categoryExporter()->pluginCategoryResourceCreator();

        return [
            $locator->setup()->pluginMonitoringRouter()->createMonitoringRouter($app, false),
            $locator->frontendExporter()->pluginStorageRouter()->createStorageRouter($app, false)
                ->addResourceCreator($productResourceCreatorPlugin->createProductResourceCreator())
                ->addResourceCreator($categoryResourceCreatorPlugin->createCategoryResourceCreator())
            ,
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
     * @return \Generated\Yves\Ide\AutoCompletion
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
        $locator = $this->getLocator($app);

        return [
            'categories' => $locator->categoryExporter()->sdk()->getNavigationCategories($app['locale']),
            'cartItemCount' => $locator->cart()
                ->pluginCartSessionCount()
                ->createCartSessionCount($app->getSession())
                ->getCount(),
            'tracking' => Tracking::getInstance(),
            'environment' => Environment::getEnvironment(),
        ];
    }
}
