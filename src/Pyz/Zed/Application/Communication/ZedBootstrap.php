<?php

namespace Pyz\Zed\Application\Communication;

use Generated\Zed\Ide\AutoCompletion;
use SprykerFeature\Shared\Application\Business\Application;
use SprykerFeature\Shared\Application\Business\Bootstrap;
use SprykerFeature\Shared\Application\Communication\Plugin\ServiceProvider\RoutingServiceProvider;
use SprykerFeature\Shared\Application\Communication\Plugin\ServiceProvider\UrlGeneratorServiceProvider;
use SprykerFeature\Shared\Library\Config;
use SprykerFeature\Shared\System\SystemConfig;
use SprykerFeature\Shared\Application\Business\Routing\SilexRouter;
use SprykerFeature\Zed\Application\Business\Model\Router\MvcRouter;
use SprykerFeature\Zed\Application\Business\Model\Twig\ZedExtension;
use SprykerFeature\Zed\Application\Communication\Plugin\Pimple;
use SprykerFeature\Zed\Application\Communication\Plugin\ServiceProvider\EnvironmentInformationServiceProvider;
use SprykerFeature\Zed\Application\Communication\Plugin\ServiceProvider\NewRelicServiceProvider;
use SprykerFeature\Zed\Application\Communication\Plugin\ServiceProvider\PropelServiceProvider;
use SprykerFeature\Zed\Application\Communication\Plugin\ServiceProvider\RequestServiceProvider;
use SprykerFeature\Zed\Application\Communication\Plugin\ServiceProvider\SslServiceProvider;
use SprykerFeature\Zed\Application\Communication\Plugin\ServiceProvider\TranslationServiceProvider;
use SprykerFeature\Zed\Application\Communication\Plugin\ServiceProvider\TwigServiceProvider;
use SprykerEngine\Zed\Kernel\Locator;
use SprykerFeature\Zed\Sdk\Communication\Plugin\SdkServiceProviderPlugin;
use Silex\Provider\FormServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Silex\Provider\WebProfilerServiceProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Silex\ServiceProviderInterface;
use Silex\Provider\SessionServiceProvider;
use SprykerEngine\Shared\Kernel\Store;

class ZedBootstrap extends Bootstrap
{
    /**
     * @return Application
     */
    protected function getBaseApplication()
    {
        $application = new Application();

        Pimple::setApplication($application);

        return $application;
    }

    /**
     * @param Application $app
     *
     * @return \Twig_Extension[]
     */
    protected function getTwigExtensions(Application $app)
    {
        return [
            new ZedExtension()
        ];
    }

    /**
     * @param Application $app
     */
    protected function beforeBoot(Application $app)
    {
        $app['locale'] = Store::getInstance()->getCurrentLocale();
        if (\SprykerFeature_Shared_Library_Environment::isDevelopment()) {
            $app['profiler.cache_dir'] = \SprykerFeature_Shared_Library_Data::getLocalStoreSpecificPath('cache/profiler');
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
        /** @var AutoCompletion $locator */
        $locator = Locator::getInstance();

        $providers = [
            new SessionServiceProvider(),
            new PropelServiceProvider(),
            $locator->application()->pluginSession(),
            $locator->auth()->pluginBootstrapAuthBootstrapProvider(),
            new RequestServiceProvider(),
            new SslServiceProvider(),
            new ServiceControllerServiceProvider(),
            new RoutingServiceProvider(),
            $locator->acl()->pluginBootstrapAclBootstrapProvider(),
            new ValidatorServiceProvider(),
            new FormServiceProvider(),
            new TwigServiceProvider(),
            new EnvironmentInformationServiceProvider(),
            new TranslationServiceProvider(),
            $this->getSdkServiceProvider(),
            new UrlGeneratorServiceProvider(),
            new NewRelicServiceProvider(),
        ];

        if (\SprykerFeature_Shared_Library_Environment::isDevelopment()) {
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
            new SilexRouter($app)
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
        $breadcrumbs =  $navigation['path'];

        return [
            'environment' => APPLICATION_ENV,
            'store' => Store::getInstance()->getStoreName(),
            'title' => Config::get(SystemConfig::PROJECT_NAMESPACE) . ' | Zed | ' . ucfirst(APPLICATION_ENV),
            'currentController' => get_class($this),
            'navigation' => $this->getNavigation(),
            'breadcrumbs' => $breadcrumbs,
        ];
    }

    /**
     * @return AutoCompletion
     */
    public function getLocator()
    {
        return Locator::getInstance();
    }

    /**
     * @return SdkServiceProviderPlugin
     */
    protected function getSdkServiceProvider()
    {
        $locator = $this->getLocator();
        $controllerListener = $locator->sdk()->pluginSdkControllerListenerPlugin();
        $sdkServiceProvider = $locator->sdk()->pluginSdkServiceProviderPlugin();
        $sdkServiceProvider->setControllerListener($controllerListener);

        return $sdkServiceProvider;
    }

    /**
     * @return string
     */
    protected function getNavigation()
    {
        $request = Request::createFromGlobals();

        return $this->getLocator()
            ->application()
            ->pluginNavigation()
            ->buildNavigation($request->getPathInfo());
    }
}
