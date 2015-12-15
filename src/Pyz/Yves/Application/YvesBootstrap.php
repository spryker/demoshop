<?php

namespace Pyz\Yves\Application;

use Pyz\Yves\Customer\Plugin\Provider\SecurityServiceProvider as ProviderSecurityServiceProvider;
use Pyz\Yves\Customer\Plugin\UserProvider;
use Pyz\Yves\Catalog\Plugin\Router\SearchRouter;
use Pyz\Yves\Collector\Plugin\Router\StorageRouter;
use Pyz\Yves\Category\Plugin\Provider\CategoryServiceProvider;
use Pyz\Yves\Customer\Plugin\Provider\CustomerServiceProvider;
use Pyz\Yves\Glossary\Plugin\Provider\TranslationServiceProvider;
use Spryker\Yves\Application\Plugin\Provider\ExceptionServiceProvider;
use Pyz\Yves\Heartbeat\Plugin\Provider\HeartbeatControllerProvider;
use Pyz\Yves\Application\Plugin\Provider\YvesSecurityServiceProvider;
use Pyz\Yves\Application\Plugin\Provider\SessionServiceProvider as ProviderSessionServiceProvider;
use Pyz\Yves\Application\Plugin\Provider\ApplicationServiceProvider;
use Pyz\Shared\Application\Business\Routing\SilexRouter;
use Pyz\Yves\Application\Plugin\Provider\ApplicationControllerProvider;
use Pyz\Yves\Cart\Plugin\Provider\CartControllerProvider;
use Pyz\Yves\Checkout\Plugin\Provider\CheckoutControllerProvider;
use Pyz\Yves\Customer\Plugin\Provider\CustomerControllerProvider;
use Pyz\Yves\Twig\Plugin\Provider\TwigServiceProvider;
use Pyz\Yves\Wishlist\Plugin\Provider\WishlistControllerProvider;
use Silex\Provider\FormServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;
use Silex\Provider\RememberMeServiceProvider;
use Silex\Provider\SecurityServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Silex\Provider\WebProfilerServiceProvider;
use Spryker\Shared\Config;
use Spryker\Yves\Application\Application;
use Spryker\Yves\Application\Plugin\Provider\CookieServiceProvider;
use Spryker\Yves\Application\Plugin\Provider\MonologServiceProvider;
use Spryker\Yves\Application\Plugin\Provider\YvesLoggingServiceProvider;
use Spryker\Client\Lumberjack\EventJournalClient;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Application\Communication\Plugin\ServiceProvider\RoutingServiceProvider;
use Spryker\Shared\Application\Communication\Plugin\ServiceProvider\UrlGeneratorServiceProvider;
use Spryker\Shared\NewRelic\Api;

class YvesBootstrap
{

    /**
     * @var Application
     */
    protected $application;

    public function __construct()
    {
        $this->application = new Application();
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
     * @return void
     */
    protected function registerServiceProviders()
    {
        $this->application->register(new TwigServiceProvider());
        $this->application->register(new ApplicationServiceProvider());
        $this->application->register(new SessionServiceProvider());
        $this->application->register(new ProviderSessionServiceProvider());
        $this->application->register(new SecurityServiceProvider());
        $this->application->register($this->createSecurityServiceProviderExtension());
        $this->application->register(new YvesSecurityServiceProvider());
        $this->application->register(new ExceptionServiceProvider());
        $this->application->register(new YvesLoggingServiceProvider(new EventJournalClient(), new Api()));
        $this->application->register(new MonologServiceProvider());
        $this->application->register(new CookieServiceProvider());
        $this->application->register(new UrlGeneratorServiceProvider());
        $this->application->register(new ServiceControllerServiceProvider());
        $this->application->register(new RememberMeServiceProvider());
        $this->application->register(new RoutingServiceProvider());
        $this->application->register(new TranslationServiceProvider());
        $this->application->register(new ValidatorServiceProvider());
        $this->application->register(new FormServiceProvider());
        $this->application->register(new HttpFragmentServiceProvider());
        $this->application->register(new CustomerServiceProvider());
        $this->application->register(new CategoryServiceProvider());

        if (Config::get(ApplicationConstants::ENABLE_WEB_PROFILER, false)) {
            $this->application->register(new WebProfilerServiceProvider());
        }
    }

    /**
     * @return void
     */
    protected function registerRouters()
    {
        $this->application->addRouter((new StorageRouter())->setSsl(false));
        $this->application->addRouter((new SearchRouter())->setSsl(false));
        $this->application->addRouter(new SilexRouter($this->application));
    }

    /**
     * @return void
     */
    protected function registerControllerProviders()
    {
        $ssl = Config::get(ApplicationConstants::YVES_SSL_ENABLED);

        $controllerProviders = [
            new ApplicationControllerProvider(false),
            new CheckoutControllerProvider($ssl),
            new CustomerControllerProvider($ssl),
            new CartControllerProvider($ssl),
            new WishlistControllerProvider($ssl),
            new HeartbeatControllerProvider($ssl),
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
        $userProvider = new UserProvider();

        $securityServiceProvider = new ProviderSecurityServiceProvider();
        $securityServiceProvider->setUserProvider($userProvider);

        return $securityServiceProvider;
    }

}
