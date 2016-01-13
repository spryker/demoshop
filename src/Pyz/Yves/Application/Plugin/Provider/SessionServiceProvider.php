<?php

namespace Pyz\Yves\Application\Plugin\Provider;

use Pyz\Yves\Application\ApplicationFactory;
use Pyz\Yves\Application\Business\Model\SessionFactory;
use Silex\Application;
use Spryker\Shared\Config;
use Spryker\Shared\Session\SessionConstants;
use Spryker\Shared\Application\ApplicationConstants;

/**
 * @method ApplicationFactory getFactory()
 */
class SessionServiceProvider extends AbstractServiceProvider
{

    /**
     * @param Application $app
     *
     * @return mixed
     */
    public function register(Application $app)
    {
        $saveHandler = Config::get(ApplicationConstants::YVES_SESSION_SAVE_HANDLER);

        if (!in_array($saveHandler, $this->getSaveHandler())) {
            if (Config::get(ApplicationConstants::YVES_SESSION_SAVE_HANDLER) && $this->getSavePath($saveHandler)) {
                ini_set('session.save_handler', Config::get(ApplicationConstants::YVES_SESSION_SAVE_HANDLER));
                session_save_path($this->getSavePath($saveHandler));
            }
        }

        $sessionStorageOptions = [
            'cookie_httponly' => true,
            'cookie_lifetime' => Config::get(ApplicationConstants::YVES_STORAGE_SESSION_TIME_TO_LIVE),
        ];

        $name = Config::get(ApplicationConstants::YVES_SESSION_NAME);
        if ($name) {
            $sessionStorageOptions['name'] = $name;
        }
        $cookieDomain = Config::get(ApplicationConstants::YVES_SESSION_COOKIE_DOMAIN);
        if ($cookieDomain) {
            $sessionStorageOptions['cookie_domain'] = $cookieDomain;
        }
        $app['session.storage.options'] = $sessionStorageOptions;

        $sessionHelper = new SessionFactory();

        // We manually register our own couchbase session handler, for all other handlers we use the generic one
        switch ($saveHandler) {
            case SessionConstants::SESSION_HANDLER_COUCHBASE:
                $couchbaseSessionHandler = $sessionHelper->registerCouchbaseSessionHandler($this->getSavePath($saveHandler));
                $app['session.storage.handler'] = $app->share(function () use ($couchbaseSessionHandler) {
                    return $couchbaseSessionHandler;
                });
                break;

            case SessionConstants::SESSION_HANDLER_MYSQL:
                $mysqlSessionHandler = $sessionHelper->registerMysqlSessionHandler($this->getSavePath($saveHandler));
                $app['session.storage.handler'] = $app->share(function () use ($mysqlSessionHandler) {
                    return $mysqlSessionHandler;
                });
                break;

            case SessionConstants::SESSION_HANDLER_REDIS:
                $redisSessionHandler = $sessionHelper->registerRedisSessionHandler($this->getSavePath($saveHandler));
                $app['session.storage.handler'] = $app->share(function () use ($redisSessionHandler) {
                    return $redisSessionHandler;
                });
                break;

            case SessionConstants::SESSION_HANDLER_FILE:
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

        $this->getFactory()->getSessionClient()->setContainer($app['session']);
    }

    /**
     * @return array
     */
    protected function getSaveHandler()
    {
        return [
            SessionConstants::SESSION_HANDLER_COUCHBASE,
            SessionConstants::SESSION_HANDLER_MYSQL,
            SessionConstants::SESSION_HANDLER_REDIS,
            SessionConstants::SESSION_HANDLER_FILE,
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
            case SessionConstants::SESSION_HANDLER_REDIS:
                $path = Config::get(ApplicationConstants::YVES_STORAGE_SESSION_REDIS_PROTOCOL)
                    . '://' . Config::get(ApplicationConstants::YVES_STORAGE_SESSION_REDIS_HOST)
                    . ':' . Config::get(ApplicationConstants::YVES_STORAGE_SESSION_REDIS_PORT);
                break;

            case SessionConstants::SESSION_HANDLER_FILE:
                $path = Config::get(ApplicationConstants::YVES_STORAGE_SESSION_FILE_PATH);
                break;

            default:
                throw new \Exception('Needs implementation for mysql and couchbase!');
        }

        return $path;
    }

}
