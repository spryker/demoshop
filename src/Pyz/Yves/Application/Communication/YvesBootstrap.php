<?php

namespace Pyz\Yves\Application\Communication;

use Pyz\Shared\Application\Business\Routing\SilexRouter;
use Pyz\Yves\Application\Provider\ApplicationControllerProvider;
use Pyz\Yves\Application\Provider\ApplicationServiceProvider;
use Pyz\Yves\Cart\Communication\Plugin\CartControllerProvider;
use Pyz\Yves\CategoryExporter\Provider\CategoryExporterServiceProvider;
use Pyz\Yves\Checkout\Communication\Plugin\CheckoutControllerProvider;
use Pyz\Yves\Customer\Communication\Plugin\CustomerControllerProvider;
use Pyz\Yves\Customer\Provider\CustomerServiceProvider;
use Pyz\Yves\Glossary\Communication\Plugin\ServiceProvider\TranslationServiceProvider;
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
use SprykerEngine\Yves\Application\Communication\Plugin\ControllerProviderInterface;
use SprykerEngine\Yves\Application\Communication\Plugin\ServiceProvider\CookieServiceProvider;
use SprykerEngine\Yves\Application\Communication\Plugin\ServiceProvider\MonologServiceProvider;
use SprykerEngine\Yves\Application\Communication\Plugin\ServiceProvider\YvesLoggingServiceProvider;
use SprykerFeature\Client\Lumberjack\Service\EventJournalClient;
use SprykerFeature\Shared\Application\ApplicationConfig;
use SprykerFeature\Shared\Application\Communication\Plugin\ServiceProvider\RoutingServiceProvider;
use SprykerFeature\Shared\Application\Communication\Plugin\ServiceProvider\UrlGeneratorServiceProvider;
use SprykerFeature\Shared\NewRelic\Api;
use SprykerFeature\Shared\Yves\YvesConfig;
use Symfony\Component\Routing\RouterInterface;

class YvesBootstrap extends AbstractYvesBootstrap
{

    /**
     * @return ServiceProviderInterface[]
     */
    protected function getServiceProviders()
    {
        $serviceProviders = [
            new TwigServiceProvider(),
            new ApplicationServiceProvider(),
            new SessionServiceProvider(),
            $this->getSessionServiceProviderExtension(),
            new SecurityServiceProvider(),
            $this->getSecurityServiceProviderExtension(),
            $this->getLocator()->application()->pluginServiceProviderYvesSecurityServiceProvider(),
            $this->getLocator()->application()->pluginServiceProviderExceptionServiceProvider(),
            new YvesLoggingServiceProvider(new EventJournalClient(), new Api()),
            new MonologServiceProvider(),
            new CookieServiceProvider(),
            new UrlGeneratorServiceProvider(),
            new ServiceControllerServiceProvider(),
            new RememberMeServiceProvider(),
            new RoutingServiceProvider(),
            $this->getTranslationServiceProvider(),
            new ValidatorServiceProvider(),
            new FormServiceProvider(),
            new HttpFragmentServiceProvider(),
            new CustomerServiceProvider(),
            new CategoryExporterServiceProvider(),
        ];

        $this->setWebProfilerServiceProvider($serviceProviders);

        return $serviceProviders;
    }

    /**
     * @return RouterInterface[]
     */
    protected function getRouters()
    {
        return [
            $this->getLocator()->collector()->pluginRouterStorageRouter()->setSsl(false),
            $this->getLocator()->catalog()->pluginRouterSearchRouter()->setSsl(false),
            new SilexRouter($this->application),
        ];
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
     * @return SessionServiceProvider
     */
    private function getSessionServiceProviderExtension()
    {
        $sessionServiceProvider = $this->getLocator()->session()->pluginServiceProviderSessionServiceProvider();
        $sessionServiceProvider->setClient($this->getLocator()->session()->client());

        return $sessionServiceProvider;
    }

    /**
     * @return SecurityServiceProvider
     */
    private function getSecurityServiceProviderExtension()
    {
        $userProvider = $this->getLocator()->customer()->pluginUserProvider()
            ->setCustomerClient($this->getLocator()->customer()->client());

        $securityServiceProvider = $this->getLocator()->customer()->pluginServiceProviderSecurityServiceProvider();
        $securityServiceProvider->setUserProvider($userProvider);

        return $securityServiceProvider;
    }

    /**
     * @return TranslationServiceProvider
     */
    private function getTranslationServiceProvider()
    {
        return $this->getLocator()->glossary()
            ->pluginServiceProviderTranslationServiceProvider()
            ->setGlossaryClient($this->getLocator()->glossary()->client());
    }

    /**
     * @param array $serviceProviders
     *
     * @return array
     */
    private function setWebProfilerServiceProvider(array &$serviceProviders)
    {
        if (Config::get(ApplicationConfig::ENABLE_WEB_PROFILER, false)) {
            $serviceProviders[] = new WebProfilerServiceProvider();
        }
    }

}
