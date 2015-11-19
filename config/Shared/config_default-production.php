<?php

use Pyz\Shared\OrderExporter\AfterbuyExportConstantInterface;

/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a production environment.
 */

use SprykerFeature\Shared\SequenceNumber\SequenceNumberConstants;
use SprykerFeature\Shared\System\SystemConfig;

$config[SystemConfig::CLOUD_ENABLED] = true;
$config[SystemConfig::CLOUD_OBJECT_STORAGE_ENABLED] = true;
$config[SystemConfig::CLOUD_CDN_ENABLED] = true;
$config[AfterbuyExportConstantInterface::AFTERBUY_IS_EXPORT_ENABLED] = true;

$config[SystemConfig::ZED_SHOW_EXCEPTION_STACK_TRACE] = false;

$config[SequenceNumberConstants::ENVIRONMENT_PREFIX] = "P";