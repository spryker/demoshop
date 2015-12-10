<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Application\Plugin\Provider;

use Pyz\Yves\Application\ApplicationDependencyContainer;
use Pyz\Yves\Application\Business\Model\SessionFactory;
use Silex\Application;
use Silex\ServiceProviderInterface;
use SprykerEngine\Shared\Config;
use SprykerEngine\Yves\Kernel\AbstractPlugin;
use SprykerFeature\Shared\Session\SessionConfig;
use SprykerFeature\Shared\Application\ApplicationConfig;

/**
 * @method ApplicationDependencyContainer getDependencyContainer()
 */
class SessionServiceProvider extends AbstractPlugin implements ServiceProviderInterface
{

    /**
     * @param Application $app
     *
     * @return mixed
     */
    public function register(Application $app)
    {
        $saveHandler = Config::get(ApplicationConfig::YVES_SESSION_SAVE_HANDLER);

        if (!in_array($saveHandler, $this->getSaveHandler())) {
            if (Config::get(ApplicationConfig::YVES_SESSION_SAVE_HANDLER) && $this->getSavePath($saveHandler)) {
                ini_set('session.save_handler', Config::get(ApplicationConfig::YVES_SESSION_SAVE_HANDLER));
                session_save_path($this->getSavePath($saveHandler));
            }
        }

        $sessionStorageOptions = [
            'cookie_httponly' => true,
            'cookie_lifetime' => Config::get(ApplicationConfig::YVES_STORAGE_SESSION_TIME_TO_LIVE),
        ];

        $name = Config::get(ApplicationConfig::YVES_SESSION_NAME);
        if ($name) {
            $sessionStorageOptions['name'] = $name;
        }
        $cookieDomain = Config::get(ApplicationConfig::YVES_SESSION_COOKIE_DOMAIN);
        if ($cookieDomain) {
            $sessionStorageOptions['cookie_domain'] = $cookieDomain;
        }
        $app['session.storage.options'] = $sessionStorageOptions;

        $sessionHelper = new SessionFactory();

        // We manually register our own couchbase session handler, for all other handlers we use the generic one
        switch ($saveHandler) {
            case SessionConfig::SESSION_HANDLER_COUCHBASE:
                $couchbaseSessionHandler = $sessionHelper->registerCouchbaseSessionHandler($this->getSavePath($saveHandler));
                $app['session.storage.handler'] = $app->share(function () use ($couchbaseSessionHandler) {
                    return $couchbaseSessionHandler;
                });
                break;

            case SessionConfig::SESSION_HANDLER_MYSQL:
                $mysqlSessionHandler = $sessionHelper->registerMysqlSessionHandler($this->getSavePath($saveHandler));
                $app['session.storage.handler'] = $app->share(function () use ($mysqlSessionHandler) {
                    return $mysqlSessionHandler;
                });
                break;

            case SessionConfig::SESSION_HANDLER_REDIS:
                $redisSessionHandler = $sessionHelper->registerRedisSessionHandler($this->getSavePath($saveHandler));
                $app['session.storage.handler'] = $app->share(function () use ($redisSessionHandler) {
                    return $redisSessionHandler;
                });
                break;

            case SessionConfig::SESSION_HANDLER_FILE:
                $redisSessionHandler = $sessionHelper->registerFileSessionHandler($this->getSavePath($saveHandler));
                $app['session.storage.handler'] = $app->share(function () use ($redisSessionHandler) {
                    return $redisSessionHandler;
                });
                break;

            default:
                $app['session.storage.handler'] = $app->share(function () {
                    return new \SessionHandler();
                });
        }

        $this->getDependencyContainer()->getSessionClient()->setContainer($app['session']);
    }

    /**
     * @return array
     */
    protected function getSaveHandler()
    {
        return [
            SessionConfig::SESSION_HANDLER_COUCHBASE,
            SessionConfig::SESSION_HANDLER_MYSQL,
            SessionConfig::SESSION_HANDLER_REDIS,
            SessionConfig::SESSION_HANDLER_FILE,
        ];
    }

    /**
     * @param Application $app
     *
     * @return void
     */
    public function boot(Application $app)
    {
    }

    /**
     * @param string $saveHandler
     *
     * @throws \Exception
     *
     * @return string
     */
    protected function getSavePath($saveHandler)
    {
        $path = null;
        switch ($saveHandler) {
            case SessionConfig::SESSION_HANDLER_REDIS:
                $path = Config::get(ApplicationConfig::YVES_STORAGE_SESSION_REDIS_PROTOCOL)
                    . '://' . Config::get(ApplicationConfig::YVES_STORAGE_SESSION_REDIS_HOST)
                    . ':' . Config::get(ApplicationConfig::YVES_STORAGE_SESSION_REDIS_PORT);
                break;

            case SessionConfig::SESSION_HANDLER_FILE:
                $path = Config::get(ApplicationConfig::YVES_STORAGE_SESSION_FILE_PATH);
                break;

            default:
                throw new \Exception('Needs implementation for mysql and couchbase!');
        }

        return $path;
    }

}
