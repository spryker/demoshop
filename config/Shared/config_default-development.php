<?php
/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a development environment.
 */

use ProjectA\Shared\System\SystemConfig;
use ProjectA\Shared\Yves\YvesConfig;

$config[SystemConfig::ZED_SESSION_SAVE_HANDLER]
     = $config[YvesConfig::YVES_SESSION_SAVE_HANDLER]
     = 'redis';

$config[SystemConfig::YVES_STORAGE_SESSION_REDIS_PROTOCOL] = 'tcp';
$config[SystemConfig::YVES_STORAGE_SESSION_REDIS_HOST] = '127.0.0.1';
$config[SystemConfig::YVES_STORAGE_SESSION_REDIS_PORT] = '6379';

$config[SystemConfig::ZED_STORAGE_SESSION_REDIS_PROTOCOL] = $config[SystemConfig::YVES_STORAGE_SESSION_REDIS_PROTOCOL];
$config[SystemConfig::ZED_STORAGE_SESSION_REDIS_HOST] = $config[SystemConfig::YVES_STORAGE_SESSION_REDIS_HOST];
$config[SystemConfig::ZED_STORAGE_SESSION_REDIS_PORT] = $config[SystemConfig::YVES_STORAGE_SESSION_REDIS_PORT];