<?php
namespace Pyz\Yves\Application\Module;

use ProjectA\Yves\Library\Silex\Application;
use ProjectA\Yves\Library\Silex\Provider\Service\CookieServiceProvider;
use ProjectA\Yves\Library\Silex\Provider\Service\StorageServiceProvider;
use ProjectA\Yves\Library\Silex\Provider\Service\ExceptionServiceProvider;
use ProjectA\Yves\Library\Silex\Provider\Service\TemplatingServiceProvider;
use ProjectA\Yves\Library\Silex\Provider\Service\YvesLoggingServiceProvider;
use ProjectA\Yves\Library\Silex\Routing\SilexRouter;
use ProjectA\Yves\Library\Templating\EngineConfig;
use ProjectA\Yves\Library\Templating\Filesystem\Finder\ChainFinder;
use ProjectA\Yves\Library\Templating\Filesystem\Finder\CoreFinder;
use ProjectA\Yves\Library\Templating\Filesystem\Finder\ProjectFinder;
use ProjectA\Yves\Library\Templating\Filesystem\Finder\StoreFinder;
use ProjectA\Yves\Library\Templating\Filter\MinifyHtmlFilter;
use ProjectA\Yves\Library\Templating\Theme;
use ProjectA\Yves\Cart\Module\ControllerProvider as CartProvider;
use ProjectA\Yves\Catalog\Module\ControllerProvider as CatalogProvider;
use ProjectA\Yves\Library\Templating\ViewHelper\PriceHelper;
use ProjectA\Yves\Library\Templating\ViewHelper\UrlHelper;
use ProjectA\Yves\Setup\Module\ControllerProvider as SetupProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\ServiceProviderInterface;
use Silex\ControllerProviderInterface;
use SilexRouting\Provider\RoutingServiceProvider;
use Symfony\Component\Routing\RouterInterface;

class Bootstrap extends \ProjectA\Yves\Library\Silex\Bootstrap
{
    /**
     * @param Application $app
     */
    protected function afterBoot(Application $app)
    {
        $app['templating_theme'] = $app->share(function () {
            $themeName = \ProjectA_Shared_Library_Config::get('yves')->theme;
            $finder = new ChainFinder();
            $finder->addFinder(new StoreFinder());
            $finder->addFinder(new ProjectFinder());
            $finder->addFinder(new CoreFinder());

            $theme = new Theme($themeName, $finder);
            return $theme;
        });

        $app['templating_config'] = $app->share($app->extend('templating_config', function (EngineConfig $config, Application $app) {
            $config->registerViewHelper('url', new UrlHelper($app));
            $config->registerViewHelper('price', new PriceHelper($app));
            $config->registerFilter(new MinifyHtmlFilter());

            $config->setCustomLayoutScopeClass('Pyz\Yves\Library\Templating\Scope\LayoutScope');
            $config->setCustomTemplateScopeClass('Pyz\Yves\Library\Templating\Scope\TemplateScope');
            $config->setCustomPartialScopeClass('Pyz\Yves\Library\Templating\Scope\PartialScope');
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
            new SessionServiceProvider(),
            new UrlGeneratorServiceProvider(),
            new ServiceControllerServiceProvider(),
            new RoutingServiceProvider(),
            new TemplatingServiceProvider(),
            new StorageServiceProvider()
        ];
    }

    /**
     * @return ControllerProviderInterface[]
     */
    protected function getControllerProviders()
    {
        return [
            new CartProvider(),
            new SetupProvider(),
            new CatalogProvider()
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
