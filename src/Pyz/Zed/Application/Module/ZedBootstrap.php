<?php
namespace Pyz\Zed\Application\Module;

use ProjectA\Shared\Library\Config;
use ProjectA\Shared\Library\Silex\Application;
use ProjectA\Shared\Library\Silex\Bootstrap;
use ProjectA\Shared\System\SystemConfig;
use ProjectA\Shared\Yves\YvesConfig;
use ProjectA\Zed\Application\Component\Model\Router\MvcRouter;
use ProjectA\Zed\Auth\Component\Model\Auth;
use ProjectA\Zed\Library\Silex\Provider\TwigServiceProvider;
use ProjectA\Zed\Library\Silex\Application as ZedApplication;
use ProjectA\Zed\Library\Twig\Extension\ZedExtension;
use Silex\Provider\FormServiceProvider;
use Silex\Provider\RememberMeServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use SilexRouting\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Silex\Provider\WebProfilerServiceProvider;
use SilexRouting\Provider\RoutingServiceProvider;
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
            new UrlGeneratorServiceProvider(),
            new ServiceControllerServiceProvider(),
            new RoutingServiceProvider(),
            new ValidatorServiceProvider(),
            new FormServiceProvider(),
            new TwigServiceProvider(),
        ];

//        if (\ProjectA_Shared_Library_Environment::isDevelopment()) {
//            $providers[] = new WebProfilerServiceProvider();
//        }

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
            new MvcRouter($app)
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
