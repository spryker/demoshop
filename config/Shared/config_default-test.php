<?php

/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a development environment.
 */

use SprykerFeature\Shared\System\SystemConfig;
use SprykerFeature\Shared\Yves\YvesConfig;
use SprykerFeature\Shared\Session\SessionConfig;
use SprykerFeature\Shared\Payone\PayoneConfigConstants;

$config[SystemConfig::ZED_DB_USERNAME] = 'development';
$config[SystemConfig::ZED_DB_PASSWORD] = 'mate20mg';
$config[SystemConfig::ZED_DB_DATABASE] = 'DE_development_zed';
$config[SystemConfig::ZED_DB_HOST] = '127.0.0.1';
$config[SystemConfig::ZED_DB_PORT] = 3306;

$config[YvesConfig::YVES_SESSION_SAVE_HANDLER] = SessionConfig::SESSION_HANDLER_REDIS;
$config[SystemConfig::ZED_SESSION_SAVE_HANDLER] = SessionConfig::SESSION_HANDLER_FILE;

$config[SystemConfig::YVES_STORAGE_SESSION_REDIS_PROTOCOL] = 'tcp';
$config[SystemConfig::YVES_STORAGE_SESSION_REDIS_HOST] = '127.0.0.1';
$config[SystemConfig::YVES_STORAGE_SESSION_REDIS_PORT] = '10009';

$config[SystemConfig::ZED_STORAGE_SESSION_REDIS_PROTOCOL] = $config[SystemConfig::YVES_STORAGE_SESSION_REDIS_PROTOCOL];
$config[SystemConfig::ZED_STORAGE_SESSION_REDIS_HOST] = $config[SystemConfig::YVES_STORAGE_SESSION_REDIS_HOST];
$config[SystemConfig::ZED_STORAGE_SESSION_REDIS_PORT] = $config[SystemConfig::YVES_STORAGE_SESSION_REDIS_PORT];

$config[SessionConfig::SESSION_IS_TEST] = true;

$config[PayoneConfigConstants::PAYONE] = [
    PayoneConfigConstants::PAYONE_MODE => '',
];

$config[SystemConfig::JENKINS_BASE_URL] = 'http://' . $config[SystemConfig::HOST_ZED_GUI] . ':10007/jenkins';
$config[SystemConfig::JENKINS_DIRECTORY] = '/data/shop/development/shared/data/common/jenkins';
