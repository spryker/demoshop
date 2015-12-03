<?php

use Pyz\Shared\OrderExporter\AfterbuyExportConstantInterface;

/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a production environment.
 */

use SprykerFeature\Shared\SequenceNumber\SequenceNumberConstants;
use SprykerFeature\Shared\System\SystemConfig;
use SprykerFeature\Shared\Yves\YvesConfig;

$config[AfterbuyExportConstantInterface::AFTERBUY_IS_EXPORT_ENABLED] = true;

$config[YvesConfig::YVES_SHOW_EXCEPTION_STACK_TRACE] = false;

$config[SystemConfig::ZED_SHOW_EXCEPTION_STACK_TRACE] = false;

$config[SequenceNumberConstants::ENVIRONMENT_PREFIX] = "P";

$config[SystemConfig::ZED_SSL_ENABLED] = true;
$config[SystemConfig::ZED_API_SSL_ENABLED] = false;

$config[YvesConfig::YVES_SSL_ENABLED]
    = $config[YvesConfig::YVES_COMPLETE_SSL_ENABLED]
    = true;

