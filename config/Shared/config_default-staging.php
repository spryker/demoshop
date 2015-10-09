<?php
/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a staging environment.
 */


use SprykerFeature\Shared\System\SystemConfig;
use SprykerFeature\Shared\Yves\YvesConfig;
use SprykerFeature\Shared\Application\ApplicationConfig;
use SprykerFeature\Shared\Acl\AclConfig;
use SprykerFeature\Shared\Session\SessionConfig;

$config[YvesConfig::YVES_SESSION_SAVE_HANDLER] = SessionConfig::SESSION_HANDLER_REDIS;
$config[SystemConfig::ZED_SESSION_SAVE_HANDLER] = SessionConfig::SESSION_HANDLER_FILE;

$config[SystemConfig::ZED_DB_USERNAME] = 'staging';
$config[SystemConfig::ZED_DB_PASSWORD] = 'mate20mg';
$config[SystemConfig::ZED_DB_HOST]     = '127.0.0.1';
$config[SystemConfig::ZED_DB_PORT]     = 5432;
$config[SystemConfig::ZED_DB_DATABASE] = null;

$config[ApplicationConfig::ZED_TWIG_OPTIONS] = [
    'cache' => true,
];
$config[ApplicationConfig::YVES_TWIG_OPTIONS] = [
    'cache' => true,
];

$config[SystemConfig::YVES_STORAGE_SESSION_REDIS_PROTOCOL] = 'tcp';
$config[SystemConfig::YVES_STORAGE_SESSION_REDIS_HOST] = '127.0.0.1';
$config[SystemConfig::YVES_STORAGE_SESSION_REDIS_PORT] = '13009';

$config[SystemConfig::ZED_STORAGE_SESSION_REDIS_PROTOCOL] = $config[SystemConfig::YVES_STORAGE_SESSION_REDIS_PROTOCOL];
$config[SystemConfig::ZED_STORAGE_SESSION_REDIS_HOST] = $config[SystemConfig::YVES_STORAGE_SESSION_REDIS_HOST];
$config[SystemConfig::ZED_STORAGE_SESSION_REDIS_PORT] = $config[SystemConfig::YVES_STORAGE_SESSION_REDIS_PORT];

$config[YvesConfig::YVES_SESSION_COOKIE_DOMAIN] = $config[SystemConfig::HOST_YVES];

$config[SystemConfig::JENKINS_BASE_URL] = 'http://' . $config[SystemConfig::HOST_ZED_GUI] . ':13007/jenkins';
$config[SystemConfig::JENKINS_DIRECTORY] = '/data/shop/staging/shared/data/common/jenkins';
$config[YvesConfig::TRANSFER_DEBUG_SESSION_FORWARD_ENABLED] = false;

$config[ApplicationConfig::NAVIGATION_CACHE_ENABLED] = true;

$config[AclConfig::ACL_USER_RULE_WHITELIST][] = [
    'bundle' => 'wdt',
    'controller' => '*',
    'action' => '*',
    'type' => 'allow',
];

$config[SystemConfig::PROPEL_DEBUG] = false;
$config[ApplicationConfig::SHOW_SYMFONY_TOOLBAR] = false;
