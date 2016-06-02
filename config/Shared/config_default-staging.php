<?php

/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a staging environment.
 */

use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Kernel\KernelConstants;

$config[ApplicationConstants::CLOUD_ENABLED] = true;
$config[ApplicationConstants::CLOUD_OBJECT_STORAGE_ENABLED] = true;
$config[ApplicationConstants::CLOUD_CDN_ENABLED] = true;

$config[ApplicationConstants::ENABLE_APPLICATION_DEBUG] = true;
$config[ApplicationConstants::ENABLE_APPLICATION_DEBUG] = true;
$config[KernelConstants::AUTO_LOADER_UNRESOLVABLE_CACHE_ENABLED] = true;
