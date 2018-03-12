<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Application;

use Pyz\Shared\Application\Business\Routing\SilexRouter;
use Pyz\Yves\Application\Plugin\Provider\ApplicationControllerProvider;
use Pyz\Yves\Application\Plugin\Provider\ApplicationServiceProvider;
use Pyz\Yves\Application\Plugin\Provider\AutoloaderCacheServiceProvider;
use Pyz\Yves\Application\Plugin\Provider\YvesSecurityServiceProvider;
use Pyz\Yves\Calculation\Plugin\Provider\CalculationControllerProvider;
use Pyz\Yves\Cart\Plugin\Provider\CartControllerProvider;
use Pyz\Yves\Cart\Plugin\Provider\CartServiceProvider;
use Pyz\Yves\Catalog\Plugin\Provider\CatalogControllerProvider;
use Pyz\Yves\Category\Plugin\Provider\CategoryServiceProvider;
use Pyz\Yves\Checkout\Plugin\Provider\CheckoutControllerProvider;
use Pyz\Yves\Cms\Plugin\Provider\PreviewControllerProvider;
use Pyz\Yves\Collector\Plugin\Router\StorageRouter;
use Pyz\Yves\Currency\Plugin\CurrencyControllerProvider;
use Pyz\Yves\Customer\Plugin\Provider\CustomerControllerProvider;
use Pyz\Yves\Customer\Plugin\Provider\CustomerSecurityServiceProvider;
use Pyz\Yves\Glossary\Plugin\Provider\TranslationServiceProvider;
use Pyz\Yves\Heartbeat\Plugin\Provider\HeartbeatControllerProvider;
use Pyz\Yves\Newsletter\Plugin\Provider\NewsletterControllerProvider;
use Pyz\Yves\Price\Plugin\PriceControllerProvider;
use Pyz\Yves\ProductNew\Plugin\Provider\ProductNewControllerProvider;
use Pyz\Yves\ProductReview\Plugin\Provider\ProductReviewControllerProvider;
use Pyz\Yves\ProductSale\Plugin\Provider\ProductSaleControllerProvider;
use Pyz\Yves\ProductSet\Plugin\Provider\ProductSetControllerProvider;
use Pyz\Yves\Twig\Plugin\Provider\TwigServiceProvider;
use Pyz\Yves\WebProfiler\Plugin\ServiceProvider\WebProfilerServiceProvider;
use Pyz\Yves\Wishlist\Plugin\Provider\WishlistControllerProvider;
use Silex\Provider\FormServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;
use Silex\Provider\RememberMeServiceProvider;
use Silex\Provider\SecurityServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Spryker\Shared\Application\ServiceProvider\FormFactoryServiceProvider;
use Spryker\Shared\Application\ServiceProvider\HeadersSecurityServiceProvider;
use Spryker\Shared\Application\ServiceProvider\RoutingServiceProvider;
use Spryker\Shared\Application\ServiceProvider\UrlGeneratorServiceProvider;
use Spryker\Yves\Application\Plugin\Provider\CookieServiceProvider;
use Spryker\Yves\Application\Plugin\Provider\ExceptionServiceProvider;
use Spryker\Yves\Application\Plugin\Provider\YvesHstsServiceProvider;
use Spryker\Yves\Application\Plugin\ServiceProvider\KernelLogServiceProvider;
use Spryker\Yves\Application\Plugin\ServiceProvider\SslServiceProvider;
use Spryker\Yves\CmsContentWidget\Plugin\CmsContentWidgetServiceProvider;
use Spryker\Yves\Currency\Plugin\CurrencySwitcherServiceProvider;
use Spryker\Yves\Kernel\Application;
use Spryker\Yves\Messenger\Plugin\Provider\FlashMessengerServiceProvider;
use Spryker\Yves\Money\Plugin\ServiceProvider\TwigMoneyServiceProvider;
use Spryker\Yves\Navigation\Plugin\Provider\NavigationTwigServiceProvider;
use Spryker\Yves\NewRelic\Plugin\ServiceProvider\NewRelicRequestTransactionServiceProvider;
use Spryker\Yves\Price\Plugin\PriceModeSwitcherServiceProvider;
use Spryker\Yves\ProductGroup\Plugin\Provider\ProductGroupTwigServiceProvider;
use Spryker\Yves\ProductLabel\Plugin\Provider\ProductLabelTwigServiceProvider;
use Spryker\Yves\ProductRelation\Plugin\ProductRelationTwigServiceProvider;
use Spryker\Yves\ProductReview\Plugin\Provider\ProductAbstractReviewTwigServiceProvider;
use Spryker\Yves\Session\Plugin\ServiceProvider\SessionServiceProvider as SprykerSessionServiceProvider;
use Spryker\Yves\Storage\Plugin\Provider\StorageCacheServiceProvider;
use Spryker\Yves\Twig\Plugin\ServiceProvider\TwigServiceProvider as SprykerTwigServiceProvider;
use Spryker\Yves\Url\Plugin\LanguageSwitcherServiceProvider;
use Spryker\Yves\ZedRequest\Plugin\ServiceProvider\ZedRequestHeaderServiceProvider;
use Spryker\Yves\ZedRequest\Plugin\ServiceProvider\ZedRequestLogServiceProvider;

