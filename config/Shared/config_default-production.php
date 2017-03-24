<?php

/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a production environment.
 */

use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Kernel\KernelConstants;
use Spryker\Shared\Kernel\Store;
use Spryker\Shared\Twig\TwigConstants;

$config[ApplicationConstants::CLOUD_ENABLED] = true;
$config[ApplicationConstants::CLOUD_OBJECT_STORAGE_ENABLED] = true;
$config[ApplicationConstants::CLOUD_CDN_ENABLED] = true;

$config[KernelConstants::AUTO_LOADER_UNRESOLVABLE_CACHE_ENABLED] = true;

$store = Store::getInstance()->getStoreName();
$config[TwigConstants::YVES_PATH_CACHE_FILE] = APPLICATION_ROOT_DIR . '/data/' . $store . '/cache/Yves/twig/.pathCache';
$config[TwigConstants::YVES_PATH_CACHE_ENABLED] = true;

$config[TwigConstants::ZED_PATH_CACHE_FILE] = APPLICATION_ROOT_DIR . '/data/' . $store . '/cache/Zed/twig/.pathCache';
$config[TwigConstants::ZED_PATH_CACHE_ENABLED] = true;

