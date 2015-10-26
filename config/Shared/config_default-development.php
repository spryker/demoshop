<?php

/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a development environment.
 */

use SprykerFeature\Shared\System\SystemConfig;
use SprykerFeature\Shared\Yves\YvesConfig;
use SprykerFeature\Shared\Application\ApplicationConfig;
use SprykerFeature\Shared\Acl\AclConfig;
use SprykerFeature\Shared\Session\SessionConfig;
use Pyz\Client\ZedRequest\Service\ZedRequestConfig as PyzZedRequestConfig;

$config[YvesConfig::YVES_SESSION_SAVE_HANDLER] = SessionConfig::SESSION_HANDLER_REDIS;
$config[SystemConfig::ZED_SESSION_SAVE_HANDLER] = SessionConfig::SESSION_HANDLER_FILE;

$config[SystemConfig::ZED_DB_USERNAME] = 'development';
$config[SystemConfig::ZED_DB_PASSWORD] = 'mate20mg';
$config[SystemConfig::ZED_DB_HOST]     = '127.0.0.1';
$config[SystemConfig::ZED_DB_PORT]     = 5432;
$config[SystemConfig::ZED_DB_DATABASE] = null;

$config[ApplicationConfig::ZED_TWIG_OPTIONS] = [
    'cache' => false,
];
$config[ApplicationConfig::YVES_TWIG_OPTIONS] = [
    'cache' => false,
];

$config[SystemConfig::YVES_STORAGE_SESSION_REDIS_PROTOCOL] = 'tcp';
$config[SystemConfig::YVES_STORAGE_SESSION_REDIS_HOST] = '127.0.0.1';
$config[SystemConfig::YVES_STORAGE_SESSION_REDIS_PORT] = '10009';

$config[SystemConfig::ZED_STORAGE_SESSION_REDIS_PROTOCOL] = $config[SystemConfig::YVES_STORAGE_SESSION_REDIS_PROTOCOL];
$config[SystemConfig::ZED_STORAGE_SESSION_REDIS_HOST] = $config[SystemConfig::YVES_STORAGE_SESSION_REDIS_HOST];
$config[SystemConfig::ZED_STORAGE_SESSION_REDIS_PORT] = $config[SystemConfig::YVES_STORAGE_SESSION_REDIS_PORT];

$config[YvesConfig::YVES_SESSION_COOKIE_DOMAIN] = $config[SystemConfig::HOST_YVES];

$config[SystemConfig::JENKINS_BASE_URL] = 'http://' . $config[SystemConfig::HOST_ZED_GUI] . ':10007/jenkins';
$config[SystemConfig::JENKINS_DIRECTORY] = '/data/shop/development/shared/data/common/jenkins';
$config[YvesConfig::TRANSFER_DEBUG_SESSION_FORWARD_ENABLED] = true;

$config[ApplicationConfig::NAVIGATION_CACHE_ENABLED] = false;

$config[AclConfig::ACL_USER_RULE_WHITELIST][] = [
    'bundle' => 'wdt',
    'controller' => '*',
    'action' => '*',
    'type' => 'allow',
];

$config[SystemConfig::PROPEL_DEBUG] = true;
$config[ApplicationConfig::ENABLE_APPLICATION_DEBUG] = true;
$config[ApplicationConfig::SHOW_SYMFONY_TOOLBAR] = true;

$config[ApplicationConfig::STORE_PREFIX] = 'DEV';
$config[ApplicationConfig::SET_REPEAT_DATA] = true;
$config[SessionConfig::SESSION_IS_TEST] = false;

$config[PyzZedRequestConfig::YVES_TO_ZED_CURL_LOG_ENABLED] = true;
$config[PyzZedRequestConfig::YVES_TO_ZED_CURL_LOG_FILE_PATH] = '/tmp/yves_to_zed_curl.log';
