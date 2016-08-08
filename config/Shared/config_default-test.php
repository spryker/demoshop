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

$config[SessionConstants::YVES_SESSION_SAVE_HANDLER] = SessionConstants::SESSION_HANDLER_REDIS;
$config[SessionConstants::ZED_SESSION_SAVE_HANDLER] = SessionConstants::SESSION_HANDLER_FILE;

$config[SessionConstants::YVES_SESSION_REDIS_PROTOCOL] = 'tcp';
$config[SessionConstants::YVES_SESSION_REDIS_HOST] = '127.0.0.1';
$config[SessionConstants::YVES_SESSION_REDIS_PORT] = '10009';
$config[SessionConstants::YVES_SESSION_REDIS_PASSWORD] = '';

$config[SessionConstants::ZED_SESSION_REDIS_PROTOCOL] = $config[SessionConstants::YVES_SESSION_REDIS_PROTOCOL];
$config[SessionConstants::ZED_SESSION_REDIS_HOST] = $config[SessionConstants::YVES_SESSION_REDIS_HOST];
$config[SessionConstants::ZED_SESSION_REDIS_PORT] = $config[SessionConstants::YVES_SESSION_REDIS_PORT];
$config[SessionConstants::ZED_SESSION_REDIS_PASSWORD] = $config[SessionConstants::YVES_SESSION_REDIS_PASSWORD];

$config[SessionConstants::SESSION_IS_TEST] = true;

$config[PayoneConstants::PAYONE] = [
    PayoneConstants::PAYONE_MODE => '',
];

$config[ApplicationConstants::JENKINS_BASE_URL] = 'http://' . $config[ApplicationConstants::HOST_ZED_GUI] . ':10007/jenkins';
$config[ApplicationConstants::JENKINS_DIRECTORY] = '/data/shop/development/shared/data/common/jenkins';

$config[ApplicationConstants::APPLICATION_SPRYKER_ROOT] = APPLICATION_ROOT_DIR . '/vendor/spryker/spryker/Bundles';