class YvesBootstrap
{
    /**
     * @var \Spryker\Yves\Kernel\Application
     */
    protected $application;

    /**
     * @var \Pyz\Yves\Application\ApplicationConfig
     */
    protected $config;

    public function __construct()
    {
        $this->application = new Application();
        $this->config = new ApplicationConfig();
    }

    /**
     * @return \Spryker\Yves\Kernel\Application
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
        $this->application->register(new SslServiceProvider());
        $this->application->register(new StorageCacheServiceProvider());
        $this->application->register(new KernelLogServiceProvider());
        $this->application->register(new ZedRequestHeaderServiceProvider());
        $this->application->register(new ZedRequestLogServiceProvider());

        $this->application->register(new TwigServiceProvider());
        $this->application->register(new SprykerTwigServiceProvider());
        $this->application->register(new ApplicationServiceProvider());
        $this->application->register(new SessionServiceProvider());
        $this->application->register(new SprykerSessionServiceProvider());
        $this->application->register(new SecurityServiceProvider());
        $this->application->register(new CustomerSecurityServiceProvider());
        $this->application->register(new YvesSecurityServiceProvider());
        $this->application->register(new ExceptionServiceProvider());
        $this->application->register(new NewRelicRequestTransactionServiceProvider());
        $this->application->register(new CookieServiceProvider());
        $this->application->register(new UrlGeneratorServiceProvider());
        $this->application->register(new ServiceControllerServiceProvider());
        $this->application->register(new RememberMeServiceProvider());
        $this->application->register(new RoutingServiceProvider());
        $this->application->register(new TranslationServiceProvider());
        $this->application->register(new ValidatorServiceProvider());
        $this->application->register(new FormServiceProvider());
        $this->application->register(new HttpFragmentServiceProvider());
        $this->application->register(new CategoryServiceProvider());
        $this->application->register(new FlashMessengerServiceProvider());
        $this->application->register(new HeadersSecurityServiceProvider());
        $this->application->register(new WebProfilerServiceProvider());
        $this->application->register(new AutoloaderCacheServiceProvider());
        $this->application->register(new YvesHstsServiceProvider());
        $this->application->register(new CartServiceProvider());
        $this->application->register(new FormFactoryServiceProvider());
        $this->application->register(new TwigMoneyServiceProvider());
        $this->application->register(new ProductRelationTwigServiceProvider());
        $this->application->register(new NavigationTwigServiceProvider());
        $this->application->register(new ProductGroupTwigServiceProvider());
        $this->application->register(new ProductLabelTwigServiceProvider());
        $this->application->register(new CmsContentWidgetServiceProvider());
        $this->application->register(new CurrencySwitcherServiceProvider());
        $this->application->register(new ProductAbstractReviewTwigServiceProvider());
        $this->application->register(new PriceModeSwitcherServiceProvider());
        $this->application->register(new LanguageSwitcherServiceProvider());
    }

    /**
     * @return void
     */
    protected function registerRouters()
    {
        $this->application->addRouter((new StorageRouter())->setSsl(false));
        $this->application->addRouter(new SilexRouter($this->application));
    }

    /**
     * @return void
     */
    protected function registerControllerProviders()
    {
        $isSsl = $this->config->isSslEnabled();

        $controllerProviders = $this->getControllerProviderStack($isSsl);

        foreach ($controllerProviders as $controllerProvider) {
            $this->application->mount($controllerProvider->getUrlPrefix(), $controllerProvider);
        }
    }

    /**
     * @param bool|null $isSsl
     *
     * @return \Pyz\Yves\Application\Plugin\Provider\AbstractYvesControllerProvider[]
     */
    protected function getControllerProviderStack($isSsl)
    {
        return [
            new ApplicationControllerProvider($isSsl),
            new CheckoutControllerProvider($isSsl),
            new CustomerControllerProvider($isSsl),
            new CartControllerProvider($isSsl),
            new WishlistControllerProvider($isSsl),
            new HeartbeatControllerProvider($isSsl),
            new NewsletterControllerProvider($isSsl),
            new CatalogControllerProvider($isSsl),
            new CalculationControllerProvider($isSsl),
            new ProductSetControllerProvider($isSsl),
            new ProductSaleControllerProvider($isSsl),
            new ProductNewControllerProvider($isSsl),
            new PreviewControllerProvider($isSsl),
            new CurrencyControllerProvider($isSsl),
            new ProductReviewControllerProvider($isSsl),
            new PriceControllerProvider($isSsl),
        ];
    }
}
