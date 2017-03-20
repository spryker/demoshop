<?php

/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a development environment.
 */

use Pyz\Shared\Newsletter\NewsletterConstants;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Customer\CustomerConstants;
use Spryker\Shared\Kernel\KernelConstants;
use Spryker\Shared\Payolution\PayolutionConstants;
use Spryker\Shared\Payone\PayoneConstants;
use Spryker\Shared\ProductManagement\ProductManagementConstants;
use Spryker\Shared\Propel\PropelConstants;
use Spryker\Shared\Search\SearchConstants;
use Spryker\Shared\Session\SessionConstants;
use Spryker\Shared\Setup\SetupConstants;
use Spryker\Shared\Storage\StorageConstants;
use Spryker\Shared\ZedRequest\ZedRequestConstants;

$zedHost = 'zed-test.de.project.local';
$yvesHost = 'www-test.de.project.local';

$config[PropelConstants::ZED_DB_ENGINE] = $config[PropelConstants::ZED_DB_ENGINE_PGSQL];
$config[PropelConstants::ZED_DB_USERNAME] = 'devtest';
$config[PropelConstants::ZED_DB_PASSWORD] = 'mate20mg';
$config[PropelConstants::ZED_DB_DATABASE] = 'DE_devtest_zed';
$config[PropelConstants::ZED_DB_HOST] = '127.0.0.1';
$config[PropelConstants::ZED_DB_PORT] = 5432;

$config[ApplicationConstants::ELASTICA_PARAMETER__INDEX_NAME] = 'de_search_devtest';

$config[SearchConstants::SEARCH_INDEX_NAME_SUFFIX] = '_devtest';

$config[SessionConstants::YVES_SESSION_SAVE_HANDLER] = SessionConstants::SESSION_HANDLER_REDIS;
$config[SessionConstants::ZED_SESSION_SAVE_HANDLER] = SessionConstants::SESSION_HANDLER_FILE;

$config[StorageConstants::STORAGE_REDIS_PROTOCOL] = 'tcp';
$config[StorageConstants::STORAGE_REDIS_HOST] = '127.0.0.1';
$config[StorageConstants::STORAGE_REDIS_PORT] = '10009';
$config[StorageConstants::STORAGE_REDIS_PASSWORD] = '';
$config[StorageConstants::STORAGE_REDIS_DATABASE] = 3;

$config[SessionConstants::YVES_SESSION_REDIS_PROTOCOL] = $config[StorageConstants::STORAGE_REDIS_PROTOCOL];
$config[SessionConstants::YVES_SESSION_REDIS_HOST] = $config[StorageConstants::STORAGE_REDIS_HOST];
$config[SessionConstants::YVES_SESSION_REDIS_PORT] = $config[StorageConstants::STORAGE_REDIS_PORT];
$config[SessionConstants::YVES_SESSION_REDIS_PASSWORD] = $config[StorageConstants::STORAGE_REDIS_PASSWORD];
$config[SessionConstants::YVES_SESSION_REDIS_DATABASE] = 5;

$config[SessionConstants::ZED_SESSION_REDIS_PROTOCOL] = $config[SessionConstants::YVES_SESSION_REDIS_PROTOCOL];
$config[SessionConstants::ZED_SESSION_REDIS_HOST] = $config[SessionConstants::YVES_SESSION_REDIS_HOST];
$config[SessionConstants::ZED_SESSION_REDIS_PORT] = $config[SessionConstants::YVES_SESSION_REDIS_PORT];
$config[SessionConstants::ZED_SESSION_REDIS_PASSWORD] = $config[SessionConstants::YVES_SESSION_REDIS_PASSWORD];

$config[ApplicationConstants::YVES_TRUSTED_HOSTS] = [$yvesHost, $zedHost];

$config[SessionConstants::SESSION_IS_TEST] = (bool)getenv("SESSION_IS_TEST");

$config[PayoneConstants::PAYONE] = [
    PayoneConstants::PAYONE_MODE => '',
];

$config[SetupConstants::JENKINS_BASE_URL] = 'http://' . $config[ApplicationConstants::HOST_ZED_GUI] . ':10007/jenkins';
$config[SetupConstants::JENKINS_DIRECTORY] = '/data/shop/development/shared/data/common/jenkins';

$config[KernelConstants::SPRYKER_ROOT] = APPLICATION_ROOT_DIR . '/vendor/spryker/spryker/Bundles';

$config[ApplicationConstants::HOST_ZED_GUI]
    = $config[ApplicationConstants::HOST_ZED_API]
    = $config[ApplicationConstants::HOST_SSL_ZED_GUI]
    = $config[ApplicationConstants::HOST_SSL_ZED_API]
    = $zedHost;

$config[ApplicationConstants::HOST_ZED_GUI]
    = 'http://' . $zedHost;
$config[ApplicationConstants::HOST_ZED_API]
    = $config[ZedRequestConstants::HOST_ZED_API] = $zedHost;
$config[ApplicationConstants::HOST_SSL_ZED_GUI]
    = $config[ApplicationConstants::HOST_SSL_ZED_API]
    = 'https://' . $zedHost;

$config[SessionConstants::ZED_SESSION_COOKIE_NAME] = $zedHost;

$config[ApplicationConstants::HOST_YVES]
    = $config[ProductManagementConstants::HOST_YVES]
    = $config[PayoneConstants::HOST_YVES]
    = $config[PayolutionConstants::HOST_YVES]
    = $config[NewsletterConstants::HOST_YVES]
    = $config[CustomerConstants::HOST_YVES] = 'http://' . $yvesHost;
$config[ApplicationConstants::HOST_STATIC_ASSETS] = $config[ApplicationConstants::HOST_STATIC_MEDIA] = $yvesHost;
$config[SessionConstants::YVES_SESSION_COOKIE_DOMAIN] = $yvesHost;

$config[ApplicationConstants::HOST_SSL_YVES] = 'https://' . $yvesHost;
$config[ApplicationConstants::HOST_SSL_STATIC_ASSETS] = $config[ApplicationConstants::HOST_SSL_STATIC_MEDIA] = $yvesHost;
$config[SessionConstants::ZED_SESSION_COOKIE_SECURE] = false;
