<?php

/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a production environment.
 */

use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Kernel\KernelConstants;

$config[ApplicationConstants::CLOUD_ENABLED] = true;
$config[ApplicationConstants::CLOUD_OBJECT_STORAGE_ENABLED] = true;
$config[ApplicationConstants::CLOUD_CDN_ENABLED] = true;

$config[ApplicationConstants::YVES_SHOW_EXCEPTION_STACK_TRACE] = false;
$config[ApplicationConstants::ZED_SHOW_EXCEPTION_STACK_TRACE] = false;
$config[KernelConstants::AUTO_LOADER_UNRESOLVABLE_CACHE_ENABLED] = true;
