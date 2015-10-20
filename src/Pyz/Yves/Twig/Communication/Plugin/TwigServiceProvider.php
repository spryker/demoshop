<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Twig\Communication\Plugin;

use SprykerFeature\Shared\Application\ApplicationConfig;
use SprykerFeature\Shared\Library\Config;
use SprykerFeature\Shared\System\SystemConfig;
use SprykerFeature\Shared\Yves\YvesConfig;
use SprykerEngine\Yves\Application\Communication\Application as SprykerApplication;
use SprykerEngine\Yves\Application\Business\Routing\Helper;
use Silex\Application;
use Silex\Provider\TwigServiceProvider as SilexTwigServiceProvider;
use Pyz\Yves\Twig\Communication\Loader\YvesFilesystemLoader;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class TwigServiceProvider extends SilexTwigServiceProvider
{

    /**
     * @var SprykerApplication
     */
    private $app;

    /**
     * @var array
     */
    private $formThemes;

    /**
     * @param array $formThemes
     */
    public function __construct(array $formThemes = ['core_form_div_layout.html.twig'])
    {
        $this->formThemes = $formThemes;
    }

    /**
     * @param Application $app
     */
    public function register(Application $app)
    {
        $this->app = $app;

        SilexTwigServiceProvider::register($app);
        $this->registerYvesLoader($app);
        $this->registerTwigLoaderChain($app);
        $this->registerTwigCache($app);
        $this->registerTwig($app);
    }

    /**
     * Handles string responses.
     *
     * @param GetResponseForControllerResultEvent $event The event to handle
     */
    public function onKernelView(GetResponseForControllerResultEvent $event)
    {
        $response = $event->getControllerResult();

        if (empty($response) || is_array($response)) {
            $response = $this->render((array) $response);
            if ($response instanceof Response) {
                $event->setResponse($response);
            }
        }
    }

    /**
     * @param Application $app
     */
    public function boot(Application $app)
    {
        $app['dispatcher']->addListener(KernelEvents::VIEW, [$this, 'onKernelView'], 0);
    }

    /**
     * Renders the template for the current controller/action
     *
     * @param array $parameters
     *
     * @return Response
     */
    protected function render(array $parameters = [])
    {
        $helper = new Helper($this->app);
        $controller = $this->app['request']->attributes->get('_controller');

        if (!is_string($controller) || empty($controller)) {
            return;
        }

        if (isset($parameters['alternativeRoute'])) {
            $route = (string) $parameters['alternativeRoute'];
        } else {
            $route = $helper->getRouteFromDestination($controller);
        }

        return $this->app->render('@' . $route . '.twig', $parameters);
    }

    /**
     * @param Application $app
     */
    protected function registerYvesLoader(Application $app)
    {
        $app['twig.loader.yves'] = $app->share(function () {
            $themeName = Config::get(YvesConfig::YVES_THEME);
            $namespace = Config::get(SystemConfig::PROJECT_NAMESPACE);
            $store = \SprykerEngine\Shared\Kernel\Store::getInstance()->getStoreName();

            return new YvesFilesystemLoader(
                [
                    APPLICATION_SOURCE_DIR . '/' . $namespace . '/Yves/%s' . $store . '/Theme/' . $themeName,
                    APPLICATION_SOURCE_DIR . '/' . $namespace . '/Yves/%s/Theme/' . $themeName,
                    APPLICATION_VENDOR_DIR . '/spryker/spryker/Bundles/%1$s/Yves/%1$s/Theme/' . $themeName,
                ]
            );
        });
    }

    /**
     * @param Application $app
     */
    protected function registerTwigLoaderChain(Application $app)
    {
        $app['twig.loader'] = $app->share(function ($app) {
            return new \Twig_Loader_Chain(
                [
                    $app['twig.loader.yves'],
                    $app['twig.loader.filesystem'],
                ]
            );
        });
    }

    /**
     * @param Application $app
     */
    protected function registerTwigCache(Application $app)
    {
        $app['twig.options'] = Config::get(ApplicationConfig::YVES_TWIG_OPTIONS);
    }

    /**
     * @param Application $app
     */
    protected function registerTwig(Application $app)
    {
        $app['twig.form.templates'] = $this->formThemes;
        $app['twig.global.variables'] = $app->share(function () {
            return [];
        });
        $app['twig'] = $app->share(
            $app->extend(
                'twig',
                function (\Twig_Environment $twig) use ($app) {
                    if (class_exists('Symfony\Bridge\Twig\Extension\RoutingExtension')) {
                        if (isset($app['form.factory'])) {
                            $app['twig.loader']->addLoader(
                                new \Twig_Loader_Filesystem(__DIR__ . '/../Resources/views/Form')
                            );
                        }
                    }

                    foreach ($app['twig.global.variables'] as $name => $value) {
                        $twig->addGlobal($name, $value);
                    }

                    return $twig;
                }
            )
        );
    }

}
