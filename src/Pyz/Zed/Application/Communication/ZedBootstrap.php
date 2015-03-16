<?php

namespace Pyz\Zed\Application\Communication;

use Generated\Zed\Ide\AutoCompletion;
use ProjectA\Shared\Application\Business\Application;
use ProjectA\Shared\Application\Business\Bootstrap;
use ProjectA\Shared\Application\Communication\Plugin\ServiceProvider\RoutingServiceProvider;
use ProjectA\Shared\Application\Communication\Plugin\ServiceProvider\UrlGeneratorServiceProvider;
use ProjectA\Shared\Library\Config;

use ProjectA\Shared\System\SystemConfig;
use ProjectA\Shared\Application\Business\Routing\SilexRouter;

use ProjectA\Zed\Application\Business\Model\Router\MvcRouter;
use ProjectA\Zed\Application\Business\Model\Twig\ZedExtension;
use ProjectA\Zed\Application\Communication\Plugin\Pimple;
use ProjectA\Zed\Application\Communication\Plugin\ServiceProvider\EnvironmentInformationServiceProvider;
use ProjectA\Zed\Application\Communication\Plugin\ServiceProvider\NewRelicServiceProvider;
use ProjectA\Zed\Application\Communication\Plugin\ServiceProvider\PropelServiceProvider;
use ProjectA\Zed\Application\Communication\Plugin\ServiceProvider\RequestServiceProvider;
use ProjectA\Zed\Application\Communication\Plugin\ServiceProvider\SessionServiceProvider;
use ProjectA\Zed\Application\Communication\Plugin\ServiceProvider\SslServiceProvider;
use ProjectA\Zed\Application\Communication\Plugin\ServiceProvider\TranslationServiceProvider;

use ProjectA\Zed\Application\Communication\Plugin\ServiceProvider\TwigServiceProvider;
use ProjectA\Zed\Auth\Business\Model\Auth;

use ProjectA\Zed\Cms\Communication\Plugin\ServiceProvider\CmsServiceProvider;

use ProjectA\Zed\Kernel\Locator;
use ProjectA\Zed\ProductImage\Business\ServiceProvider\ProductImageServiceProvider;

use ProjectA\Zed\Auth\Communication\Plugin\ServiceProvider\SecurityServiceProvider;
use ProjectA\Zed\Yves\Communication\Plugin\ServiceProvider\FrontendServiceProvider;

use Silex\Provider\FormServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;
use Silex\Provider\RememberMeServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Silex\Provider\WebProfilerServiceProvider;

use SprykerFeature\Zed\Acl\Communication\Plugin\ServiceProvider\AclServiceProvider;
use Symfony\Component\HttpFoundation\Request;

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
        $app['locale'] = \ProjectA_Shared_Library_Store::getInstance()->getCurrentLocale();
        if (\ProjectA_Shared_Library_Environment::isDevelopment()) {
            $app['profiler.cache_dir'] = \ProjectA_Shared_Library_Data::getLocalStoreSpecificPath('cache/profiler');
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
     * @return \Silex\ServiceProviderInterface[]
     */
    protected function getServiceProviders(Application $app)
    {
        /** @var AutoCompletion $locator */
        $locator = Locator::getInstance();

        $providers = [
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
            new SessionServiceProvider(),
            new PropelServiceProvider(),
            new FrontendServiceProvider(),
            new UrlGeneratorServiceProvider(),
            new CmsServiceProvider(),
            new NewRelicServiceProvider(),
        ];

        if (\ProjectA_Shared_Library_Environment::isDevelopment()) {
            $providers[] = new WebProfilerServiceProvider();
        }

        return $providers;
    }

    /**
     * @param Application $app
     * @return \Symfony\Component\Routing\RouterInterface[]
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
     * @return array
     */
    protected function globalTemplateVariables(Application $app)
    {
        return [
            'environment' => APPLICATION_ENV,
            'store' => \ProjectA_Shared_Library_Store::getInstance()->getStoreName(),
            'title' => Config::get(SystemConfig::PROJECT_NAMESPACE) . ' | Zed | ' . ucfirst(APPLICATION_ENV),
            'currentController' => get_class($this)
        ];
    }
}

