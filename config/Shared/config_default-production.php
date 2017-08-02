<?php

/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a production environment.
 */

use Spryker\Shared\Kernel\KernelConstants;
use Spryker\Shared\Kernel\Store;
use Spryker\Shared\Twig\TwigConstants;

$CURRENT_STORE = Store::getInstance()->getStoreName();

// ---------- Auto-loader
$config[KernelConstants::AUTO_LOADER_UNRESOLVABLE_CACHE_ENABLED] = true;

// ---------- Twig
$config[TwigConstants::YVES_PATH_CACHE_ENABLED] = true;
$config[TwigConstants::ZED_PATH_CACHE_ENABLED] = true;
