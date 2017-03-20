<?php

/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a devtest environment.
 */

use Pyz\Yves\Application\YvesBootstrap;
use Pyz\Zed\Application\Communication\ZedBootstrap;
use Spryker\Shared\Kernel\KernelConstants;
use Spryker\Shared\Payone\PayoneConstants;
use Spryker\Shared\Propel\PropelConstants;
use Spryker\Shared\Search\SearchConstants;
use Spryker\Shared\Session\SessionConstants;
use Spryker\Shared\Setup\SetupConstants;
use Spryker\Shared\Storage\StorageConstants;
use Spryker\Shared\Testify\TestifyConstants;

// ---------- General
$config[KernelConstants::SPRYKER_ROOT] = APPLICATION_ROOT_DIR . '/vendor/spryker/spryker/Bundles';

// ---------- Testify
$config[TestifyConstants::BOOTSTRAP_CLASS_YVES] = YvesBootstrap::class;
$config[TestifyConstants::BOOTSTRAP_CLASS_ZED] = ZedBootstrap::class;

// ---------- Propel
$config[PropelConstants::ZED_DB_ENGINE] = $config[PropelConstants::ZED_DB_ENGINE_PGSQL];
$config[PropelConstants::ZED_DB_HOST] = '127.0.0.1';
$config[PropelConstants::ZED_DB_PORT] = 5432;

// ---------- Redis
$config[StorageConstants::STORAGE_REDIS_PROTOCOL] = 'tcp';
$config[StorageConstants::STORAGE_REDIS_HOST] = '127.0.0.1';
$config[StorageConstants::STORAGE_REDIS_PORT] = '10009';
$config[StorageConstants::STORAGE_REDIS_PASSWORD] = '';
$config[StorageConstants::STORAGE_REDIS_DATABASE] = 3;

// ---------- Session
$config[SessionConstants::SESSION_IS_TEST] = (bool)getenv("SESSION_IS_TEST");
$config[SessionConstants::YVES_SESSION_SAVE_HANDLER] = SessionConstants::SESSION_HANDLER_REDIS;
$config[SessionConstants::YVES_SESSION_REDIS_PROTOCOL] = $config[StorageConstants::STORAGE_REDIS_PROTOCOL];
$config[SessionConstants::YVES_SESSION_REDIS_HOST] = $config[StorageConstants::STORAGE_REDIS_HOST];
$config[SessionConstants::YVES_SESSION_REDIS_PORT] = $config[StorageConstants::STORAGE_REDIS_PORT];
$config[SessionConstants::YVES_SESSION_REDIS_PASSWORD] = $config[StorageConstants::STORAGE_REDIS_PASSWORD];
$config[SessionConstants::YVES_SESSION_REDIS_DATABASE] = 4;
$config[SessionConstants::ZED_SESSION_COOKIE_SECURE] = false;
$config[SessionConstants::ZED_SESSION_SAVE_HANDLER] = SessionConstants::SESSION_HANDLER_FILE;
$config[SessionConstants::ZED_SESSION_REDIS_PROTOCOL] = $config[SessionConstants::YVES_SESSION_REDIS_PROTOCOL];
$config[SessionConstants::ZED_SESSION_REDIS_HOST] = $config[SessionConstants::YVES_SESSION_REDIS_HOST];
$config[SessionConstants::ZED_SESSION_REDIS_PORT] = $config[SessionConstants::YVES_SESSION_REDIS_PORT];
$config[SessionConstants::ZED_SESSION_REDIS_PASSWORD] = $config[SessionConstants::YVES_SESSION_REDIS_PASSWORD];

// ---------- Redis
$config[PayoneConstants::PAYONE] = [
    PayoneConstants::PAYONE_MODE => '',
];

// ---------- Elasticsearch
$config[SearchConstants::SEARCH_INDEX_NAME_SUFFIX] = '_devtest';

// ---------- Jenkins
$config[SetupConstants::JENKINS_DIRECTORY] = '/data/shop/development/shared/data/common/jenkins';

// ---------- Payone
$config[PayoneConstants::PAYONE] = [
    PayoneConstants::PAYONE_MODE => '',
];
