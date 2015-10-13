<?php

namespace Pyz\Zed\Application\Communication;

use Silex\Provider\FormServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Silex\Provider\WebProfilerServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;
use Silex\ServiceProviderInterface;
use SprykerEngine\Shared\Kernel\Store;
use SprykerEngine\Zed\Application\Communication\ZedBootstrap as SprykerZedBootstrap;
use SprykerFeature\Shared\Application\ApplicationConfig;
use SprykerEngine\Shared\Application\Communication\Application;
use SprykerFeature\Shared\Application\Business\Routing\SilexRouter;
use SprykerFeature\Shared\Library\Config;
use SprykerFeature\Shared\Library\Context;
use SprykerFeature\Shared\Library\DataDirectory;
use SprykerFeature\Shared\Library\DateFormatter;
use SprykerFeature\Shared\Library\Environment;
use SprykerFeature\Shared\Library\Twig\DateFormatterTwigExtension;
use SprykerFeature\Shared\System\SystemConfig;
use SprykerFeature\Zed\Application\Business\Model\Router\MvcRouter;
use SprykerFeature\Zed\Application\Business\Model\Twig\ZedExtension;
use SprykerFeature\Zed\Price\Communication\Plugin\Twig\PriceTwigExtensions;
use Symfony\Bridge\Twig\Extension\TranslationExtension;
use Symfony\Component\Routing\RouterInterface;

class ZedBootstrap extends SprykerZedBootstrap
{

    /**
     * @param Application $app
     *
     * @return \Twig_Extension[]
     */
    protected function getTwigExtensions(Application $app)
    {
        return [
            new ZedExtension(),
            new TranslationExtension($app['translator']),
            new PriceTwigExtensions(),
            new DateFormatterTwigExtension(new DateFormatter(Context::getInstance())),
        ];
    }

    /**
     * @param Application $app
     */
    protected function beforeBoot(Application $app)
    {
        $app['locale'] = Store::getInstance()->getCurrentLocale();
        if (Environment::isDevelopment()) {
            $app['profiler.cache_dir'] = DataDirectory::getLocalStoreSpecificPath('cache/profiler');
        }
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
     *
     * @return ServiceProviderInterface[]
     */
    protected function getServiceProviders(Application $app)
    {
        $providers = [
            new SessionServiceProvider(),
            $this->getSessionServiceProvider(),
            $this->getLocator()->propel()->pluginServiceProviderPropelServiceProvider(),
            $this->getLocator()->auth()->pluginServiceProviderRedirectAfterLoginProvider(),
            $this->getLocator()->auth()->pluginBootstrapAuthBootstrapProvider(),
            $this->getLocator()->application()->pluginServiceProviderRequestServiceProvider(),
            $this->getLocator()->application()->pluginServiceProviderSslServiceProvider(),
            new ServiceControllerServiceProvider(),
            $this->getLocator()->application()->pluginServiceProviderRoutingServiceProvider(),
            $this->getLocator()->acl()->pluginBootstrapAclBootstrapProvider(),
            new ValidatorServiceProvider(),
            new FormServiceProvider(),
            new TwigServiceProvider(),
            $this->getLocator()->application()->pluginServiceProviderTwigServiceProvider(),
            $this->getLocator()->application()->pluginServiceProviderEnvironmentInformationServiceProvider(),
            $this->getLocator()->translation()->pluginTranslationServiceProvider(),
            $this->getGatewayServiceProvider(),
            $this->getLocator()->application()->pluginServiceProviderUrlGeneratorServiceProvider(),
            $this->getLocator()->application()->pluginServiceProviderNewRelicServiceProvider(),
            new HttpFragmentServiceProvider(),
        ];

        if (Config::get(ApplicationConfig::SHOW_SYMFONY_TOOLBAR)) {
            $providers[] = new WebProfilerServiceProvider();
        }

        return $providers;
    }

    /**
     * @param Application $app
     *
     * @return RouterInterface[]
     */
    protected function getRouters(Application $app)
    {
        return [
            new MvcRouter($app),
            new SilexRouter($app),
        ];
    }

    /**
     * @param Application $app
     *
     * @return array
     */
    protected function globalTemplateVariables(Application $app)
    {
        $navigation = $this->getNavigation();
        $breadcrumbs = $navigation['path'];

        return [
            'environment' => APPLICATION_ENV,
            'store' => Store::getInstance()->getStoreName(),
            'title' => Config::get(SystemConfig::PROJECT_NAMESPACE) . ' | Zed | ' . ucfirst(APPLICATION_ENV),
            'currentController' => get_class($this),
            'navigation' => $navigation,
            'breadcrumbs' => $breadcrumbs,
            'username' => $this->getUsername(),
        ];
    }

}
