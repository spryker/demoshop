<?php
/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a development environment.
 */

use SprykerFeature\Shared\System\SystemConfig;
use SprykerFeature\Shared\Yves\YvesConfig;

$config[SystemConfig::ZED_SESSION_SAVE_HANDLER]
    = $config[YvesConfig::YVES_SESSION_SAVE_HANDLER]
    = 'redis';

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
