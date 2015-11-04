<?php

/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a development environment.
 */

use SprykerFeature\Shared\System\SystemConfig;
use SprykerFeature\Shared\Yves\YvesConfig;
use SprykerFeature\Shared\Application\ApplicationConfig;
use SprykerFeature\Shared\Acl\AclConfig;
use SprykerFeature\Shared\Session\SessionConfig;
use SprykerFeature\Shared\Payone\PayoneConfigConstants;

$config[YvesConfig::YVES_SESSION_SAVE_HANDLER] = SessionConfig::SESSION_HANDLER_REDIS;
$config[SystemConfig::ZED_SESSION_SAVE_HANDLER] = SessionConfig::SESSION_HANDLER_FILE;

$config[SystemConfig::YVES_STORAGE_SESSION_REDIS_PROTOCOL] = 'tcp';
$config[SystemConfig::YVES_STORAGE_SESSION_REDIS_HOST] = '127.0.0.1';
$config[SystemConfig::YVES_STORAGE_SESSION_REDIS_PORT] = '10009';

$config[SystemConfig::ZED_STORAGE_SESSION_REDIS_PROTOCOL] = $config[SystemConfig::YVES_STORAGE_SESSION_REDIS_PROTOCOL];
$config[SystemConfig::ZED_STORAGE_SESSION_REDIS_HOST] = $config[SystemConfig::YVES_STORAGE_SESSION_REDIS_HOST];
$config[SystemConfig::ZED_STORAGE_SESSION_REDIS_PORT] = $config[SystemConfig::YVES_STORAGE_SESSION_REDIS_PORT];

$config[YvesConfig::YVES_SESSION_COOKIE_DOMAIN] = $config[SystemConfig::HOST_YVES];

$config[SystemConfig::JENKINS_BASE_URL] = 'http://' . $config[SystemConfig::HOST_ZED_GUI] . ':10007/jenkins';
$config[SystemConfig::JENKINS_DIRECTORY] = '/data/shop/development/shared/data/common/jenkins';
$config[YvesConfig::TRANSFER_DEBUG_SESSION_FORWARD_ENABLED] = true;

$config[PayoneConfigConstants::PAYONE] = [
    PayoneConfigConstants::PAYONE_CREDENTIALS_ENCODING => 'UTF-8',
    PayoneConfigConstants::PAYONE_CREDENTIALS_KEY => 'oZZfMY6L224Q51jq',
    PayoneConfigConstants::PAYONE_CREDENTIALS_MID => '29250',
    PayoneConfigConstants::PAYONE_CREDENTIALS_AID => '29499',
    PayoneConfigConstants::PAYONE_CREDENTIALS_PORTAL_ID => '2020679',
    PayoneConfigConstants::PAYONE_PAYMENT_GATEWAY_URL => 'https://api.pay1.de/post-gateway/',
    PayoneConfigConstants::PAYONE_REDIRECT_SUCCESS_URL => $config[SystemConfig::HOST_YVES] . '/checkout/success/',
    PayoneConfigConstants::PAYONE_REDIRECT_ERROR_URL => $config[SystemConfig::HOST_YVES] . '/checkout/index/',
    PayoneConfigConstants::PAYONE_REDIRECT_BACK_URL => $config[SystemConfig::HOST_YVES] . '/checkout/regular-redirect-payment-cancellation/',
    PayoneConfigConstants::PAYONE_MODE => '',
];

$config[ApplicationConfig::NAVIGATION_CACHE_ENABLED] = false;

$config[AclConfig::ACL_USER_RULE_WHITELIST][] = [
    'bundle' => 'wdt',
    'controller' => '*',
    'action' => '*',
    'type' => 'allow',
];

$config[SystemConfig::PROPEL_DEBUG] = true;

$config[ApplicationConfig::ALLOW_INTEGRATION_CHECKS] = true;
$config[ApplicationConfig::DISPLAY_ERRORS] = true;
$config[ApplicationConfig::ENABLE_APPLICATION_DEBUG] = true;
$config[ApplicationConfig::SET_REPEAT_DATA] = true;
$config[ApplicationConfig::SHOW_SYMFONY_TOOLBAR] = true;
$config[ApplicationConfig::STORE_PREFIX] = 'DEV';
$config[ApplicationConfig::SHOW_SYMFONY_TOOLBAR] = true;
