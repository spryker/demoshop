<?php

namespace Pyz\Yves\Application\Communication;

use Generated\Yves\Ide\AutoCompletion;
use Pyz\Shared\Application\Business\Routing\SilexRouter;
use Pyz\Yves\Application\Communication\Plugin\Provider\ApplicationControllerProvider;
use Pyz\Yves\Cart\Communication\Plugin\CartControllerProvider;
use Pyz\Yves\Checkout\Communication\Plugin\CheckoutControllerProvider;
use Pyz\Yves\Customer\Communication\Plugin\CustomerControllerProvider;
use Pyz\Yves\System\Communication\Plugin\SystemControllerProvider;
use Pyz\Yves\Twig\Communication\Plugin\TwigServiceProvider;
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
use SprykerEngine\Shared\Config;
use SprykerEngine\Shared\Application\Communication\Application;
use SprykerEngine\Yves\Application\Communication\Application as YvesApplication;
use SprykerEngine\Yves\Application\Communication\Plugin\ControllerProviderInterface;
use SprykerEngine\Yves\Application\Communication\Plugin\ServiceProvider\CookieServiceProvider;
use SprykerEngine\Yves\Application\Communication\Plugin\ServiceProvider\MonologServiceProvider;
use SprykerEngine\Yves\Application\Communication\Plugin\ServiceProvider\YvesLoggingServiceProvider;
use SprykerEngine\Yves\Kernel\Locator;
use SprykerFeature\Client\Lumberjack\Service\EventJournalClient;
use SprykerFeature\Shared\Application\ApplicationConfig;
use SprykerFeature\Shared\Application\Communication\Plugin\ServiceProvider\RoutingServiceProvider;
use SprykerFeature\Shared\Application\Communication\Plugin\ServiceProvider\UrlGeneratorServiceProvider;
use SprykerFeature\Shared\NewRelic\Api;
use SprykerFeature\Shared\Yves\YvesConfig;
use Symfony\Component\Routing\RouterInterface;

class YvesBootstrap
{

    /**
     * @var YvesApplication
     */
    protected $application;

    public function __construct()
    {
        $this->application = new YvesApplication();
    }

    /**
     * @return Application
     */
    public function boot()
    {
        $this->registerServiceProviders();

        $this->registerRouters();

        $this->registerControllerProviders();

        return $this->application;
    }

    /**
     * @return ServiceProviderInterface[]
     */
    protected function registerServiceProviders()
    {
        $this->application->register(new TwigServiceProvider());
        $this->application->register($this->getLocator()->application()->pluginProviderApplicationServiceProvider());
        $this->application->register(new SessionServiceProvider());
        $this->application->register($this->getLocator()->session()->pluginServiceProviderSessionServiceProvider());
        $this->application->register(new SecurityServiceProvider());
        $this->application->register($this->createSecurityServiceProviderExtension());
        $this->application->register($this->getLocator()->application()->pluginProviderYvesSecurityServiceProvider());
        $this->application->register($this->getLocator()->application()->pluginServiceProviderExceptionServiceProvider());
        $this->application->register(new YvesLoggingServiceProvider(new EventJournalClient(), new Api()));
        $this->application->register(new MonologServiceProvider());
        $this->application->register(new CookieServiceProvider());
        $this->application->register(new UrlGeneratorServiceProvider());
        $this->application->register(new ServiceControllerServiceProvider());
        $this->application->register(new RememberMeServiceProvider());
        $this->application->register(new RoutingServiceProvider());
        $this->application->register($this->getLocator()->glossary()->pluginServiceProviderTranslationServiceProvider());
        $this->application->register(new ValidatorServiceProvider());
        $this->application->register(new FormServiceProvider());
        $this->application->register(new HttpFragmentServiceProvider());
        $this->application->register($this->getLocator()->customer()->pluginProviderCustomerServiceProvider());
        $this->application->register($this->getLocator()->categoryExporter()->pluginProviderCategoryExporterServiceProvider());

        if (Config::get(ApplicationConfig::ENABLE_WEB_PROFILER, false)) {
            $this->application->register(new WebProfilerServiceProvider());
        }
    }

    /**
     * @return RouterInterface[]
     */
    protected function registerRouters()
    {
        $this->application->addRouter($this->getLocator()->collector()->pluginRouterStorageRouter()->setSsl(false));
        $this->application->addRouter($this->getLocator()->catalog()->pluginRouterSearchRouter()->setSsl(false));
        $this->application->addRouter(new SilexRouter($this->application));
    }

    /**
     * @return ControllerProviderInterface[]
     */
    protected function registerControllerProviders()
    {
        $ssl = Config::get(YvesConfig::YVES_SSL_ENABLED);

        $controllerProviders = [
            new ApplicationControllerProvider(false),
            new CheckoutControllerProvider($ssl),
            new CustomerControllerProvider($ssl),
            new CartControllerProvider($ssl),
            new WishlistControllerProvider($ssl),
            new SystemControllerProvider($ssl),
        ];

        foreach ($controllerProviders as $controllerProvider) {
            $this->application->mount($controllerProvider->getUrlPrefix(), $controllerProvider);
        }
    }

    /**
     * @return SecurityServiceProvider
     */
    private function createSecurityServiceProviderExtension()
    {
        $userProvider = $this->getLocator()->customer()->pluginUserProvider();

        $securityServiceProvider = $this->getLocator()->customer()->pluginServiceProviderSecurityServiceProvider();
        $securityServiceProvider->setUserProvider($userProvider);

        return $securityServiceProvider;
    }

    /**
     * @return AutoCompletion
     */
    protected function getLocator()
    {
        return Locator::getInstance();
    }

}
