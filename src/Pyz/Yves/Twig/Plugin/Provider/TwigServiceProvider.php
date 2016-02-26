<?php

namespace Pyz\Yves\Twig\Plugin\Provider;

use Pyz\Yves\Twig\Loader\YvesFilesystemLoader;
use Silex\Application;
use Silex\Provider\TwigServiceProvider as SilexTwigServiceProvider;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Config\Config;
use Spryker\Shared\Kernel\Store;
use Spryker\Yves\Application\Routing\Helper;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class TwigServiceProvider extends SilexTwigServiceProvider
{

    /**
     * @var \Spryker\Yves\Application\Application
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
        $helper = new Helper($this->app);
        $request = $this->app['request_stack']->getCurrentRequest();
        $controller = $request->attributes->get('_controller');

        if (!is_string($controller) || empty($controller)) {
            return null;
        }

        if (isset($parameters['alternativeRoute'])) {
            $route = (string)$parameters['alternativeRoute'];
        } else {
            $route = $helper->getRouteFromDestination($controller);
        }

        return $this->app->render('@' . $route . '.twig', $parameters);
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
            $namespace = Config::get(ApplicationConstants::PROJECT_NAMESPACE);
            $store = Store::getInstance()->getStoreName();

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
     * @param \Silex\Application $app
     *
     * @return void
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
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function registerTwigCache(Application $app)
    {
        $app['twig.options'] = Config::get(ApplicationConstants::YVES_TWIG_OPTIONS);
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
                                new \Twig_Loader_Filesystem(__DIR__ . '/../../Resources/views/Form')
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
