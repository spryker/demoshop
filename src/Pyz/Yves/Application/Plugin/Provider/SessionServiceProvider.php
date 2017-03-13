<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Application\Plugin\Provider;

use Exception;
use Pyz\Yves\Application\Business\Model\SessionFactory;
use SessionHandler;
use Silex\Application;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Config\Config;
use Spryker\Shared\Session\SessionConstants;

/**
 * @method \Pyz\Yves\Application\ApplicationFactory getFactory()
 */
class SessionServiceProvider extends AbstractServiceProvider
{

    /**
     * @param \Silex\Application $app
     *
     * @return mixed
     */
    public function register(Application $app)
    {
        $app['session.storage.handler'] = null;

        $saveHandler = Config::get(SessionConstants::YVES_SESSION_SAVE_HANDLER);

        $this->setSessionSaveHandler($saveHandler);
        $this->setSessionStorageOptions($app);
        $this->setSessionStorageHandler($app, $saveHandler);
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
            SessionConstants::SESSION_HANDLER_REDIS_LOCKING,
            SessionConstants::SESSION_HANDLER_FILE,
        ];
    }

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    public function boot(Application $app)
    {
        $this->getFactory()->getSessionClient()->setContainer($app['session']);
    }

    /**
     * @param string $saveHandler
     *
     * @return void
     */
    protected function setSessionSaveHandler($saveHandler)
    {
        if (!in_array($saveHandler, $this->getSaveHandler()) &&
            Config::get(SessionConstants::YVES_SESSION_SAVE_HANDLER) &&
            $this->getSavePath($saveHandler)
        ) {
            ini_set('session.save_handler', Config::get(SessionConstants::YVES_SESSION_SAVE_HANDLER));
            session_save_path($this->getSavePath($saveHandler));
        }
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
            case SessionConstants::SESSION_HANDLER_REDIS_LOCKING:
                $path = $this->getConnectionString();
                break;

            case SessionConstants::SESSION_HANDLER_FILE:
                $path = Config::get(SessionConstants::YVES_SESSION_FILE_PATH);
                break;

            default:
                throw new Exception('Undefined session handler: ' . $saveHandler);
        }

        return $path;
    }

    /**
     * @return string
     */
    protected function getConnectionString()
    {
        $path = sprintf(
            '%s://%s:%s?database=%s',
            Config::get(SessionConstants::YVES_SESSION_REDIS_PROTOCOL),
            Config::get(SessionConstants::YVES_SESSION_REDIS_HOST),
            Config::get(SessionConstants::YVES_SESSION_REDIS_PORT),
            Config::get(SessionConstants::YVES_SESSION_REDIS_DATABASE, 0)
        );

        if (Config::hasKey(SessionConstants::YVES_SESSION_REDIS_PASSWORD)) {
            $path = sprintf(
                '%s://h:%s@%s:%s?database=%s',
                Config::get(SessionConstants::YVES_SESSION_REDIS_PROTOCOL),
                Config::get(SessionConstants::YVES_SESSION_REDIS_PASSWORD),
                Config::get(SessionConstants::YVES_SESSION_REDIS_HOST),
                Config::get(SessionConstants::YVES_SESSION_REDIS_PORT),
                Config::get(SessionConstants::YVES_SESSION_REDIS_DATABASE, 0)
            );
        }

        return $path;
    }

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function setSessionStorageOptions(Application $app)
    {
        $sessionStorageOptions = [
            'cookie_httponly' => true,
            'cookie_lifetime' => Config::get(SessionConstants::YVES_SESSION_TIME_TO_LIVE),
            'cookie_secure' => $this->secureCookie(),
        ];

        $name = str_replace('.', '-', Config::get(SessionConstants::YVES_SESSION_COOKIE_NAME));
        if ($name) {
            $sessionStorageOptions['name'] = $name;
        }

        $cookieDomain = Config::get(SessionConstants::YVES_SESSION_COOKIE_DOMAIN);
        if ($cookieDomain) {
            $sessionStorageOptions['cookie_domain'] = $cookieDomain;
        }

        $app['session.storage.options'] = $sessionStorageOptions;
    }

    /**
     * @param \Silex\Application $app
     * @param string $saveHandler
     *
     * @return void
     */
    protected function setSessionStorageHandler(Application $app, $saveHandler)
    {
        $sessionHelper = new SessionFactory();

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

            case SessionConstants::SESSION_HANDLER_REDIS_LOCKING:
                $redisSessionHandler = $sessionHelper->createRedisLockingSessionHandler($this->getSavePath($saveHandler));
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
                    return new SessionHandler();
                });
        }
    }

    /**
     * @return bool
     */
    protected function secureCookie()
    {
        return (Config::get(SessionConstants::YVES_SESSION_COOKIE_SECURE, true) && Config::get(ApplicationConstants::YVES_SSL_ENABLED, true));
    }

}
