<?php
namespace Sao\Yves\Application;

use ProjectA\Yves\Library\Silex\Application;
use ProjectA\Yves\Library\Silex\Provider\Service\CookieServiceProvider;
use ProjectA\Yves\Library\Silex\Provider\Service\ExceptionServiceProvider;
use ProjectA\Yves\Library\Silex\Provider\Service\TemplatingServiceProvider;
use ProjectA\Yves\Library\Silex\Provider\Service\YvesLoggingServiceProvider;
use ProjectA\Yves\Library\Templating\EngineConfig;
use ProjectA\Yves\Library\Templating\Filesystem\Finder\CoreFinder;
use ProjectA\Yves\Library\Templating\Filesystem\Finder\ProjectFinder;
use ProjectA\Yves\Library\Templating\Filesystem\Finder\StoreFinder;
use ProjectA\Yves\Library\Templating\Filter\MinifyHtmlFilter;
use ProjectA\Yves\Library\Templating\Theme;
use ProjectA\Yves\Library\Templating\ViewHelper\UrlGenerator;
use Sao\Yves\Cart\Module\ControllerProvider as CartProvider;
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\ServiceProviderInterface;
use Silex\ControllerProviderInterface;
use SilexRouting\Provider\RoutingServiceProvider;
use SilexRouting\SilexRouter;
use Symfony\Component\Routing\RouterInterface;

/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class Bootstrap extends \ProjectA\Yves\Library\Silex\Bootstrap
{
    /**
     * @param Application $app
     */
    protected function afterBoot(Application $app)
    {
        $app['yves_templating_theme'] = $app->share(function () {
            $themeName = \ProjectA_Shared_Library_Config::get('yves')->theme;
            $theme = new Theme($themeName);
            $theme->addTemplateFinder(new StoreFinder());
            $theme->addTemplateFinder(new ProjectFinder());
            $theme->addTemplateFinder(new CoreFinder());
            return $theme;
        });

        $app['yves_templating_config'] = $app->share($app->extend('yves_templating_config', function (EngineConfig $config, Application $app) {
            $config->registerViewHelper('url', new UrlGenerator($app));
            $config->registerFilter(new MinifyHtmlFilter());

            $config->setCustomLayoutScopeClass('Sao\Yves\Library\Templating\Scope\LayoutScope');
            $config->setCustomTemplateScopeClass('Sao\Yves\Library\Templating\Scope\TemplateScope');
            $config->setCustomPartialScopeClass('Sao\Yves\Library\Templating\Scope\PartialScope');
            return $config;
        }));
    }

    /**
     * @return ServiceProviderInterface[]
     */
    protected function getServiceProviders()
    {
        return [
            new ExceptionServiceProvider(),
            new YvesLoggingServiceProvider(),
            new CookieServiceProvider(),
            new UrlGeneratorServiceProvider(),
            new RoutingServiceProvider(),
            new SessionServiceProvider(),
            new TemplatingServiceProvider()
        ];
    }

    /**
     * @return ControllerProviderInterface[]
     */
    protected function getControllerProviders()
    {
        return [
            new CartProvider()
        ];
    }

    /**
     * @param Application $app
     * @return RouterInterface[]
     */
    protected function getRouters(Application $app)
    {
        return [
            new SilexRouter($app)
        ];
    }


}
