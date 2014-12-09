<?php
namespace Pyz\Zed\Application\Module;

use ProjectA\Shared\Library\Config;
use ProjectA\Shared\Library\Silex\Application;
use ProjectA\Shared\Library\Silex\Bootstrap;
use ProjectA\Shared\System\SystemConfig;
use ProjectA\Shared\Yves\YvesConfig;
use ProjectA\Zed\Application\Component\Model\Router\MvcRouter;
use ProjectA\Zed\Application\Module\ServiceProvider\EnvironmentInformationServiceProvider;
use ProjectA\Zed\Application\Module\ServiceProvider\NewRelicServiceProvider;
use ProjectA\Zed\Application\Module\ServiceProvider\PropelServiceProvider;
use ProjectA\Zed\Application\Module\ServiceProvider\SessionServiceProvider;
use ProjectA\Zed\Application\Module\ServiceProvider\SslServiceProvider;
use ProjectA\Zed\Application\Module\ServiceProvider\TranslationServiceProvider;
use ProjectA\Zed\Auth\Component\Model\Auth;
use ProjectA\Zed\Cms\Module\ServiceProvider\CmsServiceProvider;
use ProjectA\Zed\Library\Silex\Provider\RequestServiceProvider;
use ProjectA\Zed\Library\Silex\Provider\TwigServiceProvider;
use ProjectA\Zed\Library\Silex\Application as ZedApplication;
use ProjectA\Zed\Library\Twig\Extension\ZedExtension;
use ProjectA\Zed\ProductImage\Component\ServiceProvider\ProductImageServiceProvider;
use ProjectA\Zed\Security\Module\ServiceProvider\SecurityServiceProvider;
use ProjectA\Zed\Yves\Module\ServiceProvider\TransferObjectInjectionServiceProvider;
use Silex\Provider\FormServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;
use Silex\Provider\RememberMeServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use SilexRouting\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Silex\Provider\WebProfilerServiceProvider;
use SilexRouting\Provider\RoutingServiceProvider;
use SilexRouting\SilexRouter;
use Symfony\Component\HttpFoundation\Request;

class ZedBootstrap extends Bootstrap
{
    /**
     * @return Application|ZedApplication
     */
    protected function getBaseApplication()
    {
        return new ZedApplication();
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
    protected function getServiceProviders()
    {
        $providers = [
            new RequestServiceProvider(),
            new SslServiceProvider(),
            new UrlGeneratorServiceProvider(),
            new ServiceControllerServiceProvider(),
            new RoutingServiceProvider(),
            new ValidatorServiceProvider(),
            new FormServiceProvider(),
            new TwigServiceProvider(),
            new EnvironmentInformationServiceProvider(),
            new TranslationServiceProvider(),
            new SessionServiceProvider(),
            new PropelServiceProvider(),
            new SecurityServiceProvider(),
//            new ProductImageServiceProvider(), You can find this in catalog-package feature/387-replace-zf-with-silex
            new CmsServiceProvider(),
            new TransferObjectInjectionServiceProvider(),
            new NewRelicServiceProvider(),
        ];

        if (\ProjectA_Shared_Library_Environment::isDevelopment()) {
            $providers[] = new WebProfilerServiceProvider();
        }

        return $providers;
    }

    /**
     * @return \Silex\ControllerProviderInterface[]
     */
    protected function getControllerProviders()
    {
        return [];
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
            'identity' => (Auth::getInstance()->hasIdentity()) ? Auth::getInstance()->getIdentity() : false,
            'title' => Config::get(SystemConfig::PROJECT_NAMESPACE) . ' | Zed | ' . ucfirst(APPLICATION_ENV),
            'currentController' => get_class($this)
        ];
    }
}

