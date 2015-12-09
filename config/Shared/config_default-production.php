<?php

/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a production environment.
 */

use SprykerFeature\Shared\System\SystemConfig;
use SprykerFeature\Shared\Application\ApplicationConfig;

$config[SystemConfig::CLOUD_ENABLED] = true;
$config[SystemConfig::CLOUD_OBJECT_STORAGE_ENABLED] = true;
$config[SystemConfig::CLOUD_CDN_ENABLED] = true;

$config[ApplicationConfig::YVES_SHOW_EXCEPTION_STACK_TRACE] = false;
$config[SystemConfig::ZED_SHOW_EXCEPTION_STACK_TRACE] = false;
