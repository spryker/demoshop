<?php

/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a development environment.
 */

use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Payone\PayoneConstants;
use Spryker\Shared\Session\SessionConstants;

$config[ApplicationConstants::ZED_DB_ENGINE] = $config[ApplicationConstants::ZED_DB_ENGINE_PGSQL];
$config[ApplicationConstants::ZED_DB_USERNAME] = 'development';
$config[ApplicationConstants::ZED_DB_PASSWORD] = 'mate20mg';
$config[ApplicationConstants::ZED_DB_DATABASE] = 'DE_development_zed';
$config[ApplicationConstants::ZED_DB_HOST] = '127.0.0.1';
$config[ApplicationConstants::ZED_DB_PORT] = 5432;

$config[ApplicationConstants::YVES_SESSION_SAVE_HANDLER] = SessionConstants::SESSION_HANDLER_REDIS;
$config[ApplicationConstants::ZED_SESSION_SAVE_HANDLER] = SessionConstants::SESSION_HANDLER_FILE;

$config[ApplicationConstants::YVES_STORAGE_SESSION_REDIS_PROTOCOL] = 'tcp';
$config[ApplicationConstants::YVES_STORAGE_SESSION_REDIS_HOST] = '127.0.0.1';
$config[ApplicationConstants::YVES_STORAGE_SESSION_REDIS_PORT] = '10009';

$config[ApplicationConstants::ZED_STORAGE_SESSION_REDIS_PROTOCOL] = $config[ApplicationConstants::YVES_STORAGE_SESSION_REDIS_PROTOCOL];
$config[ApplicationConstants::ZED_STORAGE_SESSION_REDIS_HOST] = $config[ApplicationConstants::YVES_STORAGE_SESSION_REDIS_HOST];
$config[ApplicationConstants::ZED_STORAGE_SESSION_REDIS_PORT] = $config[ApplicationConstants::YVES_STORAGE_SESSION_REDIS_PORT];

$config[SessionConstants::SESSION_IS_TEST] = true;

$config[PayoneConstants::PAYONE] = [
    PayoneConstants::PAYONE_MODE => '',
];

$config[ApplicationConstants::JENKINS_BASE_URL] = 'http://' . $config[ApplicationConstants::HOST_ZED_GUI] . ':10007/jenkins';
$config[ApplicationConstants::JENKINS_DIRECTORY] = '/data/shop/development/shared/data/common/jenkins';
