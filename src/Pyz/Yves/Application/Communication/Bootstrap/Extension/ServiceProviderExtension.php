<?php


namespace Pyz\Yves\Application\Communication\Bootstrap\Extension;

use Silex\Provider\FormServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;
use Silex\Provider\RememberMeServiceProvider;
use Silex\Provider\SecurityServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Silex\Provider\WebProfilerServiceProvider;
use Silex\ServiceProviderInterface;
use SprykerEngine\Shared\Application\Communication\Bootstrap\Extension\ServiceProviderExtensionInterface;
use SprykerEngine\Shared\Config;
use SprykerEngine\Yves\Application\Communication\Plugin\ServiceProvider\CookieServiceProvider;
use SprykerEngine\Yves\Application\Communication\Plugin\ServiceProvider\MonologServiceProvider;
use SprykerEngine\Yves\Application\Communication\Plugin\ServiceProvider\YvesLoggingServiceProvider;
use SprykerEngine\Shared\Application\Communication\Application;
use SprykerFeature\Shared\Application\ApplicationConfig;
use SprykerFeature\Shared\Application\Communication\Plugin\ServiceProvider\RoutingServiceProvider;
use SprykerFeature\Shared\Application\Communication\Plugin\ServiceProvider\UrlGeneratorServiceProvider;
use Pyz\Yves\Twig\Communication\Plugin\TwigServiceProvider;
use SprykerFeature\Client\Lumberjack\Service\EventJournalClient;
use SprykerFeature\Shared\NewRelic\Api;

class ServiceProviderExtension extends LocatorAwareExtension implements ServiceProviderExtensionInterface
{

    /**
     * @param Application $app
     *
     * @return ServiceProviderInterface[]
     */
    public function getServiceProvider(Application $app)
    {
        $pimplePlugin = $this->getLocator()->application()->pluginPimple();
        $pimplePlugin->setApplication($app);

        $translationServiceProvider = $this->getLocator()->glossary()
            ->pluginServiceProviderTranslationServiceProvider()
            ->setGlossaryClient($this->getLocator()->glossary()->client());

        $userProvider = $this->getLocator()->customer()->pluginUserProvider()
            ->setCustomerClient($this->getLocator()->customer()->client());

        $securityServiceProvider = $this->getLocator()->customer()->pluginServiceProviderSecurityServiceProvider();
        $securityServiceProvider->setUserProvider($userProvider);

        $sessionServiceProvider = $this->getLocator()->session()->pluginServiceProviderSessionServiceProvider();
        $sessionServiceProvider->setClient($this->getLocator()->session()->client());

        $providers = [
            new SessionServiceProvider(),
            new SecurityServiceProvider(),
            $this->getLocator()->application()->pluginServiceProviderYvesSecurityServiceProvider(),
            $this->getLocator()->application()->pluginServiceProviderExceptionServiceProvider(),
            new YvesLoggingServiceProvider(new EventJournalClient(), new Api()),
            new MonologServiceProvider(),
            new CookieServiceProvider(),
            $sessionServiceProvider,
            new UrlGeneratorServiceProvider(),
            new ServiceControllerServiceProvider(),
            $securityServiceProvider,
            new RememberMeServiceProvider(),
            new RoutingServiceProvider(),
            $translationServiceProvider,
            new ValidatorServiceProvider(),
            new FormServiceProvider(),
            new TwigServiceProvider(),
            new HttpFragmentServiceProvider(),
        ];

        if (Config::get(ApplicationConfig::ENABLE_WEB_PROFILER, false)) {
            $providers[] = new WebProfilerServiceProvider();
        }

        return $providers;
    }

}
