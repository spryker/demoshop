<?php

/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a development environment.
 */

use SprykerFeature\Shared\Application\ApplicationConfig;
use SprykerFeature\Shared\Session\SessionConfig;
use SprykerFeature\Shared\Payone\PayoneConfigConstants;

$config[ApplicationConfig::ZED_DB_USERNAME] = 'development';
$config[ApplicationConfig::ZED_DB_PASSWORD] = 'mate20mg';
$config[ApplicationConfig::ZED_DB_DATABASE] = 'DE_development_zed';
$config[ApplicationConfig::ZED_DB_HOST] = '127.0.0.1';
$config[ApplicationConfig::ZED_DB_PORT] = 3306;

$config[ApplicationConfig::YVES_SESSION_SAVE_HANDLER] = SessionConfig::SESSION_HANDLER_REDIS;
$config[ApplicationConfig::ZED_SESSION_SAVE_HANDLER] = SessionConfig::SESSION_HANDLER_FILE;

$config[ApplicationConfig::YVES_STORAGE_SESSION_REDIS_PROTOCOL] = 'tcp';
$config[ApplicationConfig::YVES_STORAGE_SESSION_REDIS_HOST] = '127.0.0.1';
$config[ApplicationConfig::YVES_STORAGE_SESSION_REDIS_PORT] = '10009';

$config[ApplicationConfig::ZED_STORAGE_SESSION_REDIS_PROTOCOL] = $config[ApplicationConfig::YVES_STORAGE_SESSION_REDIS_PROTOCOL];
$config[ApplicationConfig::ZED_STORAGE_SESSION_REDIS_HOST] = $config[ApplicationConfig::YVES_STORAGE_SESSION_REDIS_HOST];
$config[ApplicationConfig::ZED_STORAGE_SESSION_REDIS_PORT] = $config[ApplicationConfig::YVES_STORAGE_SESSION_REDIS_PORT];

$config[SessionConfig::SESSION_IS_TEST] = true;

$config[PayoneConfigConstants::PAYONE] = [
    PayoneConfigConstants::PAYONE_MODE => '',
];

$config[ApplicationConfig::JENKINS_BASE_URL] = 'http://' . $config[ApplicationConfig::HOST_ZED_GUI] . ':10007/jenkins';
$config[ApplicationConfig::JENKINS_DIRECTORY] = '/data/shop/development/shared/data/common/jenkins';
