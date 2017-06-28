<?php

/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a development environment.
 */

use Spryker\Shared\Acl\AclConstants;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\ErrorHandler\ErrorHandlerConstants;
use Spryker\Shared\ErrorHandler\ErrorRenderer\WebExceptionErrorRenderer;
use Spryker\Shared\Event\EventConstants;
use Spryker\Shared\EventJournal\EventJournalConstants;
use Spryker\Shared\Kernel\KernelConstants;
use Spryker\Shared\Kernel\Store;
use Spryker\Shared\Log\LogConstants;
use Spryker\Shared\Payone\PayoneConstants;
use Spryker\Shared\Propel\PropelConstants;
use Spryker\Shared\PropelQueryBuilder\PropelQueryBuilderConstants;
use Spryker\Shared\RabbitMq\RabbitMqConstants;
use Spryker\Shared\Session\SessionConstants;
use Spryker\Shared\Setup\SetupConstants;
use Spryker\Shared\Storage\StorageConstants;
use Spryker\Shared\Twig\TwigConstants;
use Spryker\Shared\ZedNavigation\ZedNavigationConstants;
use Spryker\Shared\ZedRequest\ZedRequestConstants;

$CURRENT_STORE = Store::getInstance()->getStoreName();

// ---------- General environment
$config[KernelConstants::SPRYKER_ROOT] = APPLICATION_ROOT_DIR . '/vendor/spryker/spryker/Bundles';
$config[KernelConstants::STORE_PREFIX] = 'DEV';
$config[ApplicationConstants::ENABLE_APPLICATION_DEBUG] = true;
$config[ApplicationConstants::ENABLE_WEB_PROFILER] = true;

// ---------- Propel
$config[PropelConstants::PROPEL_DEBUG] = true;
$config[PropelConstants::PROPEL_SHOW_EXTENDED_EXCEPTION] = true;
$config[PropelConstants::ZED_DB_USERNAME] = 'development';
$config[PropelConstants::ZED_DB_PASSWORD] = 'mate20mg';
$config[PropelConstants::ZED_DB_HOST] = '127.0.0.1';
$config[PropelConstants::ZED_DB_PORT] = 5432;
$config[PropelConstants::ZED_DB_ENGINE] = $config[PropelConstants::ZED_DB_ENGINE_PGSQL];
$config[PropelQueryBuilderConstants::ZED_DB_ENGINE] = $config[PropelConstants::ZED_DB_ENGINE_PGSQL];

// ---------- Redis
$config[StorageConstants::STORAGE_REDIS_PROTOCOL] = 'tcp';
$config[StorageConstants::STORAGE_REDIS_HOST] = '127.0.0.1';
$config[StorageConstants::STORAGE_REDIS_PORT] = '10009';
$config[StorageConstants::STORAGE_REDIS_PASSWORD] = '';
$config[StorageConstants::STORAGE_REDIS_DATABASE] = 0;

// ---------- RabbitMQ
$config[RabbitMqConstants::RABBITMQ_HOST] = 'localhost';
$config[RabbitMqConstants::RABBITMQ_PORT] = '5672';
$config[RabbitMqConstants::RABBITMQ_PASSWORD] = 'mate20mg';

// ---------- Session
$config[SessionConstants::YVES_SESSION_COOKIE_SECURE] = false;
$config[SessionConstants::YVES_SESSION_REDIS_PROTOCOL] = $config[StorageConstants::STORAGE_REDIS_PROTOCOL];
$config[SessionConstants::YVES_SESSION_REDIS_HOST] = $config[StorageConstants::STORAGE_REDIS_HOST];
$config[SessionConstants::YVES_SESSION_REDIS_PORT] = $config[StorageConstants::STORAGE_REDIS_PORT];
$config[SessionConstants::YVES_SESSION_REDIS_PASSWORD] = $config[StorageConstants::STORAGE_REDIS_PASSWORD];
$config[SessionConstants::YVES_SESSION_REDIS_DATABASE] = 1;
$config[SessionConstants::ZED_SESSION_COOKIE_SECURE] = false;
$config[SessionConstants::ZED_SESSION_REDIS_PROTOCOL] = $config[SessionConstants::YVES_SESSION_REDIS_PROTOCOL];
$config[SessionConstants::ZED_SESSION_REDIS_HOST] = $config[SessionConstants::YVES_SESSION_REDIS_HOST];
$config[SessionConstants::ZED_SESSION_REDIS_PORT] = $config[SessionConstants::YVES_SESSION_REDIS_PORT];
$config[SessionConstants::ZED_SESSION_REDIS_PASSWORD] = $config[SessionConstants::YVES_SESSION_REDIS_PASSWORD];
$config[SessionConstants::ZED_SESSION_REDIS_DATABASE] = 2;
$config[SessionConstants::ZED_SESSION_TIME_TO_LIVE] = SessionConstants::SESSION_LIFETIME_1_YEAR;

