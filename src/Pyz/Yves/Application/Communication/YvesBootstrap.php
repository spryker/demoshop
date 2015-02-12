<?php

namespace Pyz\Yves\Application\Communication;

use Generated\Yves\Factory;
use ProjectA\Shared\Application\Business\Application;
use ProjectA\Shared\Application\Business\Bootstrap;

use ProjectA\Shared\Application\Communication\Plugin\ServiceProvider\RoutingServiceProvider;
use ProjectA\Shared\Application\Communication\Plugin\ServiceProvider\UrlGeneratorServiceProvider;
use ProjectA\Shared\Library\Config;
use ProjectA\Shared\Library\Storage\StorageInstanceBuilder;
use ProjectA\Shared\System\SystemConfig;
use ProjectA\Shared\Yves\YvesConfig;
use ProjectA\Yves\Application\Communication\Plugin\ControllerProviderInterface;
use ProjectA\Yves\Cart\Communication\Plugin\CartControllerProvider;
use ProjectA\Yves\Checkout\Communication\Plugin\CheckoutControllerProvider;
use ProjectA\Yves\Customer\Business\Model\Security\SecurityServiceProvider;
use ProjectA\Yves\Customer\Communication\Plugin\CustomerControllerProvider;
use SprykerCore\Yves\Kernel\Locator;
use ProjectA\Yves\Library\Asset\AssetManager;
use ProjectA\Yves\Application\Business\Twig\YvesExtension;
use ProjectA\Yves\Newsletter\Communication\Plugin\NewsletterControllerProvider;
use Pyz\Yves\Application\Communication\Plugin\ApplicationControllerProvider;
use Pyz\Yves\Library\Silex\Provider\TrackingServiceProvider;

use ProjectA\Yves\Application\Communication\Plugin\ServiceProvider\CookieServiceProvider;
use ProjectA\Yves\Application\Communication\Plugin\ServiceProvider\MonologServiceProvider;
use ProjectA\Yves\Application\Communication\Plugin\ServiceProvider\SessionServiceProvider;
use ProjectA\Yves\Application\Communication\Plugin\ServiceProvider\StorageServiceProvider;
use ProjectA\Yves\Application\Communication\Plugin\ServiceProvider\ExceptionServiceProvider;
use SprykerFeature\Sdk\Glossary\KeyBuilder\SdkGlossaryKeyBuilder;
use SprykerFeature\Yves\Glossary\KVTranslatorPlugin;
use SprykerFeature\Yves\Glossary\TranslationServiceProvider;
use ProjectA\Yves\Application\Communication\Plugin\ServiceProvider\TwigServiceProvider;
use ProjectA\Yves\Application\Communication\Plugin\ServiceProvider\YvesLoggingServiceProvider;

use ProjectA\Shared\Application\Business\Routing\SilexRouter;

use ProjectA\Yves\Library\Tracking\Tracking;
use Silex\Provider\FormServiceProvider;
use Silex\Provider\RememberMeServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Silex\Provider\WebProfilerServiceProvider;
use Symfony\Component\HttpFoundation\Request;

class YvesBootstrap extends Bootstrap
{

    /**
     * @return Application
     */
    protected function getBaseApplication()
    {
        return new \ProjectA\Yves\Application\Business\Application();
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
        $locator = new Locator();

        $translationServiceProvider = $locator->glossary()
            ->pluginTranslationService()
            ->createTranslationServiceProvider();

        $translator = new KVTranslatorPlugin();
        $keyBuilder = new SdkGlossaryKeyBuilder();
        $translator->setKeyBuilder($keyBuilder);
        $translator->setKeyValueReader(StorageInstanceBuilder::getKvStorageReadInstance());

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
            $translationServiceProvider,
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
     * @return ControllerProviderInterface[]
     */
    protected function getControllerProviders()
    {
        $ssl = Config::get(YvesConfig::YVES_SSL_ENABLED);

        return [
            new ApplicationControllerProvider(false),
            new CartControllerProvider(false),
            new CheckoutControllerProvider($ssl),
            new CustomerControllerProvider($ssl),
            new NewsletterControllerProvider(),
        ];
    }

    /**
     * @param Application $app
     * @return \Symfony\Component\Routing\RouterInterface[]
     */
    protected function getRouters(Application $app)
    {
        $locator = new Locator();
        $productResourceCreatorPlugin = $locator->productExport()->pluginProductResourceCreator();
        $categoryResourceCreatorPlugin = $locator->categoryExport()->pluginCategoryResourceCreator();

        return [
            $locator->setup()->pluginMonitoringRouter()->createMonitoringRouter($app, false),
            Factory::getInstance()->createCmsModelRouterRedirectRouter($app),
            $locator->yvesExport()->pluginStorageRouter()->createStorageRouter($app, false)
                ->addResourceCreator($productResourceCreatorPlugin->createProductResourceCreator())
                ->addResourceCreator($categoryResourceCreatorPlugin->createCategoryResourceCreator())
            ,
            Factory::getInstance()->createCatalogModelRouterSearchRouter($app),
            Factory::getInstance()->createCmsModelRouterCmsRouter($app),
            Factory::getInstance()->createCartModelRouterCartRouter($app),
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
            'categories' => Factory::getInstance()->createCategoryExporterDependencyContainer()
                ->createNavigation()
                ->getCategories($app['locale']),
            'cartItemCount' => Factory::getInstance()->createCartModelSessionCartCount($app->getSession())->getCount(),
            'tracking' => Tracking::getInstance(),
            'environment' => \ProjectA_Shared_Library_Environment::getEnvironment(),
        ];
    }
}
