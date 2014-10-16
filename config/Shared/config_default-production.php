<?php
/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a production environment.
 */


use ProjectA\Shared\System\SystemConfig;

$config[SystemConfig::CLOUD_ENABLED] = true;
$config[SystemConfig::CLOUD_OBJECT_STORAGE_ENABLED] = true;
$config[SystemConfig::CLOUD_CDN_ENABLED] = true;