// ---------- Jenkins
$config[SetupConstants::JENKINS_BASE_URL] = 'http://localhost:10007/';
$config[SetupConstants::JENKINS_DIRECTORY] = '/data/shop/development/shared/data/common/jenkins';

// ---------- Zed request
$config[ZedRequestConstants::TRANSFER_DEBUG_SESSION_FORWARD_ENABLED] = true;
$config[ZedRequestConstants::SET_REPEAT_DATA] = true;

// ---------- Payone
$config[PayoneConstants::PAYONE] = [
    PayoneConstants::PAYONE_CREDENTIALS_ENCODING => 'UTF-8',
    PayoneConstants::PAYONE_CREDENTIALS_KEY => '',
    PayoneConstants::PAYONE_CREDENTIALS_MID => '',
    PayoneConstants::PAYONE_CREDENTIALS_AID => '',
    PayoneConstants::PAYONE_CREDENTIALS_PORTAL_ID => '',
    PayoneConstants::PAYONE_PAYMENT_GATEWAY_URL => 'https://api.pay1.de/post-gateway/',
    PayoneConstants::PAYONE_REDIRECT_SUCCESS_URL => '',
    PayoneConstants::PAYONE_REDIRECT_ERROR_URL => '',
    PayoneConstants::PAYONE_REDIRECT_BACK_URL => '',
    PayoneConstants::PAYONE_MODE => '',
];

// ---------- Twig
$config[TwigConstants::ZED_TWIG_OPTIONS] = [
    'cache' => sprintf('%s/data/%s/cache/Yves/twig', APPLICATION_ROOT_DIR, $CURRENT_STORE),
];
$config[TwigConstants::YVES_TWIG_OPTIONS] = [
    'cache' => sprintf('%s/data/%s/cache/Yves/twig', APPLICATION_ROOT_DIR, $CURRENT_STORE),
];
$config[TwigConstants::YVES_PATH_CACHE_FILE] = sprintf(
    '%s/data/%s/cache/Yves/twig/.pathCache',
    APPLICATION_ROOT_DIR,
    $CURRENT_STORE
);
$config[TwigConstants::ZED_PATH_CACHE_FILE] = sprintf(
    '%s/data/%s/cache/Zed/twig/.pathCache',
    APPLICATION_ROOT_DIR,
    $CURRENT_STORE
);

// ---------- Navigation
$config[ZedNavigationConstants::ZED_NAVIGATION_CACHE_ENABLED] = true;

// ---------- Error handling
$config[ErrorHandlerConstants::DISPLAY_ERRORS] = true;
$config[ErrorHandlerConstants::ERROR_RENDERER] = WebExceptionErrorRenderer::class;

// ---------- ACL
$config[AclConstants::ACL_USER_RULE_WHITELIST][] = [
    'bundle' => 'wdt',
    'controller' => '*',
    'action' => '*',
    'type' => 'allow',
];

// ---------- Auto-loader
$config[KernelConstants::AUTO_LOADER_UNRESOLVABLE_CACHE_ENABLED] = false;

// ---------- Logging
$config[LogConstants::LOG_LEVEL] = \Monolog\Logger::INFO;

// ---------- Events
$config[EventConstants::LOGGER_ACTIVE] = true;

// ---------- Event journal (deprecated)
$config[EventJournalConstants::LOCK_OPTIONS][EventJournalConstants::NO_LOCK] = true;
