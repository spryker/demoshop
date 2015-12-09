<?php

namespace Pyz\Yves\Application\Plugin\Provider;

use Pyz\Yves\Application\Plugin\Pimple;
use Pyz\Yves\Twig\Plugin\TwigYves;
use Silex\Application;
use SprykerEngine\Shared\Config;
use SprykerEngine\Shared\Kernel\Store;
use SprykerFeature\Shared\Application\ApplicationConfig;
use SprykerFeature\Shared\Library\Application\Environment as ApplicationEnvironment;
use SprykerFeature\Shared\Library\DataDirectory;
use SprykerFeature\Shared\Library\Environment;
use SprykerFeature\Shared\System\SystemConfig;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;

class ApplicationServiceProvider extends AbstractServiceProvider
{

    const LOCALE = 'locale';
    const REQUEST_URI = 'REQUEST_URI';

    /**
     * @var Application
     */
    private $application;

    /**
     * @param Application $app
     *
     * @return void
     */
    public function register(Application $app)
    {
        $this->application = $app;

        $this->setPimpleApplication();
        $this->setDebugMode();
        $this->setControllerResolver();
        $this->setProfilerCacheDirectory();
        $this->setTrustedProxies();
        $this->setLocale();
        $this->setLogLevel();
        $this->setProtocolCheck();

        $this->addTwigExtension($this->application, [
            (new TwigYves())->getTwigYvesExtension($this->application),
        ]);

        $this->addGlobalTemplateVariable($this->application, [
            'environment' => Environment::getEnvironment(),
        ]);
    }

    /**
     * @param Application $app
     *
     * @return void
     */
    public function boot(Application $app)
    {
        // do nothing
    }

    /**
     * @return void
     */
    protected function setPimpleApplication()
    {
        $pimplePlugin = new Pimple();
        $pimplePlugin->setApplication($this->application);
    }

    /**
     * @return void
     */
    protected function setDebugMode()
    {
        $this->application['debug'] = Config::get(ApplicationConfig::ENABLE_APPLICATION_DEBUG, false);
    }

    /**
     * @return void
     */
    protected function setControllerResolver()
    {
        // We use the controller resolver from symfony as
        // we do not need the feature from the silex one
        $this->application['resolver'] = $this->application->share(function () {
            return new ControllerResolver($this->application['logger']);
        });
    }

    /**
     * @return void
     */
    protected function setProfilerCacheDirectory()
    {
        if (Config::get(ApplicationConfig::ENABLE_WEB_PROFILER, false)) {
            $this->application['profiler.cache_dir'] = DataDirectory::getLocalStoreSpecificPath('cache/profiler');
        }
    }

    /**
     * @return void
     */
    protected function setTrustedProxies()
    {
        $proxies = Config::get(ApplicationConfig::YVES_TRUSTED_PROXIES);
        Request::setTrustedProxies($proxies);
    }

    /**
     * @return void
     */
    protected function setLocale()
    {
        $store = Store::getInstance();
        $store->setCurrentLocale(current($store->getLocales()));
        $this->application[self::LOCALE] = $store->getCurrentLocale();

        if (array_key_exists(self::REQUEST_URI, $_SERVER)) {
            $requestUri = $_SERVER[self::REQUEST_URI];
            $identifier = mb_substr($requestUri, 1, 2);

            if ($identifier !== false && array_key_exists($identifier, $store->getLocales())) {
                $store->setCurrentLocale($store->getLocales()[$identifier]);
                $this->application[self::LOCALE] = $store->getCurrentLocale();

                ApplicationEnvironment::initializeLocale($store->getCurrentLocale());
            }
        }
    }

    /**
     * @return void
     */
    protected function setLogLevel()
    {
        $this->application['monolog.level'] = Config::get(SystemConfig::LOG_LEVEL);
    }

    /**
     * @return void
     */
    protected function setProtocolCheck()
    {
        if (!Config::get(ApplicationConfig::YVES_SSL_ENABLED) || !Config::get(ApplicationConfig::YVES_COMPLETE_SSL_ENABLED)) {
            return;
        }

        $this->application->before(
            function (Request $request) {
                if (!$request->isSecure()
                    && !in_array($request->getPathInfo(), Config::get(ApplicationConfig::YVES_SSL_EXCLUDED))
                ) {
                    $fakeRequest = clone $request;
                    $fakeRequest->server->set('HTTPS', true);

                    return new RedirectResponse($fakeRequest->getUri(), 301);
                }

                return null;
            },
            255
        );
    }

}
