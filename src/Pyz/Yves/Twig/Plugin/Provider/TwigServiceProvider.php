<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Twig\Plugin\Provider;

use Pyz\Yves\Twig\Loader\YvesFilesystemLoader;
use Silex\Application;
use Silex\Provider\TwigServiceProvider as SilexTwigServiceProvider;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Config\Config;
use Spryker\Shared\Kernel\KernelConstants;
use Spryker\Shared\Kernel\Store;
use Spryker\Shared\Twig\TwigConstants;
use Spryker\Yves\Application\Routing\Helper;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Twig_Loader_Chain;
use Twig_Loader_Filesystem;

class TwigServiceProvider extends SilexTwigServiceProvider
{

    /**
     * @var \Spryker\Yves\Kernel\Application
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
     * @param \Silex\Application $app
     *
     * @return void
     */
    public function register(Application $app)
    {
        $this->app = $app;

        parent::register($app);

        $this->registerYvesLoader($app);
        $this->registerTwigLoaderChain($app);
        $this->registerTwigCache($app);
        $this->registerTwig($app);
    }

    /**
     * Handles string responses.
     *
     * @param \Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent $event The event to handle
     *
     * @return void
     */
    public function onKernelView(GetResponseForControllerResultEvent $event)
    {
        $response = $event->getControllerResult();

        if (empty($response) || is_array($response)) {
            $response = $this->render((array)$response);
            if ($response instanceof Response) {
                $event->setResponse($response);
            }
        }
    }

    /**
     * @param \Silex\Application $app
     *
     * @return void
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
     * @return \Symfony\Component\HttpFoundation\Response|null
     */
    protected function render(array $parameters = [])
    {
        $request = $this->app['request_stack']->getCurrentRequest();
        $controller = $request->attributes->get('_controller');

        if (!is_string($controller) || empty($controller)) {
            return null;
        }

        $route = $this->getRoute($parameters, $controller);

        return $this->app->render('@' . $route . '.twig', $parameters);
    }

    /**
     * @param array $parameters
     * @param string $controller
     *
     * @return string
     */
    protected function getRoute(array $parameters, $controller)
    {
        if (isset($parameters['alternativeRoute'])) {
            return (string)$parameters['alternativeRoute'];
        }
        $helper = new Helper($this->app);

        return $helper->getRouteFromDestination($controller);
    }

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function registerYvesLoader(Application $app)
    {
        $app['twig.loader.yves'] = $app->share(function () {
            $themeName = Config::get(ApplicationConstants::YVES_THEME);
            $namespaces = Config::get(KernelConstants::PROJECT_NAMESPACES);
            $store = Store::getInstance()->getStoreName();

            $paths = [];
            foreach ($namespaces as $namespace) {
                $paths[] = APPLICATION_SOURCE_DIR . '/' . $namespace . '/Yves/%s' . $store . '/Theme/' . $themeName;
                $paths[] = APPLICATION_SOURCE_DIR . '/' . $namespace . '/Yves/%s/Theme/' . $themeName;
            }
            $paths[] = Config::get(KernelConstants::SPRYKER_ROOT) . '/%1$s/src/Spryker/Yves/%1$s/Theme/' . $themeName;

            return new YvesFilesystemLoader($paths);

        });
    }

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function registerTwigLoaderChain(Application $app)
    {
        $app['twig.loader'] = $app->share(function ($app) {
            return new Twig_Loader_Chain(
                [
                    $app['twig.loader.yves'],
                    $app['twig.loader.filesystem'],
                ]
            );
        });
    }

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function registerTwigCache(Application $app)
    {
        $app['twig.options'] = Config::get(TwigConstants::YVES_TWIG_OPTIONS);
    }

    /**
     * @param \Silex\Application $app
     *
     * @return void
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
                                new Twig_Loader_Filesystem(__DIR__ . '/../../Resources/views/Form')
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
