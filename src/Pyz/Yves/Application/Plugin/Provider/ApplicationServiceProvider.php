<?php

namespace Pyz\Yves\Application\Plugin\Provider;

use Pyz\Yves\Application\Plugin\Pimple;
use Silex\Application;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Config;
use Spryker\Shared\Kernel\Store;
use Spryker\Shared\Library\Application\Environment as ApplicationEnvironment;
use Spryker\Shared\Library\DataDirectory;
use Spryker\Shared\Library\Environment;
use Spryker\Yves\Kernel\ControllerResolver\YvesFragmentControllerResolver;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class ApplicationServiceProvider extends AbstractServiceProvider
{

    const LOCALE = 'locale';
    const REQUEST_URI = 'REQUEST_URI';

    /**
     * @var \Silex\Application
     */
    private $application;

    /**
     * @param \Silex\Application $app
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
            $this->getFactory()->createTwigYvesExtension($this->application),
            $this->getFactory()->createDateFormatterTwigExtension(),
        ]);

        $this->addGlobalTemplateVariable($this->application, [
            'environment' => Environment::getEnvironment(),
        ]);
    }

    /**
     * @param \Silex\Application $app
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
        $this->application['debug'] = Config::get(ApplicationConstants::ENABLE_APPLICATION_DEBUG, false);
    }

    /**
     * @return void
     */
    protected function setControllerResolver()
    {
        $this->application['resolver'] = $this->application->share(function () {
            return new YvesFragmentControllerResolver($this->application, $this->application['logger']);
        });
    }

    /**
     * @return void
     */
    protected function setProfilerCacheDirectory()
    {
        if (Config::get(ApplicationConstants::ENABLE_WEB_PROFILER, false)) {
            $this->application['profiler.cache_dir'] = DataDirectory::getLocalStoreSpecificPath('cache/profiler');
        }
    }

    /**
     * @return void
     */
    protected function setTrustedProxies()
    {
        $proxies = Config::get(ApplicationConstants::YVES_TRUSTED_PROXIES);
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
        $this->application['monolog.level'] = Config::get(ApplicationConstants::LOG_LEVEL);
    }

    /**
     * @return void
     */
    protected function setProtocolCheck()
    {
        if (!Config::get(ApplicationConstants::YVES_SSL_ENABLED) || !Config::get(ApplicationConstants::YVES_COMPLETE_SSL_ENABLED)) {
            return;
        }

        $this->application->before(
            function (Request $request) {
                if (!$request->isSecure()
                    && !in_array($request->getPathInfo(), Config::get(ApplicationConstants::YVES_SSL_EXCLUDED))
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
