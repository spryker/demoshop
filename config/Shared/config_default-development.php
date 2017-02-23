<?php

/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a development environment.
 */

use Spryker\Shared\Acl\AclConstants;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\ErrorHandler\ErrorHandlerConstants;
use Spryker\Shared\EventJournal\EventJournalConstants;
use Spryker\Shared\Kernel\KernelConstants;
use Spryker\Shared\Log\LogConstants;
use Spryker\Shared\Payone\PayoneConstants;
use Spryker\Shared\Propel\PropelConstants;
use Spryker\Shared\Session\SessionConstants;
use Spryker\Shared\Setup\SetupConstants;
use Spryker\Shared\Storage\StorageConstants;
use Spryker\Shared\Twig\TwigConstants;
use Spryker\Shared\ZedNavigation\ZedNavigationConstants;
use Spryker\Shared\ZedRequest\ZedRequestConstants;

$config[StorageConstants::STORAGE_REDIS_PROTOCOL] = 'tcp';
$config[StorageConstants::STORAGE_REDIS_HOST] = '127.0.0.1';
$config[StorageConstants::STORAGE_REDIS_PORT] = '10009';
$config[StorageConstants::STORAGE_REDIS_PASSWORD] = '';
$config[StorageConstants::STORAGE_REDIS_DATABASE] = 0;

$config[SessionConstants::YVES_SESSION_REDIS_PROTOCOL] = $config[StorageConstants::STORAGE_REDIS_PROTOCOL];
$config[SessionConstants::YVES_SESSION_REDIS_HOST] = $config[StorageConstants::STORAGE_REDIS_HOST];
$config[SessionConstants::YVES_SESSION_REDIS_PORT] = $config[StorageConstants::STORAGE_REDIS_PORT];
$config[SessionConstants::YVES_SESSION_REDIS_PASSWORD] = $config[StorageConstants::STORAGE_REDIS_PASSWORD];
$config[SessionConstants::YVES_SESSION_REDIS_DATABASE] = 1;

$config[SessionConstants::ZED_SESSION_REDIS_PROTOCOL] = $config[SessionConstants::YVES_SESSION_REDIS_PROTOCOL];
$config[SessionConstants::ZED_SESSION_REDIS_HOST] = $config[SessionConstants::YVES_SESSION_REDIS_HOST];
$config[SessionConstants::ZED_SESSION_REDIS_PORT] = $config[SessionConstants::YVES_SESSION_REDIS_PORT];
$config[SessionConstants::ZED_SESSION_REDIS_PASSWORD] = $config[SessionConstants::YVES_SESSION_REDIS_PASSWORD];
$config[SessionConstants::ZED_SESSION_REDIS_DATABASE] = 2;

$config[SessionConstants::YVES_SESSION_COOKIE_DOMAIN] = $config[ApplicationConstants::HOST_YVES];
$config[SessionConstants::YVES_SESSION_COOKIE_SECURE] = false;

$config[SetupConstants::JENKINS_BASE_URL] = 'http://' . $config[ApplicationConstants::HOST_ZED_GUI] . ':10007/jenkins';
$config[SetupConstants::JENKINS_DIRECTORY] = '/data/shop/development/shared/data/common/jenkins';
$config[ZedRequestConstants::TRANSFER_DEBUG_SESSION_FORWARD_ENABLED] = true;

$config[PayoneConstants::PAYONE] = [
    PayoneConstants::PAYONE_CREDENTIALS_ENCODING => 'UTF-8',
    PayoneConstants::PAYONE_CREDENTIALS_KEY => '',
    PayoneConstants::PAYONE_CREDENTIALS_MID => '',
    PayoneConstants::PAYONE_CREDENTIALS_AID => '',
    PayoneConstants::PAYONE_CREDENTIALS_PORTAL_ID => '',
    PayoneConstants::PAYONE_PAYMENT_GATEWAY_URL => 'https://api.pay1.de/post-gateway/',
    PayoneConstants::PAYONE_REDIRECT_SUCCESS_URL => $config[ApplicationConstants::HOST_YVES] . '/checkout/success/',
    PayoneConstants::PAYONE_REDIRECT_ERROR_URL => $config[ApplicationConstants::HOST_YVES] . '/checkout/index/',
    PayoneConstants::PAYONE_REDIRECT_BACK_URL => $config[ApplicationConstants::HOST_YVES] . '/checkout/regular-redirect-payment-cancellation/',
    PayoneConstants::PAYONE_MODE => '',
];

$config[TwigConstants::ZED_TWIG_OPTIONS] = [
    'cache' => false,
];

$config[TwigConstants::YVES_TWIG_OPTIONS] = [
    'cache' => false,
];

$config[ZedNavigationConstants::ZED_NAVIGATION_CACHE_ENABLED] = true;

$config[AclConstants::ACL_USER_RULE_WHITELIST][] = [
    'bundle' => 'wdt',
    'controller' => '*',
    'action' => '*',
    'type' => 'allow',
];

$config[PropelConstants::PROPEL_DEBUG] = true;
$config[PropelConstants::PROPEL_SHOW_EXTENDED_EXCEPTION] = true;

$config[ErrorHandlerConstants::DISPLAY_ERRORS] = true;
$config[ApplicationConstants::ENABLE_APPLICATION_DEBUG] = true;
$config[ZedRequestConstants::SET_REPEAT_DATA] = true;
$config[KernelConstants::STORE_PREFIX] = 'DEV';

$config[ApplicationConstants::ENABLE_WEB_PROFILER] = true;
$config[KernelConstants::AUTO_LOADER_UNRESOLVABLE_CACHE_ENABLED] = false;

$config[EventJournalConstants::LOCK_OPTIONS][EventJournalConstants::NO_LOCK] = true;

$config[LogConstants::LOG_LEVEL] = \Monolog\Logger::INFO;
