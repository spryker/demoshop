<?php

use Monolog\Logger;
use Pyz\Shared\Newsletter\NewsletterConstants;
use Pyz\Shared\WebProfiler\WebProfilerConstants;
use Pyz\Yves\Application\YvesBootstrap;
use Pyz\Zed\Application\Communication\ZedBootstrap;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Application\Log\Config\SprykerLoggerConfig;
use Spryker\Shared\Collector\CollectorConstants;
use Spryker\Shared\Config\ConfigConstants;
use Spryker\Shared\Customer\CustomerConstants;
use Spryker\Shared\EventBehavior\EventBehaviorConstants;
use Spryker\Shared\Kernel\KernelConstants;
use Spryker\Shared\Kernel\Store;
use Spryker\Shared\Log\LogConstants;
use Spryker\Shared\Mail\MailConstants;
use Spryker\Shared\ProductManagement\ProductManagementConstants;
use Spryker\Shared\Propel\PropelConstants;
use Spryker\Shared\Search\SearchConstants;
use Spryker\Shared\Session\SessionConstants;
use Spryker\Shared\Setup\SetupConstants;
use Spryker\Shared\Storage\StorageConstants;
use Spryker\Shared\Testify\TestifyConstants;
use Spryker\Shared\Twig\TwigConstants;
use Spryker\Shared\ZedRequest\ZedRequestConstants;

$CURRENT_STORE = Store::getInstance()->getStoreName();

// ---------- General
$config[KernelConstants::SPRYKER_ROOT] = APPLICATION_ROOT_DIR . '/vendor/spryker';
$config[WebProfilerConstants::ENABLE_WEB_PROFILER]
    = $config[ConfigConstants::ENABLE_WEB_PROFILER]
    = false;

// ---------- Yves host
$config[ApplicationConstants::HOST_YVES] = 'www.de.spryker.test';
$config[ApplicationConstants::PORT_YVES] = '';
$config[ApplicationConstants::PORT_SSL_YVES] = '';
$config[ApplicationConstants::BASE_URL_YVES] = sprintf(
    'http://%s%s',
    $config[ApplicationConstants::HOST_YVES],
    $config[ApplicationConstants::PORT_YVES]
);
$config[ApplicationConstants::BASE_URL_SSL_YVES] = sprintf(
    'https://%s%s',
    $config[ApplicationConstants::HOST_YVES],
    $config[ApplicationConstants::PORT_SSL_YVES]
);
$config[ProductManagementConstants::BASE_URL_YVES] = $config[ApplicationConstants::BASE_URL_YVES];
$config[NewsletterConstants::BASE_URL_YVES] = $config[ApplicationConstants::BASE_URL_YVES];
$config[CustomerConstants::BASE_URL_YVES] = $config[ApplicationConstants::BASE_URL_YVES];

// ---------- Zed host
$config[ApplicationConstants::HOST_ZED] = 'zed.de.spryker.test';
$config[ApplicationConstants::PORT_ZED] = ':80';
$config[ApplicationConstants::PORT_SSL_ZED] = ':80';
$config[ApplicationConstants::BASE_URL_ZED] = sprintf(
    'http://%s%s',
    $config[ApplicationConstants::HOST_ZED],
    $config[ApplicationConstants::PORT_ZED]
);
$config[ApplicationConstants::BASE_URL_SSL_ZED] = sprintf(
    'https://%s%s',
    $config[ApplicationConstants::HOST_ZED],
    $config[ApplicationConstants::PORT_SSL_ZED]
);
$config[ZedRequestConstants::HOST_ZED_API] = $config[ApplicationConstants::HOST_ZED];
$config[ZedRequestConstants::BASE_URL_ZED_API] = $config[ApplicationConstants::BASE_URL_ZED];
$config[ZedRequestConstants::BASE_URL_SSL_ZED_API] = $config[ApplicationConstants::BASE_URL_SSL_ZED];

// ---------- Assets / Media
$config[ApplicationConstants::BASE_URL_STATIC_ASSETS] = $config[ApplicationConstants::BASE_URL_YVES];
$config[ApplicationConstants::BASE_URL_STATIC_MEDIA] = $config[ApplicationConstants::BASE_URL_YVES];
$config[ApplicationConstants::BASE_URL_SSL_STATIC_ASSETS] = $config[ApplicationConstants::BASE_URL_SSL_YVES];
$config[ApplicationConstants::BASE_URL_SSL_STATIC_MEDIA] = $config[ApplicationConstants::BASE_URL_SSL_YVES];

// ---------- Testify
$config[TestifyConstants::BOOTSTRAP_CLASS_YVES] = YvesBootstrap::class;
$config[TestifyConstants::BOOTSTRAP_CLASS_ZED] = ZedBootstrap::class;

// ---------- Redis
$config[StorageConstants::STORAGE_REDIS_PROTOCOL] = 'tcp';
$config[StorageConstants::STORAGE_REDIS_HOST] = '127.0.0.1';
$config[StorageConstants::STORAGE_REDIS_PORT] = '6379';
$config[StorageConstants::STORAGE_REDIS_PASSWORD] = false;
$config[StorageConstants::STORAGE_REDIS_DATABASE] = 3;

