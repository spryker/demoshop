<?php

/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a development environment.
 */

use Spryker\Shared\Acl\AclConstants;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\EventJournal\EventJournalConstants;
use Spryker\Shared\Log\LogConstants;
use Spryker\Shared\Payone\PayoneConstants;
use Spryker\Shared\Propel\PropelConstants;
use Spryker\Shared\Session\SessionConstants;

$config[ApplicationConstants::YVES_SESSION_SAVE_HANDLER] = SessionConstants::SESSION_HANDLER_REDIS;
$config[ApplicationConstants::ZED_SESSION_SAVE_HANDLER] = SessionConstants::SESSION_HANDLER_REDIS;

$redis = parse_url(getenv(getenv('REDIS_URL_NAME') ?: 'REDIS_URL'));
$config[ApplicationConstants::YVES_STORAGE_SESSION_REDIS_PROTOCOL] = $redis['scheme'];
$config[ApplicationConstants::YVES_STORAGE_SESSION_REDIS_HOST] = $redis['host'];
$config[ApplicationConstants::YVES_STORAGE_SESSION_REDIS_PORT] = $redis['port'];
$config[ApplicationConstants::YVES_STORAGE_SESSION_REDIS_PASSWORD] = $redis['pass'];

$config[ApplicationConstants::ZED_STORAGE_SESSION_REDIS_PROTOCOL] = $config[ApplicationConstants::YVES_STORAGE_SESSION_REDIS_PROTOCOL];
$config[ApplicationConstants::ZED_STORAGE_SESSION_REDIS_HOST] = $config[ApplicationConstants::YVES_STORAGE_SESSION_REDIS_HOST];
$config[ApplicationConstants::ZED_STORAGE_SESSION_REDIS_PORT] = $config[ApplicationConstants::YVES_STORAGE_SESSION_REDIS_PORT];
$config[ApplicationConstants::ZED_STORAGE_SESSION_REDIS_PASSWORD] = $config[ApplicationConstants::YVES_STORAGE_SESSION_REDIS_PASSWORD];

$config[ApplicationConstants::YVES_SESSION_COOKIE_DOMAIN] = $config[ApplicationConstants::HOST_YVES];
$config[ApplicationConstants::YVES_COOKIE_SECURE] = false;

$elastica = parse_url(getenv(getenv('ELASTIC_SEARCH_URL_NAME') ?: 'ELASTIC_SEARCH_URL'));
$b64 = base64_encode($elastica['user'] . ':' . $elastica['pass']);
$config[ApplicationConstants::ELASTICA_PARAMETER__AUTH_HEADER] = str_pad($b64, strlen($b64) + strlen($b64) % 4, '=', STR_PAD_RIGHT);
$config[ApplicationConstants::ELASTICA_PARAMETER__HOST] = $elastica['host'];
$config[ApplicationConstants::ELASTICA_PARAMETER__TRANSPORT] = $elastica['scheme'];
$config[ApplicationConstants::ELASTICA_PARAMETER__PORT] = $elastica['scheme'] == 'https' ? 443 : 80;

$config[ApplicationConstants::JENKINS_BASE_URL] = 'http://' . $config[ApplicationConstants::HOST_ZED_GUI] . ':10007/jenkins';
$config[ApplicationConstants::JENKINS_DIRECTORY] = '/data/shop/development/shared/data/common/jenkins';
$config[ApplicationConstants::TRANSFER_DEBUG_SESSION_FORWARD_ENABLED] = false;

$config[PayoneConstants::PAYONE] = [
    PayoneConstants::PAYONE_CREDENTIALS_ENCODING => 'UTF-8',
    PayoneConstants::PAYONE_CREDENTIALS_KEY => '',
    PayoneConstants::PAYONE_CREDENTIALS_MID => '',
    PayoneConstants::PAYONE_CREDENTIALS_AID => '',
    PayoneConstants::PAYONE_CREDENTIALS_PORTAL_ID => '',
    PayoneConstants::PAYONE_PAYMENT_GATEWAY_URL => 'https://api.pay1.de/post-gateway/',
    PayoneConstants::PAYONE_REDIRECT_SUCCESS_URL => $config[ApplicationConstants::HOST_YVES] . '/checkout/success/',
    PayoneConstants::PAYONE_REDIRECT_ERROR_URL => $config[ApplicationConstants::HOST_YVES] . '/checkout/index/',
    PayoneConstants::PAYONE_REDIRECT_BACK_URL => $config[ApplicationConstants::HOST_YVES] . '/checkout/regular-redirect-payment-cancellation/',
    PayoneConstants::PAYONE_MODE => '',
];

$config[ApplicationConstants::NAVIGATION_CACHE_ENABLED] = true;

$config[AclConstants::ACL_USER_RULE_WHITELIST][] = [
    'bundle' => 'wdt',
    'controller' => '*',
    'action' => '*',
    'type' => 'allow',
];

$config[ApplicationConstants::PROPEL_DEBUG] = false;
$config[ApplicationConstants::PROPEL_SHOW_EXTENDED_EXCEPTION] = false;

$config[ApplicationConstants::ALLOW_INTEGRATION_CHECKS] = true;
$config[ApplicationConstants::DISPLAY_ERRORS] = true;
$config[ApplicationConstants::ENABLE_APPLICATION_DEBUG] = false;
$config[ApplicationConstants::SET_REPEAT_DATA] = true;
$config[ApplicationConstants::STORE_PREFIX] = 'DEV';

$config[ApplicationConstants::ENABLE_WEB_PROFILER] = false;
$config[ApplicationConstants::SHOW_SYMFONY_TOOLBAR] = false;

$config[ApplicationConstants::APPLICATION_SPRYKER_ROOT] = APPLICATION_ROOT_DIR . '/vendor/spryker/spryker/Bundles';

$config[LogConstants::LOG_LEVEL] = 0;
$config[EventJournalConstants::WRITERS]['YVES'] = [];
$config[EventJournalConstants::WRITERS]['ZED'] = [];
$config[PropelConstants::USE_SUDO_TO_MANAGE_DATABASE] = false;
