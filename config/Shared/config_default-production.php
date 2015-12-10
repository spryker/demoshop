<?php

/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a production environment.
 */

use SprykerFeature\Shared\Application\ApplicationConfig;

$config[ApplicationConfig::CLOUD_ENABLED] = true;
$config[ApplicationConfig::CLOUD_OBJECT_STORAGE_ENABLED] = true;
$config[ApplicationConfig::CLOUD_CDN_ENABLED] = true;

$config[ApplicationConfig::YVES_SHOW_EXCEPTION_STACK_TRACE] = false;
$config[ApplicationConfig::ZED_SHOW_EXCEPTION_STACK_TRACE] = false;