// ---------- Elasticsearch
$ELASTICA_INDEX_NAME = 'de_search';
$ELASTICA_DOCUMENT_TYPE = 'page';
$ELASTICA_PORT = '9200';
$config[ApplicationConstants::ELASTICA_PARAMETER__INDEX_NAME] = $ELASTICA_INDEX_NAME;
$config[CollectorConstants::ELASTICA_PARAMETER__INDEX_NAME] = $ELASTICA_INDEX_NAME;
$config[SearchConstants::ELASTICA_PARAMETER__INDEX_NAME] = $ELASTICA_INDEX_NAME;
$config[ApplicationConstants::ELASTICA_PARAMETER__DOCUMENT_TYPE] = $ELASTICA_DOCUMENT_TYPE;
$config[CollectorConstants::ELASTICA_PARAMETER__DOCUMENT_TYPE] = $ELASTICA_DOCUMENT_TYPE;
$config[SearchConstants::ELASTICA_PARAMETER__DOCUMENT_TYPE] = $ELASTICA_DOCUMENT_TYPE;
$config[ApplicationConstants::ELASTICA_PARAMETER__PORT] = $ELASTICA_PORT;
$config[SearchConstants::ELASTICA_PARAMETER__PORT] = $ELASTICA_PORT;
$config[SearchConstants::SEARCH_INDEX_NAME_SUFFIX] = '';

// ---------- Session
$config[SessionConstants::SESSION_IS_TEST] = (bool)getenv("SESSION_IS_TEST");
$config[SessionConstants::YVES_SESSION_COOKIE_NAME] = $config[ApplicationConstants::HOST_YVES];
$config[SessionConstants::YVES_SESSION_COOKIE_DOMAIN] = $config[ApplicationConstants::HOST_YVES];
$config[SessionConstants::YVES_SESSION_REDIS_PROTOCOL] = $config[StorageConstants::STORAGE_REDIS_PROTOCOL];
$config[SessionConstants::YVES_SESSION_REDIS_HOST] = $config[StorageConstants::STORAGE_REDIS_HOST];
$config[SessionConstants::YVES_SESSION_REDIS_PORT] = $config[StorageConstants::STORAGE_REDIS_PORT];
$config[SessionConstants::YVES_SESSION_REDIS_PASSWORD] = $config[StorageConstants::STORAGE_REDIS_PASSWORD];
$config[SessionConstants::YVES_SESSION_REDIS_DATABASE] = 1;
$config[SessionConstants::ZED_SESSION_COOKIE_NAME] = $config[ApplicationConstants::HOST_ZED];
$config[SessionConstants::ZED_SESSION_REDIS_PROTOCOL] = $config[SessionConstants::YVES_SESSION_REDIS_PROTOCOL];
$config[SessionConstants::ZED_SESSION_REDIS_HOST] = $config[SessionConstants::YVES_SESSION_REDIS_HOST];
$config[SessionConstants::ZED_SESSION_REDIS_PORT] = $config[SessionConstants::YVES_SESSION_REDIS_PORT];
$config[SessionConstants::ZED_SESSION_REDIS_PASSWORD] = $config[SessionConstants::YVES_SESSION_REDIS_PASSWORD];
$config[SessionConstants::ZED_SESSION_REDIS_DATABASE] = 2;

// ---------- Twig
$config[TwigConstants::YVES_PATH_CACHE_ENABLED] = true;
$config[TwigConstants::YVES_PATH_CACHE_FILE] = sprintf(
    '%s/data/%s/cache/Yves/twig/.pathCache',
    APPLICATION_ROOT_DIR,
    $CURRENT_STORE
);
$config[TwigConstants::ZED_PATH_CACHE_ENABLED] = true;
$config[TwigConstants::ZED_PATH_CACHE_FILE] = sprintf(
    '%s/data/%s/cache/Zed/twig/.pathCache',
    APPLICATION_ROOT_DIR,
    $CURRENT_STORE
);

// ---------- Jenkins
$config[SetupConstants::JENKINS_BASE_URL] = 'http://localhost:10007/';
$config[SetupConstants::JENKINS_DIRECTORY] = APPLICATION_ROOT_DIR . '/shared/data/common/jenkins';

// ---------- Email
$config[MailConstants::MAILCATCHER_GUI] = 'http://' . $config[ApplicationConstants::HOST_ZED] . ':1080';

// ---------- Propel
$config[PropelConstants::ZED_DB_DATABASE] = 'DE_test_zed';

// ---------- Logging
$config[LogConstants::LOG_LEVEL] = Logger::CRITICAL;
$config[LogConstants::LOGGER_CONFIG] = SprykerLoggerConfig::class;

// ---------- EventBehavior
$config[EventBehaviorConstants::EVENT_BEHAVIOR_TRIGGERING_ACTIVE] = false;
