<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Shared\Testify\Helper\Bootstrap;

use Pyz\Yves\Application\Plugin\Provider\ApplicationServiceProvider;
use Pyz\Yves\Application\Plugin\Provider\AutoloaderCacheServiceProvider;
use Pyz\Yves\Application\Plugin\Provider\LanguageServiceProvider;
use Pyz\Yves\Application\Plugin\Provider\YvesSecurityServiceProvider;
use Pyz\Yves\Application\YvesBootstrap as ApplicationYvesBootstrap;
use Pyz\Yves\Cart\Plugin\Provider\CartServiceProvider;
use Pyz\Yves\Category\Plugin\Provider\CategoryServiceProvider;
use Pyz\Yves\Customer\Plugin\Provider\CustomerSecurityServiceProvider;
use Pyz\Yves\Glossary\Plugin\Provider\TranslationServiceProvider;
use Pyz\Yves\Twig\Plugin\Provider\TwigServiceProvider;
use Pyz\Yves\WebProfiler\Plugin\ServiceProvider\WebProfilerServiceProvider;
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
use Spryker\Yves\CmsContentWidget\Plugin\CmsContentWidgetServiceProvider;
use Spryker\Yves\Currency\Plugin\CurrencySwitcherServiceProvider;
use Spryker\Yves\Messenger\Plugin\Provider\FlashMessengerServiceProvider;
use Spryker\Yves\Money\Plugin\ServiceProvider\TwigMoneyServiceProvider;
use Spryker\Yves\Navigation\Plugin\Provider\NavigationTwigServiceProvider;
use Spryker\Yves\NewRelic\Plugin\ServiceProvider\NewRelicRequestTransactionServiceProvider;
use Spryker\Yves\ProductGroup\Plugin\Provider\ProductGroupTwigServiceProvider;
use Spryker\Yves\ProductLabel\Plugin\Provider\ProductLabelTwigServiceProvider;
use Spryker\Yves\ProductRelation\Plugin\ProductRelationTwigServiceProvider;
use Spryker\Yves\ProductReview\Plugin\Provider\ProductAbstractReviewTwigServiceProvider;
use Spryker\Yves\Session\Plugin\ServiceProvider\SessionServiceProvider as SprykerSessionServiceProvider;
use Spryker\Yves\Storage\Plugin\Provider\StorageCacheServiceProvider;
use Spryker\Yves\Twig\Plugin\ServiceProvider\TwigServiceProvider as SprykerTwigServiceProvider;

/**
 * This class can be removed when EventJournal Service Provider is removed from the extended one.
 */
class YvesBootstrap extends ApplicationYvesBootstrap
{

    /**
     * @return void
     */
    protected function registerServiceProviders()
    {
        $this->application->register(new StorageCacheServiceProvider());
        $this->application->register(new SprykerTwigServiceProvider());
        $this->application->register(new TwigServiceProvider());
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
        $this->application->register(new LanguageServiceProvider());
        $this->application->register(new TwigMoneyServiceProvider());
        $this->application->register(new ProductRelationTwigServiceProvider());
        $this->application->register(new NavigationTwigServiceProvider());
        $this->application->register(new ProductGroupTwigServiceProvider());
        $this->application->register(new ProductLabelTwigServiceProvider());
        $this->application->register(new CmsContentWidgetServiceProvider());
        $this->application->register(new ProductAbstractReviewTwigServiceProvider());
        $this->application->register(new CurrencySwitcherServiceProvider());
    }

}
