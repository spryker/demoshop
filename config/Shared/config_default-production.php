<?php

use PavFeature\Shared\MailchimpClient\MailchimpClientConfig;
use Pyz\Shared\OrderExporter\AfterbuyExportConstantInterface;

/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a production environment.
 */

use SprykerFeature\Shared\SequenceNumber\SequenceNumberConstants;
use SprykerFeature\Shared\System\SystemConfig;
use SprykerFeature\Shared\Yves\YvesConfig;

$config[SystemConfig::CLOUD_ENABLED] = true;
$config[SystemConfig::CLOUD_OBJECT_STORAGE_ENABLED] = true;
$config[SystemConfig::CLOUD_CDN_ENABLED] = true;
$config[AfterbuyExportConstantInterface::AFTERBUY_IS_EXPORT_ENABLED] = true;

$config[YvesConfig::YVES_SHOW_EXCEPTION_STACK_TRACE] = false;

$config[SystemConfig::ZED_SHOW_EXCEPTION_STACK_TRACE] = false;

$config[SequenceNumberConstants::ENVIRONMENT_PREFIX] = "P";

$config[SystemConfig::ZED_SSL_ENABLED] = true;
$config[SystemConfig::ZED_API_SSL_ENABLED] = false;

$config[YvesConfig::YVES_SSL_ENABLED]
    = $config[YvesConfig::YVES_COMPLETE_SSL_ENABLED]
    = true;


$config[AfterbuyExportConstantInterface::AFTERBUY_EMAILS] = [
    'ds@petsdeli.de',
    'raed.marji@project-a.com'
];
